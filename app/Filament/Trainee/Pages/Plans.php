<?php

namespace App\Filament\Trainee\Pages;

use Filament\Infolists\Components\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Plans extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    protected static string $view = 'filament.trainee.pages.plans';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return __('Plans');
    }

    public static function getLabel(): ?string
    {
        return __('Plan');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Plans');
    }

    public function getTitle(): string|Htmlable
    {
        return __("Plans");
    }
}
