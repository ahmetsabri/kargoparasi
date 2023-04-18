<?php

namespace App\Models;

use Ahmetsabri\FatihLaravelSearch\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    use Searchable ;

    protected $searchable = ['name', 'plate'];

    protected $guarded = [];

    protected $with = ['district'];

    public function district()
    {
        return $this->hasOne(District::class);
    }

    public function scopePlate(Builder $builder, $plate)
    {
        return $builder->where('plate', $plate);
    }
}
