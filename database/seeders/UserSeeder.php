<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        $users = [
            [
                'id' => 1,
                'first_name' => 'Mark Niño',
                'last_name' => 'Alden',
                'gender' => 'M',
                'email' => 'mnalden@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09126451275',
                'address' => '233 Juniper Drive, South Burlington VT 05403',
                'user_type' => 'USR', //USR ADM SVC->service
                'image_url' => null,
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
                'user_type' => 'USR', //USR ADM SVC->service
                'image_url' => null,
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
                'user_type' => 'USR', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 4,
                'first_name' => 'Patrick',
                'last_name' => 'Dimabugti',
                'gender' => 'M',
                'email' => 'pdimabugti@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456756',
                'address' => '2961 Vinson Road, Montgomery AL 36110',
                'user_type' => 'SVC', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 5,
                'first_name' => 'Baby',
                'last_name' => 'Stevens',
                'gender' => 'F',
                'email' => 'bstevens@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09123456345',
                'address' => '2307 East 72nd Avenue, Anchorage AK 99507',
                'user_type' => 'SVC', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 6,
                'first_name' => 'Bea',
                'last_name' => 'Lim',
                'gender' => 'F',
                'email' => 'blim@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09875456345',
                'address' => '9009 West Nicolet Avenue, Glendale AZ 85305',
                'user_type' => 'SVC', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 7,
                'first_name' => 'Jim',
                'last_name' => 'Borkum',
                'gender' => 'M',
                'email' => 'jborkum@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09878166345',
                'address' => '67 Steeplechase Drive, Manchester CT 06040',
                'user_type' => 'SVC', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 8,
                'first_name' => 'Rob',
                'last_name' => 'Nelikina',
                'gender' => 'M',
                'email' => 'rnelikina@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09879186345',
                'address' => '130 Old Route 103, Chester VT 05143',
                'user_type' => 'USR', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 9,
                'first_name' => 'Denise',
                'last_name' => 'Menubo',
                'gender' => 'F',
                'email' => 'dmenubo@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09879198372',
                'address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'user_type' => 'SVC', //USR ADM SVC->service
                'image_url' => null,
            ],
            [
                'id' => 10,
                'first_name' => 'Doms',
                'last_name' => 'Esperida',
                'gender' => 'M',
                'email' => 'desperida@gmail.com',
                'password' => Hash::make('password'),
                'contact_number' => '09872639186',
                'address' => '8757 Lamar Circle, Arvada CO 80003',
                'user_type' => 'USR', //USR ADM SVC->service
                'image_url' => null,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
