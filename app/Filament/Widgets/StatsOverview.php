<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', \App\Models\Product::count())
                ->description('Semua item katalog')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
            Stat::make('Total Artikel', \App\Models\Article::count())
                ->description('Berita & pembaruan diterbitkan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
            Stat::make('Sertifikasi', \App\Models\Certification::count())
                ->description('Sertifikat kualitas aktif')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('warning'),
        ];
    }
}
