<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppRatingSeeder extends Seeder
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
        DB::table('app_ratings')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = 
        [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Mark Niño Alden',
                'comment' => 'I like the app!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'Prince Jobert',
                'comment' => 'This app is really useful!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'name' => 'Joems Boletic',
                'comment' => 'Linig-On really made my life easier!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'name' => 'Denise Menubo',
                'comment' => 'Ayos! Totoong malaki ang naitutulong nito sa amin.',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'name' => 'Doms Esperida',
                'comment' => 'This app saved my life! I saved a lot of time. Thank you Linig-On!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($data as $apprating) {
            DB::table('app_ratings')->insert($apprating);
        }
    }
}
