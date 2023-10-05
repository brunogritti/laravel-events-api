<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'zipcode',
        'address',
        'number',
        'neighborhood',
        'complement',
        'state_id',
        'city_id',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Obtem o estado
     * @return \App\Models\State::class
     */
    public function state()
    {
        return $this->hasOne(\App\Models\State::class, 'id', 'state_id');
    }

    /**
     * Obtem o estado
     * @return \App\Models\City::class
     */
    public function city()
    {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
    }
}