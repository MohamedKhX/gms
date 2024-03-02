<?php

namespace App\Providers\Filament;

use App\Filament\Trainee\Pages\Auth\EditProfile;
use App\Filament\Trainee\Pages\Auth\Register;
use App\Http\Middleware\IsTrainee;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class TraineePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('trainee')
            ->login()
            ->registration(Register::class)
            ->profile(EditProfile::class)
            ->path('trainee')
            ->colors([
                'primary' => Color::Sky,
            ])
            ->discoverResources(in: app_path('Filament/Trainee/Resources'), for: 'App\\Filament\\Trainee\\Resources')
            ->discoverPages(in: app_path('Filament/Trainee/Pages'), for: 'App\\Filament\\Trainee\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Trainee/Widgets'), for: 'App\\Filament\\Trainee\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                IsTrainee::class,
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/trainee/theme.css');
    }
}
