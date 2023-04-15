<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoPorviderSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'settings' => 'array',
    ];
}
