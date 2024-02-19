<?php

namespace App\Models;

use App\Enums\SportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'status' => SportStatus::class
    ];
}
