<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Subscription;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;

class SubscriptionsChart extends ChartWidget
{
    protected static ?string $heading = 'الاشتراكات كل شهر';

    protected function getData(): array
    {
        //
        $data = Trend::model(Subscription::class)
            ->between(
                start: Carbon::parse('2024-01-01'),
                end: Carbon::parse('2024-12-31')
            )
            ->perMonth()
            ->count()
            ->values();

        $newData = [];
        foreach ($data as $key => $value) {
            $newData[] = $value->aggregate;
        }
        return [
            'datasets' => [
                [
                    'label' => 'الاشتراكات',
                    'data' => $newData,
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
