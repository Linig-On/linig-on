<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table
        DB::table('worker_skills')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [
            [
                'id' => 1,
                'worker_id' => 1,
                'skill' => 'Housemaid',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'worker_id' => 1,
                'skill' => 'Ironing',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'worker_id' => 1,
                'skill' => 'Dish Washing',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'worker_id' => 2,
                'skill' => 'Cleaning',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'worker_id' => 2,
                'skill' => 'Folding & Ironing',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'worker_id' => 3,
                'skill' => 'Laundry',
                'created_at' => Carbon::now()
            ]
        ];

        foreach ($data as $skill) {
            DB::table('worker_skills')->insert($skill);
        }
    }
}
