<?php

namespace App\Filament\Widgets;

use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Revenue'),       '43 د.ل')
                ->description('5 زيادة آخر شهر')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color(Color::Orange),

            Stat::make(__('Revenue This Year'),        245)
                ->description('2 زيادة آخر شهر')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color(Color::Orange),

            Stat::make(__('Revenue This Month'), 2345345)
                ->description('1 زيادة آخر شهر')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color(Color::Orange),
        ];
    }
}
