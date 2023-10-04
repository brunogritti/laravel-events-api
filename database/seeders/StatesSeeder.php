<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Contracts\SeederFunctions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class StatesSeeder extends Seeder
{
    use SeederFunctions;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                "id"         => 12,
                "name"       => "Acre",
                "abbr"       => "AC",
                "slug"       => "acre"
            ],
            [
                "id"         => 27,
                "name"       => "Alagoas",
                "abbr"       => "AL",
                "slug"       => "alagoas"
            ],
            [
                "id"         => 16,
                "name"       => "Amapá",
                "abbr"       => "AP",
                "slug"       => "amapa"
            ],
            [
                "id"         => 13,
                "name"       => "Amazonas",
                "abbr"       => "AM",
                "slug"       => "amazonas"
            ],
            [
                "id"         => 29,
                "name"       => "Bahia",
                "abbr"       => "BA",
                "slug"       => "bahia"
            ],
            [
                "id"         => 23,
                "name"       => "Ceará",
                "abbr"       => "CE",
                "slug"       => "ceara"
            ],
            [
                "id"         => 53,
                "name"       => "Distrito Federal",
                "abbr"       => "DF",
                "slug"       => "distrito-federal"
            ],
            [
                "id"         => 32,
                "name"       => "Espírito Santo",
                "abbr"       => "ES",
                "slug"       => "espirito-santo"
            ],
            [
                "id"         => 52,
                "name"       => "Goiás",
                "abbr"       => "GO",
                "slug"       => "goias"
            ],
            [
                "id"         => 21,
                "name"       => "Maranhão",
                "abbr"       => "MA",
                "slug"       => "maranhao"
            ],
            [
                "id"         => 51,
                "name"       => "Mato Grosso",
                "abbr"       => "MT",
                "slug"       => "mato-grosso"
            ],
            [
                "id"         => 50,
                "name"       => "Mato Grosso do Sul",
                "abbr"       => "MS",
                "slug"       => "mato-grosso-do-sul"
            ],
            [
                "id"         => 31,
                "name"       => "Minas Gerais",
                "abbr"       => "MG",
                "slug"       => "minas-gerais"
            ],
            [
                "id"         => 15,
                "name"       => "Pará",
                "abbr"       => "PA",
                "slug"       => "para"
            ],
            [
                "id"         => 25,
                "name"       => "Paraíba",
                "abbr"       => "PB",
                "slug"       => "paraiba"
            ],
            [
                "id"         => 41,
                "name"       => "Paraná",
                "abbr"       => "PR",
                "slug"       => "parana"
            ],
            [
                "id"         => 26,
                "name"       => "Pernambuco",
                "abbr"       => "PE",
                "slug"       => "pernambuco"
            ],
            [
                "id"         => 22,
                "name"       => "Piauí",
                "abbr"       => "PI",
                "slug"       => "piaui"
            ],
            [
                "id"         => 33,
                "name"       => "Rio de Janeiro",
                "abbr"       => "RJ",
                "slug"       => "rio-de-janeiro"
            ],
            [
                "id"         => 24,
                "name"       => "Rio Grande do Norte",
                "abbr"       => "RN",
                "slug"       => "rio-grande-do-norte"
            ],
            [
                "id"         => 43,
                "name"       => "Rio Grande do Sul",
                "abbr"       => "RS",
                "slug"       => "rio-grande-do-sul"
            ],
            [
                "id"         => 11,
                "name"       => "Rondônia",
                "abbr"       => "RO",
                "slug"       => "rondonia"
            ],
            [
                "id"         => 14,
                "name"       => "Roraima",
                "abbr"       => "RR",
                "slug"       => "roraima"
            ],
            [
                "id"         => 42,
                "name"       => "Santa Catarina",
                "abbr"       => "SC",
                "slug"       => "santa-catarina"
            ],
            [
                "id"         => 35,
                "name"       => "São Paulo",
                "abbr"       => "SP",
                "slug"       => "sao-paulo"
            ],
            [
                "id"         => 28,
                "name"       => "Sergipe",
                "abbr"       => "SE",
                "slug"       => "sergipe"
            ],
            [
                "id"         => 17,
                "name"       => "Tocantins",
                "abbr"       => "TO",
                "slug"       => "tocantins"
            ]
        ];

        $this->populateDatabase($states, \App\Models\State::class, ['slug']);
    }
}
