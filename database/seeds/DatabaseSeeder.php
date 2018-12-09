<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_types')->insert([
            'id'   => 1,
            'name' => 'Novo'
        ]);

        DB::table('service_types')->insert([
            'id'   => 2,
            'name' => 'Devolução'
        ]);
    }
}
