<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoProvider extends Model
{
    use HasFactory;

    public function settings()
    {
        return $this->hasOne(CargoPorviderSetting::class);
    }
}
