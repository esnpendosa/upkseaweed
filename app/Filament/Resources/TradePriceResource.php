<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradePriceResource\Pages;
use App\Models\TradePrice;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use UnitEnum;

class TradePriceResource extends Resource
{
    protected static ?string $model = TradePrice::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static string|UnitEnum|null $navigationGroup = 'Katalog';

    protected static ?string $navigationLabel = 'Harga Perdagangan';
    protected static ?string $pluralModelLabel = 'Harga Perdagangan';
    protected static ?string $modelLabel = 'Harga Perdagangan';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'product_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product & Price Details')
                    ->description('Set up details for seaweed product price mapping in Trade Hub.')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->schema([
                        TextInput::make('product_name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Dried Cottonii, Gracilaria SP'),

                        TextInput::make('quality_specs')
                            ->maxLength(255)
                            ->placeholder('e.g., Moisture ≤38%, Impurities ≤3%'),

                        TextInput::make('reference_price')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Rp 28.500/kg or Contact Us'),

                        TextInput::make('market_trend')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., +2.5%, -1.2%, or Stable'),

                        Select::make('trend_direction')
                            ->required()
                            ->options([
                                'up' => 'Up (Trending Green)',
                                'down' => 'Down (Trending Red)',
                                'stable' => 'Stable (Trending Blue)',
                            ])
                            ->default('stable')
                            ->selectablePlaceholder(false),
                    ])
                    ->columns(2),

                Section::make('Status & Ordering')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active / Visible')
                            ->default(true)
                            ->helperText('Only active prices are shown in the Trade Hub'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first in the price index table'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('product_name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('quality_specs')
                    ->label('Specs')
                    ->searchable(),

                TextColumn::make('reference_price')
                    ->label('Reference Price')
                    ->sortable(),

                TextColumn::make('market_trend')
                    ->label('Market Trend')
                    ->badge()
                    ->color(fn (TradePrice $record): string => match ($record->trend_direction) {
                        'up' => 'success',
                        'down' => 'danger',
                        'stable' => 'info',
                        default => 'gray',
                    }),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListTradePrices::route('/'),
            'create' => Pages\CreateTradePrice::route('/create'),
            'edit' => Pages\EditTradePrice::route('/{record}/edit'),
        ];
    }
}
