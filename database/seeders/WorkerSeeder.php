<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Worker;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workers =  [
            [
                'id' => 1,
                'user_id' => 4,
                'resume_url' => 'resume.pdf',
                'short_bio' => 'ed ut perspiciatis unde omnis iste natus error sit voluptatem',
                'service_info' => 'inventore veritatis et quasi architecto beatae vitae',
            ],
            [
                'id' => 2,
                'user_id' => 5,
                'resume_url' => 'resume1.pdf',
                'short_bio' => 'consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt',
                'service_info' => 'consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt',
            ],
            [
                'id' => 3,
                'user_id' => 6,
                'resume_url' => 'resume2.pdf',
                'short_bio' => 'consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt',
                'service_info' => 'consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt',
            ],
            [
                'id' => 4,
                'user_id' => 7,
                'resume_url' => 'resume3.pdf',
                'short_bio' => null,
                'service_info' => null,
            ],
            [
                'id' => 5,
                'user_id' => 9,
                'resume_url' => 'resume4.pdf',
                'short_bio' => null,
                'service_info' => null,
            ]
        ];

        foreach ($workers as $worker) {
            DB::table('workers')->insert($worker);
        }
    }
}
