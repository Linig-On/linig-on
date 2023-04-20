<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSocialSeeder extends Seeder
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
        DB::table('worker_socials')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [
            [
                'id' => 1,
                'worker_id' => 1,
                'social' => 'www.facebook.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'worker_id' => 1,
                'social' => 'www.linkedin.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'worker_id' => 1,
                'social' => 'www.messenger.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'worker_id' => 2,
                'social' => 'www.facebook.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'worker_id' => 2,
                'social' => 'www.messenger.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'worker_id' => 3,
                'social' => 'www.linkedin.com',
                'created_at' => Carbon::now()
            ]
        ];

        foreach ($data as $social) {
            DB::table('worker_socials')->insert($social);
        }
    }
}
