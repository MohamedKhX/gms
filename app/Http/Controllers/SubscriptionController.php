<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Models\Plan;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function checkout($stripePriceId, $planId)
    {
        return auth()->user()->checkout([$stripePriceId => 1], [
            'mode' => 'subscription',
            'success_url' => \route('subscribe', $planId),
            'cancel_url'  => \route('cancel')
        ]);
    }

    public function subscribe($planId)
    {
        $plan = Plan::find($planId);

        Subscription::create([
            'trainee_id' => auth()->user()->trainee->id,
            'plan_id'    => $planId,
            'start_date' => now(),
            'end_date'   => now()->addDays($plan->duration),
            'duration'   => $plan->duration,
            'price_dollar'      => $plan->price_dollar,
            'payment_method' => PaymentMethod::CARD->value
        ]);

        return redirect('trainee');
    }

    public function cancel()
    {
        return 'تم الإلغاء';
    }
}
