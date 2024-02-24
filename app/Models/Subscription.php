<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'payment_method' => PaymentMethod::class,
    ];

    protected $table = 'trainee_subscriptions';

    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function status(): Attribute
    {
        return Attribute::get(function ($value) {
            if ($this->end_date < now()) {
                return SubscriptionStatus::Expired->translate();
            }

            return SubscriptionStatus::Active->translate();
        });
    }

    public function pricePaid(): Attribute
    {
        return Attribute::get(function ($value) {
            if($this->payment_method == PaymentMethod::CASH) {
                return $this->price . ' د.ل ';
            }

            return $this->price_dollar . ' دولار ';
        });
    }
}
