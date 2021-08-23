<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('freelancer')->insert([
            'name' => 'Max Mustermann',
        ]);

        DB::table('freelancer')->insert([
            'name' => 'Peter Maier',
        ]);

        DB::table('freelancer')->insert([
            'name' => 'Martina Schulte',
        ]);

        DB::table('freelancer')->insert([
            'name' => 'Lena Musterfrau',
        ]);

    }
}
