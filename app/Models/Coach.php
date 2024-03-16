<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Coach extends Model
{
    /* علاقة واحد لواحد مع المستخدم */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

























    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];


    public function traineeSubscriptions(): HasManyThrough
    {
        return $this->hasManyThrough(Subscription::class, Plan::class, 'private_coach_id', 'plan_id', 'id', 'id');
    }

    public function trainees()
    {
        $subscriptions = $this->traineeSubscriptions;
        return $subscriptions->map(function ($subscription) {
            return $subscription->trainee->user;
        });
    }

    public function name(): Attribute
    {
        return Attribute::get(function ($value) {
            return $this->user->first_name . ' ' . $this->user->middle_name . ' ' . $this->user->last_name;
        });
    }
}
