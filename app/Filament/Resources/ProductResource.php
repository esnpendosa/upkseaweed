<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cube';

    protected static string|UnitEnum|null $navigationGroup = 'Catalog';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Information')
                    ->description('Enter the details of the seaweed product.')
                    ->icon('heroicon-o-cube')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->placeholder('e.g., Premium Dried Eucheuma Cottonii'),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('auto-generated-from-title'),

                        Select::make('grade_type')
                            ->required()
                            ->options([
                                'Cottonii' => 'Eucheuma Cottonii',
                                'Spinosum' => 'Eucheuma Spinosum',
                                'Gracilaria' => 'Gracilaria SP',
                                'SRC' => 'Semi-Refined Carrageenan',
                                'Other' => 'Other',
                            ])
                            ->searchable()
                            ->placeholder('Select grade type'),

                        Textarea::make('description')
                            ->rows(3)
                            ->maxLength(1000)
                            ->placeholder('Brief description of the product...'),
                    ])
                    ->columns(2),

                Section::make('Quality Specifications')
                    ->description('Define the quality parameters.')
                    ->icon('heroicon-o-beaker')
                    ->schema([
                        TextInput::make('moisture_content')
                            ->maxLength(100)
                            ->placeholder('e.g., ≤38%')
                            ->helperText('Maximum moisture content percentage'),

                        TextInput::make('impurity_content')
                            ->maxLength(100)
                            ->placeholder('e.g., ≤2%')
                            ->helperText('Maximum impurity content percentage'),

                        Textarea::make('packaging_details')
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('e.g., 50kg compressed bale, PP woven bag')
                            ->helperText('Packaging type and details'),
                    ])
                    ->columns(2),

                Section::make('Media & Settings')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Product Image')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('675')
                            ->directory('products')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->helperText('Recommended: 1200x675px, max 2MB'),

                        Toggle::make('is_active')
                            ->label('Active / Published')
                            ->default(true)
                            ->helperText('Only active products are shown on the website'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?name=S&background=10B981&color=fff')
                    ->size(50),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),

                Tables\Columns\TextColumn::make('grade_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Cottonii' => 'success',
                        'Spinosum' => 'info',
                        'Gracilaria' => 'warning',
                        'SRC' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('moisture_content')
                    ->label('Moisture')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('impurity_content')
                    ->label('Impurity')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('grade_type')
                    ->options([
                        'Cottonii' => 'Cottonii',
                        'Spinosum' => 'Spinosum',
                        'Gracilaria' => 'Gracilaria',
                        'SRC' => 'SRC',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
