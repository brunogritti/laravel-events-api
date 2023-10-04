<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventGuest extends Model
{
    protected $table = 'event_guests';

    protected $fillable = [
        'name',
        'date',
        'category_id',
        'address_id',
    ];
}