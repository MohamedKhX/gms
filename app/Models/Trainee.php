<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Trainee extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function name(): Attribute
    {
        return Attribute::get(function ($value) {
            return $this->user->first_name . ' ' . $this->user->middle_name . ' ' . $this->user->last_name;
        });
    }

    public function plans(): HasManyThrough
    {
        return $this->hasManyThrough(Plan::class, Subscription::class, 'trainee_id', 'id', 'id', 'plan_id');
    }

    public function privateCoaches()
    {
        return $this->plans->map(function ($plan) {
            return $plan->privateCoach->user;
        });
    }

    public function hasAnyPrivateCoach()
    {
        return $this->plans->isNotEmpty();
    }

    public function diets(): HasMany
    {
        return $this->hasMany(Diet::class);
    }
}
