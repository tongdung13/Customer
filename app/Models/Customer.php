<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'email',
        'city_id',
        'image'
    ];


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

}
