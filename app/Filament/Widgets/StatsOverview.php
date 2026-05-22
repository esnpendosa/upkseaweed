<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', \App\Models\Product::count())
                ->description('All catalog items')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
            Stat::make('Total Articles', \App\Models\Article::count())
                ->description('Published news & updates')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
            Stat::make('Certifications', \App\Models\Certification::count())
                ->description('Active quality certificates')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('warning'),
        ];
    }
}
