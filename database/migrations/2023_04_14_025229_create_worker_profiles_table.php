<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('worker_first_name');
            $table->string('worker_last_name');
            $table->char('worker_gender', 1);
            $table->string('worker_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('worker_password');
            $table->string('worker_contact_number', 11);
            $table->string('worker_address');
            $table->string('image_url')->nullable();
            $table->string('resume_url')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_profiles');
    }
}
