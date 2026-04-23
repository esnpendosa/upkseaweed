<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationModuleResource\Pages;
use App\Models\EducationModule;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class EducationModuleResource extends Resource
{
    protected static ?string $model = EducationModule::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string|UnitEnum|null $navigationGroup = 'Management';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Module Info')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->rows(3)
                            ->maxLength(65535),
                    ])->columns(1),
                
                Section::make('Appearance & Link')
                    ->schema([
                        FileUpload::make('image_path')
                            ->image()
                            ->directory('education')
                            ->label('Banner Image'),
                        TextInput::make('link')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('icon')
                            ->placeholder('SVG string or Icon name')
                            ->maxLength(2000),
                        TextInput::make('color')
                            ->placeholder('from-upkgreen/20 to-blue-500/20')
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
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEducationModules::route('/'),
            'create' => Pages\CreateEducationModule::route('/create'),
            'edit' => Pages\EditEducationModule::route('/{record}/edit'),
        ];
    }
}
