<?php

namespace App\Filament\Auth;

use App\Enums\UserType;
use Filament\Facades\Filament;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): \Illuminate\Http\RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
    {

        if (Filament::auth()->user()->type == UserType::Admin) {
            return redirect('/admin');
        }

        if (Filament::auth()->user()->type == UserType::Coach) {
            return redirect('/coach');
        }

        if (Filament::auth()->user()->type == UserType::Trainee) {
            return redirect('/trainee');
        }

        return redirect('/login');
    }
}
