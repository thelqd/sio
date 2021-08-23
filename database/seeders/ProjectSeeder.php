<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project')->insert([
            'name' => 'Demo Project 1',
        ]);

        DB::table('project')->insert([
            'name' => 'Demo Project 2',
        ]);

        DB::table('project')->insert([
            'name' => 'Demo Project 3',
        ]);
    }
}
