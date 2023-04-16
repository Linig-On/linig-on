<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); //FK
            $table->foreignId('worker_id'); //FK
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('workers')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date_booked');
            $table->date('date_finished');
            $table->string('status');
            $table->decimal('amount');
            $table->string('client_first_name');
            $table->string('client_last_name');
            $table->string('client_email_address')->unique();
            $table->string('client_contact_number', 11);
            $table->char('client_gender', 1);
            $table->string('client_address');
            $table->string('type_of_area');
            $table->string('landmarks');
            $table->string('area_image_url')->nullable();
            $table->string('additional_details_requests')->nullable();
            $table->date('preferred_time');
            $table->date('preferred_date');
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
        Schema::dropIfExists('bookings');
    }
}
