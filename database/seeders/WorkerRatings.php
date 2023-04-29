<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class WorkerRatings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 6,
                'worker_id' =>  1,
                'name' => 'Prince Jobert',
                'comment' => 'They cleaned the place well and left the area spotless!',
                'rating' =>  4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 6,
                'worker_id' =>  1,
                'name' => 'Joems Boletic',
                'comment' => 'They were really professional in handling every items. Not to mention they really cleaned the place well',
                'rating' =>  4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 7,
                'worker_id' =>  2,
                'name' => 'Denise Menubo',
                'comment' => 'They are really professional! My house was really messy but they gave it a total make-over',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 7,
                'worker_id' =>  2,
                'name' => 'Mark Niño Alden',
                'comment' => 'I was so relieved to know that a service like this exists, not to mention that their cleaning was really great too.',
                'rating' => 5,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 8,
                'worker_id' =>  3,
                'name' => 'Doms Esperida',
                'comment' => 'My apartment was well-cleaned! It was a really good service.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
            [
                'user_id' => 8,
                'worker_id' =>  3,
                'name' => 'Doms Esperida',
                'comment' => 'This was my second time availing the cleaning service of Bea, and it is really great.',
                'rating' => 4,
                'created_at' => Carbon::now(),
                
            ],
        ];
        foreach ($data as $worker) {
            DB::table('worker_ratings')->insert($worker);
        }
    }
}
