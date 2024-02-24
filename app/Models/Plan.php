<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($plan) {
            $stripeInfo = $plan->createNewStripeProduct($plan->name, $plan->price_dollar);
            $plan->stripe_product_id = $stripeInfo['product_id'];
            $plan->stripe_price_id   = $stripeInfo['price_id'];
        });

        static::deleting(function ($plan) {
            $plan->deleteStripeProduct();
        });
    }

    public function sports(): BelongsToMany
    {
        return $this->belongsToMany(Sport::class);
    }

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function privateCoach(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coach::class, 'private_coach_id');
    }


    protected function createNewStripeProduct($name, $price)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripeProduct =  $stripe->products->create(['name' => 'Gold Plan']);

        $stripePrice = $stripe->prices->create([
            'currency' => 'usd',
            'unit_amount' => $price * 100,
            'recurring' => ['interval' => 'month'],
            'product_data' => ['name' => $name],
        ]);

        return [
            'product_id' => $stripeProduct->id,
            'price_id' => $stripePrice->id
        ];
    }

    protected function deleteStripeProduct(): void
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripe->products->delete($this->stripe_product_id);
    }
}
