<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class WorkerRatingSeeder extends Seeder
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
        DB::table('worker_ratings')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $data = [
            [
                'user_id' => 2,
                'worker_id' =>  1,
                'name' => 'Prince Jobert',
                'comment' => 'They cleaned the place well and left the area spotless!',
                'rating' =>  3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  1,
                'name' => 'Joems Boletic',
                'comment' => 'They were really professional in handling every items. Not to mention they really cleaned the place well',
                'rating' =>  4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 1,
                'worker_id' =>  1,
                'name' => 'Mark Niño Alden',
                'comment' => 'I appreciate their attention to detail and the fact that they always leave my home looking spotless.',
                'rating' =>  5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 4,
                'worker_id' =>  1,
                'name' => 'Denise Menubo',
                'comment' => 'I was not happy with their attention to detail. The floors were still dirty, and there was dust on the furniture.',
                'rating' =>  2,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 5,
                'worker_id' =>  1,
                'name' => 'Doms Esperida',
                'comment' => 'I had to remind the cleaner to clean certain areas, and even then, the cleaning was not thorough',
                'rating' =>  1,
                'created_at' => Carbon::now(),
                
            ],
            // --worker 1 end--
            [
                'user_id' => 4,
                'worker_id' =>  2,
                'name' => 'Denise Menubo',
                'comment' => 'They did an incredible job cleaning my home. Everything was spotless and smelled fresh.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 1,
                'worker_id' =>  2,
                'name' => 'Mark Niño Alden',
                'comment' => 'Their cleaning service is amazing! They always go above and beyond to make sure my home is clean and organized.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 5,
                'worker_id' =>  2,
                'name' => 'Doms Esperida',
                'comment' => 'Their work was thorough, but I did notice a few areas that could have been improved.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 2,
                'worker_id' =>  2,
                'name' => 'Prince Jobert',
                'comment' => 'Their service was average, but I expected a little more for the price.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  2,
                'name' => 'Joems Boletic',
                'comment' => 'They did a good job overall, but there were a few areas that needed more attention.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            // -- worker 2 end--
            [
                'user_id' => 5,
                'worker_id' =>  3,
                'name' => 'Doms Esperida',
                'comment' => 'Their cleaning service was okay, but they missed a few spots that I pointed out to them. Hopefully they improve next time..',
                'rating' => 2,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 4,
                'worker_id' =>  3,
                'name' => 'Denis Menubo',
                'comment' => 'Their cleaning was okay, but there were some areas that needed more work.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  3,
                'name' => 'Joems Boletic',
                'comment' => 'Their cleaning was mediocre, but it was done in a timely manner.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 2,
                'worker_id' =>  3,
                'name' => 'Prince Jobert',
                'comment' => 'The cleaners arrived late and seemed rushed during the cleaning. They did an okay job, but I was expecting more..',
                'rating' => 2,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 1,
                'worker_id' =>  3,
                'name' => 'Mark Alden',
                'comment' => 'Ako na lang kuta nag linig!',
                'rating' => 1,
                'created_at' => Carbon::now(),
                
            ],
            // -- worker 3 end-- 
            [
                'user_id' => 1,
                'worker_id' =>  4,
                'name' => 'Mark Alden',
                'comment' => 'They were polite and professional, and their cleaning was good overall.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 2,
                'worker_id' =>  4,
                'name' => 'Prince Jobert',
                'comment' => 'They were on time and efficient, and did a fantastic job cleaning my home. I would highly recommend them.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  4,
                'name' => 'Joems Boletic',
                'comment' => 'Their service was average, but there were some minor issues that needed addressing.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 4,
                'worker_id' =>  4,
                'name' => 'Denis Menubo',
                'comment' => 'Their cleaning was satisfactory, but there were some areas that needed more work.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 5,
                'worker_id' =>  4,
                'name' => 'Doms Esperida',
                'comment' => 'I was generally pleased with their service, but there were some minor issues..',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            // -- worker 4 end--
            [
                'user_id' => 10,
                'worker_id' =>  5,
                'name' => 'Doms Esperida',
                'comment' => 'I was blown away by the level of detail they put into cleaning my home. They left no stone unturned.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 4,
                'worker_id' =>  5,
                'name' => 'Denis Menubo',
                'comment' => 'I was generally satisfied with their service, but there were a few issues that needed addressing.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  5,
                'name' => 'Joems Boletic',
                'comment' => 'They did an okay job overall, but there were some spots that needed more attention.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 2,
                'worker_id' =>  5,
                'name' => 'Prince Jobert',
                'comment' => 'I was not too happy with their cleaning service. They missed a lot of spots, and I had to point them out and ask them to clean it again.',
                'rating' => 2,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 1,
                'worker_id' =>  5,
                'name' => 'Mark Alden',
                'comment' => 'Their cleaning was good, but there were some areas that needed a little more attention.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            // -- worker 5 end-- 
            [
                'user_id' => 1,
                'worker_id' =>  6,
                'name' => 'Mark Alden',
                'comment' => 'They did a fantastic job cleaning my kitchen and bathroom. I will definitely be using their service again.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 2,
                'worker_id' =>  6,
                'name' => 'Prince Jobert',
                'comment' => ' I am so impressed with their attention to detail. They really take pride in their work.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 3,
                'worker_id' =>  6,
                'name' => 'Joems Boletic',
                'comment' => 'I was not completely satisfied with their service, but it was okay.',
                'rating' => 3,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 4,
                'worker_id' =>  6,
                'name' => 'Denis Menubo',
                'comment' => 'They did a decent job, but there were a few things that could have been better.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 5,
                'worker_id' =>  6,
                'name' => 'Doms Esperida',
                'comment' => 'They are always professional and courteous. I trust them completely with my home.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ]

        ];
       foreach ($data as $worker) {
          DB::table('worker_ratings')->insert($worker);
         }
       
    }
}
