<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';

    protected $fillable = [
        'name',
        'date',
        'category_id',
        'address_id',
    ];

    /**
     * Obtem o endereço
     * @return \App\Models\Address::class
     */
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class, 'id', 'address_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\EventCategory::class);
    }
}