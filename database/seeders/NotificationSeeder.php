<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
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
        DB::table('notifications')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data =  [
            [
                'id' => 1,
                'user_id' => 1,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a User Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a User Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a User Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a User Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a User Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'worker_id' => 1,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'worker_id' => 2,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'worker_id' => 3,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],    
            [
                'id' => 9,
                'worker_id' => 4,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'id' => 10,
                'worker_id' => 5,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'id' => 11,
                'user_id' => 11,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created an Admin Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'id' => 12,
                'user_id' => 12,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created an Admin Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'user_id' => 13,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created an Admin Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'worker_id' => 6,
                'heading' => 'Account Creation',
                'message' => 'Congratulations! You have successfully created a Worker Linig-On account!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'user_id' => 1,
                'heading' => 'Service Booking',
                'message' => 'Awesome! You have booked a service.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'user_id' => 2,
                'heading' => 'Service Booking',
                'message' => 'Awesome! You have booked a service.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'worker_id' => 1,
                'heading' => 'Received Booking',
                'message' => 'Hey! Someone booked a service from you.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'id' => 18,
                'worker_id' => 2,
                'heading' => 'Received Booking',
                'message' => 'Hey! Someone booked a service from you.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
        ];

        foreach ($data as $notification) {
            DB::table('notifications')->insert($notification);
        }
    }
}


/*
    Notifications:

        User:

        Account Creation -> 'Congratulations! You have successfully created a Linig-On account.'
        Successfully Booked -> 'Awesome! You have booked a service.'


        Worker:
        Account Creation -> 'Congratulations! You have successfully created a Worker Linig-On account.'
        Received Booking -> 'Hey! Someone booked a service from you.'

        
        Admin:
         Account Creation -> 'Congratulations! You have successfully created an Admin Linig-On account.'
        

*/