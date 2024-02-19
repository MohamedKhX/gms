<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}