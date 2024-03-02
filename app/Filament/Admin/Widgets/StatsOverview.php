<?php

namespace App\Filament\Admin\Widgets;

use App\Enums\PaymentMethod;
use App\Models\Subscription;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalRevenue = Subscription::where('payment_method', PaymentMethod::CASH)->sum('price');

        $lastYearRevenue = Subscription::where('payment_method', PaymentMethod::CASH)
            ->whereBetween('start_date', [Carbon::now()->subYear(), Carbon::now()])
            ->sum('price');

        $lastMonthRevenue = Subscription::where('payment_method', PaymentMethod::CASH)
            ->whereBetween('start_date', [Carbon::now()->subMonth(), Carbon::now()])
            ->sum('price');

        $totalRevenueCard = Subscription::where('payment_method', PaymentMethod::CARD)->sum('price_dollar');

        $lastYearRevenueCard = Subscription::where('payment_method', PaymentMethod::CARD)
            ->whereBetween('start_date', [Carbon::now()->subYear(), Carbon::now()])
            ->sum('price_dollar');

        $lastMonthRevenueCard = Subscription::where('payment_method', PaymentMethod::CARD)
            ->whereBetween('start_date', [Carbon::now()->subMonth(), Carbon::now()])
            ->sum('price_dollar');

        return [
            Stat::make(__('Total Revenue'),       "$totalRevenue د .ل ")
                ->description('إجمالي الإيرادات بالاشتراكات العادية')
                ->color(Color::Orange),

            Stat::make(__('Revenue This Year'),        "$lastYearRevenue د .ل ")
                ->description('إجمالي الإيرادات بالاشتراكات العادية')
                ->color(Color::Orange),

            Stat::make(__('Revenue This Month'),      "$lastMonthRevenue د .ل ")
                ->description('إجمالي الإيرادات بالاشتراكات العادية')
                ->color(Color::Orange),

            Stat::make(__('Total Revenue'),       "$totalRevenueCard دولار ")
                ->description('إجمالي الإيرادات بالاشتراكات بالبطاقة')
                ->color(Color::Orange),

            Stat::make(__('Revenue This Year'),        "$lastYearRevenueCard دولار ")
                ->description('إجمالي الإيرادات بالاشتراكات بالبطاقة')
                ->color(Color::Orange),

            Stat::make(__('Revenue This Month'),      "$lastMonthRevenueCard دولار ")
                ->description('إجمالي الإيرادات بالاشتراكات بالبطاقة')
                ->color(Color::Orange),
        ];
    }
}
