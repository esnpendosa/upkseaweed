<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatbotOptionResource\Pages;
use App\Models\ChatbotOption;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ChatbotOptionResource extends Resource
{
    protected static ?string $model = ChatbotOption::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string|\UnitEnum|null $navigationGroup = 'Dukungan AI';

    protected static ?string $navigationLabel = 'Pilihan Chatbot';
    protected static ?string $pluralModelLabel = 'Pilihan Chatbot';
    protected static ?string $modelLabel = 'Pilihan Chatbot';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bot Menu Configuration')
                    ->description('Set up dynamic menu options for the chatbot.')
                    ->schema([
                        TextInput::make('label')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Our Products'),

                        Select::make('type')
                            ->required()
                            ->options([
                                'message' => 'Text Response',
                                'link' => 'Direct Link',
                                'gemini_prompt' => 'AI Prompt (Gemini)',
                            ])
                            ->live(),

                        Textarea::make('response')
                            ->rows(3)
                            ->visible(fn (callable $get) => $get('type') === 'message')
                            ->helperText('This text will be shown when the user clicks this menu.'),

                        TextInput::make('value')
                            ->label(fn (callable $get) => match ($get('type')) {
                                'link' => 'URL Link',
                                'gemini_prompt' => 'Custom AI Prompt',
                                default => 'Value',
                            })
                            ->visible(fn (callable $get) => in_array($get('type'), ['link', 'gemini_prompt']))
                            ->placeholder(fn (callable $get) => match ($get('type')) {
                                'link' => 'https://example.com',
                                'gemini_prompt' => 'Explain our shipping process in detail...',
                                default => '',
                            }),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'message' => 'success',
                        'link' => 'info',
                        'gemini_prompt' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChatbotOptions::route('/'),
            'create' => Pages\CreateChatbotOption::route('/create'),
            'edit' => Pages\EditChatbotOption::route('/{record}/edit'),
        ];
    }
}
