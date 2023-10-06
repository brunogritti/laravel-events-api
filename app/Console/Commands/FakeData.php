<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fake-data';

    /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Run factories to create test database';

   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct()
   {
       parent::__construct();
   }

   /**
    * Execute the console command.
    *
    * @return int
    */
   public function handle()
   {
       try {
           \App\Models\Address::factory()->count(3)->create();
           \App\Models\User::factory()->count(5)->create();
           \App\Models\Event::factory()->count(5)->create();

           $this->info('Data succesfully generated!');

       } catch (\Throwable $th) {
            $this->error($th->getMessage());
       }
   }
}
