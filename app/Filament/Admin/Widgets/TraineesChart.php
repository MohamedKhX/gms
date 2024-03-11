<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Subscription;
use App\Models\Trainee;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;

class TraineesChart extends ChartWidget
{
    protected static ?string $heading = 'أعداد المتدربين';

    protected function getData(): array
    {
        $data = Trend::model(Trainee::class)
            ->between(
                start: Carbon::parse('2024-01-01'),
                end: Carbon::parse('2024-12-31')
            )
            ->perMonth()
            ->count();

        $newData = [];

        foreach ($data as $key => $value) {
            if(\Carbon\Carbon::parse($value->date)->month > now()->month) {
                $newData[] = $value->aggregate;
                continue;
            }

            $aggregate = 0;

            for ($i = 0; $i <= $key; $i++) {
                $aggregate += $data[$i]->aggregate;
            }

            $newData[] = $aggregate;
        }

        return [
            'datasets' => [
                [
                    'label' => 'المتدربين',
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
