<?php

namespace App\Filament\Admin\Pages;

use ArPHP\I18N\Arabic;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected function getActions(): array
    {
        return [
            Action::make('طباعة-تقرير')
                ->icon('heroicon-o-printer')
                ->action(function () {
                    return response()->streamDownload(function () {
                        $reportHtml = view('report', [])->render();

                        /*$arabic = new Arabic();
                        $p = $arabic->arIdentify($reportHtml);

                        for ($i = count($p)-1; $i >= 0; $i-=2) {
                            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
                            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
                        }*/

                        echo \niklasravnsborg\LaravelPdf\Facades\Pdf::loadHtml($reportHtml)->stream();
                    },'ff.pdf');
                }),
        ];
    }
}
