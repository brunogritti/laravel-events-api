<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Contracts\SeederFunctions;

class EventCategoriesSeeder extends Seeder
{
    use SeederFunctions;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = [
            [
                "name" => "Corporate",
                "slug" => \Str::slug("Corporate")
            ]
        ];

        $this->populateDatabase($objects, \App\Models\EventCategory::class, ['slug']);
    }
}
