<?php

namespace App\Listeners;

use App\Enums\UserType;
use Filament\Pages\Auth\Register;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTraineeAfterRegistration
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(\Filament\Events\Auth\Registered $event): void
    {
        \App\Models\Trainee::create([
            'user_id' => $event->getUser()->id,
        ]);
    }
}
