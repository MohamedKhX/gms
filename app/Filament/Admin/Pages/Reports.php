<?php

namespace App\Filament\Admin\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Reports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-printer';

    protected static string $view = 'filament.admin.pages.reports';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('Reports');
    }

    public static function getLabel(): ?string
    {
        return __('Report');
    }

    public function getTitle(): string|Htmlable
    {
        return __("Reports");
    }

}
