<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    protected $appends = ['links'];

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

    // accessor implementation
    protected function links() : Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/events/{$this->id}",
                ],
                [
                    'rel' => 'guests',
                    'url' => "/api/events/{$this->id}/guests",
                ],
            ],
            set: fn ($active) => (bool) $active,
        );
    }
}