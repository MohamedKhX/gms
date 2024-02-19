<?php

namespace App\Filament\Resources\SubscriptionResource\Pages;

use App\Filament\Resources\SubscriptionResource;
use App\Models\Plan;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscription extends CreateRecord
{
    protected static string $resource = SubscriptionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $plan = Plan::where('id', $data['plan_id'])->first();

        $data['duration'] = $plan->duration;
        $data['price']    = $plan->price;

        $data['start_date'] = now();
        $data['end_date']   = now()->addDays($plan->duration);

        return $data;
    }
}
