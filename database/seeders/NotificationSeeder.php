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
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'user_id' => 6,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'user_id' => 7,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'user_id' => 8,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],    
            [
                'id' => 9,
                'user_id' => 9,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],  
            [
                'id' => 10,
                'user_id' => 10,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],  
            [
                'id' => 11,
                'user_id' => 11,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],  
            [
                'id' => 12,
                'user_id' => 12,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'user_id' => 13,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'user_id' => 14,
                'heading' => 'Registration Complete!',
                'message' => 'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $notification) {
            DB::table('notifications')->insert($notification);
        }
    }
}