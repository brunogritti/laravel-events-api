<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'abbr',
        'slug',
        'active',
    ];

    //buscar usuarios por estado
    public function allUsers()
    {
        return $this->hasManyThrough(
            //2 prmeiros parametros determinaram qual caminho de sera seguido para o relacionamento
            'App\Models\User', //tabela final
            'App\Models\Address', //tabela intermediaria

            //2 próximos parametros, são relacionados com os ultimos parametros
            'state_id', //campo da tabela intermediaria que sera relacionado tabela de origem
            'id', //campo da tabela final que sera relacionado com a tabela intermediaria

            //2 ultimos parametros são os campos que se relacionam com os de cima
            'id', //campo tabela origem para se relacionar com a tabela intermediaria
            'user_id' //campo da tabela intermediaria vai se relacionar com a tabela final
        );
    }

    /**
     * Get Cities by State
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function cities()
    {
        return $this->hasMany(\App\Models\City::class);
    }
}
