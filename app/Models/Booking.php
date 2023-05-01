<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'worker_id',
        'date_booked',
        'date_finished',
        'status',
        'client_first_name',
        'client_last_name',
        'client_email_address',
        'client_contact_number',
        'client_gender',
        'client_address',
        'type_of_area',
        'landmarks',
        'area_image_url',
        'additional_details_requests',
        'preferred_time',
        'preferred_date',
    ];
}
