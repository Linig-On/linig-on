<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
        DB::table('users')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [
            [
                'id' => 1,
                'first_name' => 'Mark Niño',
                'last_name' => 'Alden',
                'gender' => 'M',
                'email' => 'mnalden@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09126451275',
                'address' => '233 Juniper Drive, South Burlington VT 05403',
                'user_type' => 'USR',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'first_name' => 'Prince',
                'last_name' => 'Jobert',
                'gender' => 'M',
                'email' => 'pjobert@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456789',
                'address' => '2715 Thornbrook Court, Odenton MD 21113',
                'user_type' => 'USR',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'first_name' => 'Joems',
                'last_name' => 'Boletic',
                'gender' => 'M',
                'email' => 'jboletic@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456788',
                'address' => '102 Hayes Drive, Pooler GA 31322',
                'user_type' => 'USR',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'first_name' => 'Denise',
                'last_name' => 'Menubo',
                'gender' => 'F',
                'email' => 'dmenubo@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09879198372',
                'address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'user_type' => 'USR',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'first_name' => 'Doms',
                'last_name' => 'Esperida',
                'gender' => 'M',
                'email' => 'desperida@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09872639186',
                'address' => '8757 Lamar Circle, Arvada CO 80003',
                'user_type' => 'USR',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'first_name' => 'Patrick',
                'last_name' => 'Dimabugti',
                'gender' => 'M',
                'email' => 'pdimabugti@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456756',
                'address' => '2961 Vinson Road, Montgomery AL 36110',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'first_name' => 'Baby',
                'last_name' => 'Stevens',
                'gender' => 'F',
                'email' => 'bstevens@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456345',
                'address' => '2307 East 72nd Avenue, Anchorage AK 99507',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'first_name' => 'Bea',
                'last_name' => 'Lim',
                'gender' => 'F',
                'email' => 'blim@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09875456345',
                'address' => '9009 West Nicolet Avenue, Glendale AZ 85305',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'first_name' => 'Jim',
                'last_name' => 'Borkum',
                'gender' => 'M',
                'email' => 'jborkum@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09878166345',
                'address' => '67 Steeplechase Drive, Manchester CT 06040',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'first_name' => 'Rob',
                'last_name' => 'Nelikina',
                'gender' => 'M',
                'email' => 'rnelikina@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09879186345',
                'address' => '130 Old Route 103, Chester VT 05143',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'first_name' => 'Johcel Gene',
                'last_name' => 'Bitara',
                'gender' => 'M',
                'email' => 'gene@gmail.com',
                'password' => Hash::make('administrator'),
                'contact_number' => '09701234561',
                'address' => '642 North New Dr. Hamilton, OH 45011',
                'user_type' => 'ADM',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'first_name' => 'Camela Kim',
                'last_name' => 'Quidip',
                'gender' => 'F',
                'email' => 'kim@gmail.com',
                'password' => Hash::make('administrator'),
                'contact_number' => '09704325661',
                'address' => '7812 Third St. Fremont, OH 43420',
                'user_type' => 'ADM',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'first_name' => 'Mathew',
                'last_name' => 'Talagtag',
                'gender' => 'M',
                'email' => 'mat@gmail.com',
                'password' => Hash::make('administrator'),
                'contact_number' => '09560192831',
                'address' => '7312 Bradford Ave. Naples, FL 34116',
                'user_type' => 'ADM',
                'image_url' => null,
                'created_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'first_name' => 'Dia',
                'last_name' => 'Reeves',
                'gender' => 'F',
                'email' => 'dreeves@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09581672831',
                'address' => '1234 Ateneo Ave. Oracle, NY 94872',
                'user_type' => 'SVC',
                'image_url' => null,
                'created_at' => Carbon::now()
            ]
        ];

        foreach ($data as $user) {
            DB::table('users')->insert($user);
        }
    }
}
