<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->type !== UserType::Admin) {
            auth()->logout();

            \Filament\Notifications\Notification::make()
                ->title('ليس لديك الصالحية لدخول هذه الصفحة')
                ->danger()
                ->send();

            return redirect('login');
        }

        return $next($request);
    }
}
