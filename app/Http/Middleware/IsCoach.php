<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCoach
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->type !== UserType::Coach) {
            auth()->logout();

            \Filament\Notifications\Notification::make()
                ->title('ليس لديك الصالحية لدخول هذه الصفحة')
                ->danger()
                ->send();

            return redirect()->back();
        }

        return $next($request);
    }
}
