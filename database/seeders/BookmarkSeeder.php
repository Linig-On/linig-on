<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookmarkSeeder extends Seeder
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
        DB::table('bookmarks')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'worker_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'worker_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'worker_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'worker_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'worker_id' => 4,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'worker_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'user_id' => 3,
                'worker_id' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'user_id' => 3,
                'worker_id' => 4,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'user_id' => 3,
                'worker_id' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'user_id' => 4,
                'worker_id' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'user_id' => 4,
                'worker_id' => 6,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'user_id' => 5,
                'worker_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'user_id' => 5,
                'worker_id' => 4,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'user_id' => 5,
                'worker_id' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'user_id' => 5,
                'worker_id' => 6,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $bookmark) {
            DB::table('bookmarks')->insert($bookmark);
        }
    }
}
