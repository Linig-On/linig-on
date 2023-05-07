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
                'comment' => 'I\'ve tried a lot of apps with a similar purpose but this is by far the best. Easy to use, helpful, and convenient to use.',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'Prince Harry Jobert',
                'comment' => 'Very useful application! Booking services has never been more easier than before.',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'name' => 'Joems Boletic',
                'comment' => 'Linig-On really made my life easier! This application offers great household services and the best part is its convenience. Really great for those who is new to an area and is in need for a quick household service.',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'name' => 'Denise Menubo',
                'comment' => 'Intuitive interface and provide useful feedback to us users. Great application!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'name' => 'Emmanuel Doms Espedida',
                'comment' => 'Time-saver, the workers provides quality services. Nothing but great love for this application!',
                'is_liked' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($data as $appRating) {
            DB::table('app_ratings')->insert($appRating);
        }
    }
}
