<?php

namespace App\Helpers;

use App\Models\Notification;
use Carbon\Carbon;

function createNewAccountNotification($userId) {
    Notification::create([
        'user_id' => $userId,
        'heading' => 'Account Creation',
        'message' => 'Congratulations! You have successfully registered your Linig-On account!',
    ]);
}

function createNewBookingToServiceNotification($workerId) {
    Notification::create([
        'user_id' => $workerId,
        'heading' => 'New Booking!',
        'message' => 'Someone booked a service from you.',
    ]);
}

function createBookingNotification($userId, $workerName) {
    Notification::create([
        'user_id' => $userId,
        'heading' => 'Service Booking',
        'message' => 'Your service to ' . $workerName . ' was successful and is waiting to be approved by the worker.',
    ]);
}

function createNotification($userId, $heading, $message)
{
    Notification::create([
        'user_id' => $userId,
        'heading' => $heading,
        'message' => $message,
        'created_at' => Carbon::now()
    ]);
}
