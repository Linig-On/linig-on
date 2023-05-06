<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
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
        DB::table('bookings')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'worker_id' => 1,
                'date_booked' => '2023-04-29',
                'date_finished' => null,
                'status' => 'Pending', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Pool',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '07:30:00',
                'preferred_date' => '2023-05-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'worker_id' => 2,
                'date_booked' => '2023-04-30',
                'date_finished' => null,
                'status' => 'Pending', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-05-16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'worker_id' => 3,
                'date_booked' => '2023-04-25',
                'date_finished' => null,
                'status' => 'Pending', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'House',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '09:00:00',
                'preferred_date' => '2023-05-16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'worker_id' => 4,
                'date_booked' => '2023-04-25',
                'date_finished' => null,
                'status' => 'Pending', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 371352',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:30:00',
                'preferred_date' => '2023-05-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to patrick
                'id' => 5,
                'user_id' => 2,
                'worker_id' => 1,
                'date_booked' => '2023-01-01',
                'date_finished' => '2023-02-01',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to patrick
                'id' => 6,
                'user_id' => 3,
                'worker_id' => 1,
                'date_booked' => '2023-01-02',
                'date_finished' => '2023-02-02',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Pool',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-02',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to patrick
                'id' => 7,
                'user_id' => 1,
                'worker_id' => 1,
                'date_booked' => '2023-01-03',
                'date_finished' => '2023-02-03',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Room',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:00:00',
                'preferred_date' => '2023-02-03',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to patrick
                'id' => 8,
                'user_id' => 4,
                'worker_id' => 1,
                'date_booked' => '2023-01-04',
                'date_finished' => '2023-02-04',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Room',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:00:00',
                'preferred_date' => '2023-02-04',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to patrick
                'id' => 9,
                'user_id' => 5,
                'worker_id' => 1,
                'date_booked' => '2023-01-05',
                'date_finished' => '2023-02-05',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'House',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '03:30:00',
                'preferred_date' => '2023-02-05',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to baby
                'id' => 10,
                'user_id' => 4,
                'worker_id' => 2,
                'date_booked' => '2023-01-06',
                'date_finished' => '2023-02-06',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-06',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to baby
                'id' => 11,
                'user_id' => 1,
                'worker_id' => 2,
                'date_booked' => '2023-01-07',
                'date_finished' => '2023-02-07',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Pool',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '09:30:00',
                'preferred_date' => '2023-02-07',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to baby
                'id' => 12,
                'user_id' => 5,
                'worker_id' => 2,
                'date_booked' => '2023-01-08',
                'date_finished' => '2023-02-08',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '03:30:00',
                'preferred_date' => '2023-02-08',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to baby
                'id' => 13,
                'user_id' => 2,
                'worker_id' => 2,
                'date_booked' => '2023-01-09',
                'date_finished' => '2023-02-09',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Room',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '11:00:00',
                'preferred_date' => '2023-02-09',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to baby
                'id' => 14,
                'user_id' => 3,
                'worker_id' => 2,
                'date_booked' => '2023-01-10',
                'date_finished' => '2023-02-10',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Room',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to bea
                'id' => 15,
                'user_id' => 5,
                'worker_id' => 3,
                'date_booked' => '2023-01-11',
                'date_finished' => '2023-02-11',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'House',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:30:00',
                'preferred_date' => '2023-02-11',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to bea
                'id' => 16,
                'user_id' => 4,
                'worker_id' => 3,
                'date_booked' => '2023-01-12',
                'date_finished' => '2023-02-12',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to bea
                'id' => 17,
                'user_id' => 3,
                'worker_id' => 3,
                'date_booked' => '2023-01-13',
                'date_finished' => '2023-02-13',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Room',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-13',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to bea
                'id' => 18,
                'user_id' => 2,
                'worker_id' => 3,
                'date_booked' => '2023-01-14',
                'date_finished' => '2023-02-14',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '11:00:00',
                'preferred_date' => '2023-02-14',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to bea
                'id' => 19,
                'user_id' => 1,
                'worker_id' => 3,
                'date_booked' => '2023-01-15',
                'date_finished' => '2023-02-15',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Room',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-02-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to jim
                'id' => 20,
                'user_id' => 1,
                'worker_id' => 4,
                'date_booked' => '2023-01-16',
                'date_finished' => '2023-02-16',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Pool',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-02-16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to jim
                'id' => 21,
                'user_id' => 2,
                'worker_id' => 4,
                'date_booked' => '2023-01-17',
                'date_finished' => '2023-02-17',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Pool',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-17',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to jim
                'id' => 22,
                'user_id' => 3,
                'worker_id' => 4,
                'date_booked' => '2023-01-18',
                'date_finished' => '2023-02-18',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Room',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-18',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to jim
                'id' => 23,
                'user_id' => 4,
                'worker_id' => 4,
                'date_booked' => '2023-01-19',
                'date_finished' => '2023-02-19',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:30:00',
                'preferred_date' => '2023-02-19',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to jim
                'id' => 24,
                'user_id' => 5,
                'worker_id' => 4,
                'date_booked' => '2023-01-20',
                'date_finished' => '2023-02-20',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'House',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:30:00',
                'preferred_date' => '2023-02-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to rob
                'id' => 25,
                'user_id' => 5,
                'worker_id' => 5,
                'date_booked' => '2023-01-21',
                'date_finished' => '2023-02-21',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'Pool',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:30:00',
                'preferred_date' => '2023-02-21',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to rob
                'id' => 26,
                'user_id' => 4,
                'worker_id' => 5,
                'date_booked' => '2023-01-22',
                'date_finished' => '2023-02-22',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Room',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '01:30:00',
                'preferred_date' => '2023-02-22',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to rob
                'id' => 27,
                'user_id' => 3,
                'worker_id' => 5,
                'date_booked' => '2023-01-23',
                'date_finished' => '2023-02-23',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '11:00:00',
                'preferred_date' => '2023-02-23',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to rob
                'id' => 28,
                'user_id' => 2,
                'worker_id' => 5,
                'date_booked' => '2023-01-24',
                'date_finished' => '2023-02-24',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '12:00:00',
                'preferred_date' => '2023-02-24',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to rob
                'id' => 29,
                'user_id' => 1,
                'worker_id' => 5,
                'date_booked' => '2023-01-25',
                'date_finished' => '2023-02-25',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'Room',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-02-25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni mark nino to dia
                'id' => 30,
                'user_id' => 1,
                'worker_id' => 6,
                'date_booked' => '2023-01-26',
                'date_finished' => '2023-02-26',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Mark Niño',
                'client_last_name' => 'Alden',
                'client_email_address' => 'mnalden@gmail.com',
                'client_contact_number' => '09126451275',
                'client_gender' => 'M',
                'client_address' => '233 Juniper Drive, South Burlington VT 05403',
                'type_of_area' => 'House',
                'landmarks' => 'Beside SM South Burlington',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-02-26',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni prince jobert to dia
                'id' => 31,
                'user_id' => 2,
                'worker_id' => 6,
                'date_booked' => '2023-01-27',
                'date_finished' => '2023-02-27',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Prince',
                'client_last_name' => 'Jobert',
                'client_email_address' => 'pjobert@gmail.com',
                'client_contact_number' => '09123456789',
                'client_gender' => 'M',
                'client_address' => '2715 Thornbrook Court, Odenton MD 21113',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Ateneo de Odenton University',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '09:30:00',
                'preferred_date' => '2023-02-27',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni joems to dia
                'id' => 32,
                'user_id' => 3,
                'worker_id' => 6,
                'date_booked' => '2023-01-28',
                'date_finished' => '2023-03-28',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Joems',
                'client_last_name' => 'Boletic',
                'client_email_address' => 'jboletic@gmail.com',
                'client_contact_number' => '09123456788',
                'client_gender' => 'M',
                'client_address' => '102 Hayes Drive, Pooler GA 31322',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near University of Pooler',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '11:00:00',
                'preferred_date' => '2023-03-28',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni denise to dia
                'id' => 33,
                'user_id' => 4,
                'worker_id' => 6,
                'date_booked' => '2023-01-29',
                'date_finished' => '2023-03-29',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Denise',
                'client_last_name' => 'Menubo',
                'client_email_address' => 'dmenubo@gmail.com',
                'client_contact_number' => '09879198372',
                'client_gender' => 'F',
                'client_address' => '8673 Burkitt Place Drive, Nolensville TN 37135',
                'type_of_area' => 'Garage',
                'landmarks' => 'Near Hotel Nolensville',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '02:30:00',
                'preferred_date' => '2023-03-29',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to dia
                'id' => 34,
                'user_id' => 5,
                'worker_id' => 6,
                'date_booked' => '2023-01-30',
                'date_finished' => '2023-03-30',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'Room',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-03-30',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [//book ni doms to dia
                'id' => 35,
                'user_id' => 5,
                'worker_id' => 6,
                'date_booked' => '2023-01-30',
                'date_finished' => '2023-03-30',
                'status' => 'Done', //Pending, Done, Cancelled
                'client_first_name' => 'Doms',
                'client_last_name' => 'Esperida',
                'client_email_address' => 'desperida@gmail.com',
                'client_contact_number' => '09872639186',
                'client_gender' => 'M',
                'client_address' => '8757 Lamar Circle, Arvada CO 80003',
                'type_of_area' => 'Room',
                'landmarks' => 'Near Caldiz',
                'area_image_url' => null, //NULL
                'additional_details_requests' => null, //NULL
                'preferred_time' => '08:30:00',
                'preferred_date' => '2023-03-30',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($data as $booking) {
            DB::table('bookings')->insert($booking);
        }
    }
}
