<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'event_categories';

    protected $fillable = [
        'name',
        'date',
        'category_id',
        'address_id',
    ];
}