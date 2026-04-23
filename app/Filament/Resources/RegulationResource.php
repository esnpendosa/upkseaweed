<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegulationResource\Pages;
use App\Models\Regulation;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class RegulationResource extends Resource
{
    protected static ?string $model = Regulation::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|UnitEnum|null $navigationGroup = 'Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->components([
                Section::make('Regulation Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->rows(3)
                            ->maxLength(65535),
                        TextInput::make('category')
                            ->placeholder('e.g., AD/ART, Policy, Export Regulation')
                            ->maxLength(255),
                    ])->columns(1),
                
                Section::make('Source & Status')
                    ->schema([
                        FileUpload::make('file_path')
                            ->label('PDF Document')
                            ->directory('regulations')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240),
                        TextInput::make('external_link')
                            ->url()
                            ->maxLength(255),
                        Toggle::make('is_active')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegulations::route('/'),
            'create' => Pages\CreateRegulation::route('/create'),
            'edit' => Pages\EditRegulation::route('/{record}/edit'),
        ];
    }
}
