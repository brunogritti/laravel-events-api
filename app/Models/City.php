<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'state_id',
        'active',
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function getCitiesByIdState($stateId): array
    {
        if (is_numeric($stateId)) {
            return $this->where('state_id', $stateId)->orderBy('name', 'ASC')->get()->toArray();
        }

        return ['' => 'nenhum resultado'];

    }

    //buscar usuarios por cidade
    public function allUsers()
    {
        return $this->hasManyThrough(
            //2 prmeiros parametros determinaram qual caminho de sera seguido para o relacionamento
            'App\Models\User', //tabela final
            'App\Models\Address', //tabela intermediaria

            //2 próximos parametros, são relacionados com os ultimos parametros
            'city_id', //campo da tabela intermediaria que sera relacionado tabela de origem
            'id', //campo da tabela final que sera relacionado com a tabela intermediaria

            //2 ultimos parametros são os campos que se relacionam com os de cima
            'id', //campo tabela origem para se relacionar com a tabela intermediaria
            'user_id' //campo da tabela intermediaria vai se relacionar com a tabela final
        );
    }
}
