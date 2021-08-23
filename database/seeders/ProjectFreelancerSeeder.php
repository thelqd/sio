<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectFreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_freelancer')->insert([
            'project_id' => 1,
            'freelancer_id' => 1,
        ]);
        DB::table('project_freelancer')->insert([
            'project_id' => 1,
            'freelancer_id' => 3,
        ]);
        DB::table('project_freelancer')->insert([
            'project_id' => 1,
            'freelancer_id' => 4,
        ]);

        DB::table('project_freelancer')->insert([
            'project_id' => 2,
            'freelancer_id' => 2,
        ]);
        DB::table('project_freelancer')->insert([
            'project_id' => 2,
            'freelancer_id' => 3,
        ]);

        DB::table('project_freelancer')->insert([
            'project_id' => 3,
            'freelancer_id' => 1,
        ]);
        DB::table('project_freelancer')->insert([
            'project_id' => 3,
            'freelancer_id' => 4,
        ]);
    }
}
