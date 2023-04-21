<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Worker;
use Carbon\Carbon;
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
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table
        DB::table('workers')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data =  [
            [
                'id' => 1,
                'user_id' => 6,
                'resume_url' => 'resume0.pdf',
                'short_bio' => 'Hi, I\'m Patrick and I\'m a household maid. Cleaning is my passion, and it\'s been my full-time job for over 10 years now. I take great pride in providing excellent service to my clients, making sure their homes are always spotless and inviting.',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 7,
                'resume_url' => 'resume1.pdf',
                'short_bio' => 'Hi, I\'m Baby. I specialize in cleaning services and making sure everything is neat and tidy. Whether it\'s in a home or business, I take pride in my work and always strive to make sure the job is done right. I love helping people out and making their lives easier.',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 8,
                'resume_url' => 'resume2.pdf',
                'short_bio' => 'Hi, I\'m Bea! I\'m a service worker who loves to clean and help others. I take pride in my work and enjoy making a difference in people\'s lives',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 9,
                'resume_url' => 'resume3.pdf',
                'short_bio' => 'Hi, I\'m Jim! I\'m a service worker who specialize in cleaning garages. I\'m always focused and always keep the job done',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'user_id' => 10,
                'resume_url' => 'resume4.pdf',
                'short_bio' => 'Hi, I\'m Rob! I\'ve been cleaning households for more than 15 years now. As soon as I pick up my tools and marterials for cleaning, I always make sure to finish my tasks',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'user_id' => 14,
                'resume_url' => 'resume5.pdf',
                'short_bio' => 'Hi, I\'m Dia! I\'ve been a part of the cleaning community for years now. Once I start cleaning, I always stay focused and finish my tasks on time.',
                'service_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum ullam consequuntur, esse assumenda maxime repellat sapiente rem pariatur ut. Accusamus quod qui nemo, quaerat nulla voluptatum explicabo perferendis rerum?',
                'is_approved' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($data as $worker) {
            DB::table('workers')->insert($worker);
        }
    }
}
