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
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 7,
                'resume_url' => 'resume1.pdf',
                'short_bio' => 'Hi, I\'m Baby. I specialize in cleaning services and making sure everything is neat and tidy. Whether it\'s in a home or business, I take pride in my work and always strive to make sure the job is done right. I love helping people out and making their lives easier.',
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 8,
                'resume_url' => 'resume2.pdf',
                'short_bio' => 'Hi, I\'m Bea! I\'m a service worker who loves to clean and help others. I take pride in my work and enjoy making a difference in people\'s lives',
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'user_id' => 9,
                'resume_url' => 'resume3.pdf',
                'short_bio' => 'Hi, I\'m Jim! I\'m a service worker who specialize in cleaning garages. I\'m always focused and always keep the job done',
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 10,
                'resume_url' => 'resume4.pdf',
                'short_bio' => 'Hi, I\'m Rob! I\'ve been cleaning households for more than 15 years now. As soon as I pick up my tools and marterials for cleaning, I always make sure to finish my tasks',
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'user_id' => 14,
                'resume_url' => 'resume5.pdf',
                'short_bio' => 'Hi, I\'m Dia! I\'ve been a part of the cleaning community for years now. Once I start cleaning, I always stay focused and finish my tasks on time.',
                'service_info' => "<div>
                    <h1 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>ABOUT ME</h1>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                        <br style='margin: 0px; padding: 0px;'>
                    </div>
                    <div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'>
                    <span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjE0NDQ0ODc3ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->' style='margin: 0px; padding: 0px;'></span>
                    <span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Book a service hero!</span><br style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>My service offers a tailor-made cleaning services to fit your needs and budget. Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, even for students! I’ll help you organise and fulfil your household cleaning needs with my service!</span></div><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'><br style='margin: 0px; padding: 0px;'></span></div><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'>PRICING</h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><br style='margin: 0px; padding: 0px;'></div><h4 style='color: rgb(51, 51, 51); font-size: medium; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; font-weight: normal;'>With the low price of 000 PHP you can get a service with:</span></h4><h3 style='color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;'></h3><div style='color: rgb(51, 51, 51); font-size: medium; margin: 0px; padding: 0px;'><ul><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>General Cleaning</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Dish Washing</span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>Laundry<br></span></li><li style='margin: 0px; padding: 0px;'><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>...</span></li></ul><span data-metadata='<!--(figmeta)eyJmaWxlS2V5IjoiMDJ3RHYzUEE3Zm9lOTlSRWRqVzFQNSIsInBhc3RlSUQiOjk4OTAwMjMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->' style='margin: 0px; padding: 0px;'></span><span style='margin: 0px; padding: 0px; white-space: pre-wrap;'>What are you waiting for? Book now!</span></div>
                    </div>",
                'is_approved' => true,
                'created_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $worker) {
            DB::table('workers')->insert($worker);
        }
    }
}
