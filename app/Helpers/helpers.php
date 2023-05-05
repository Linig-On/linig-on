<?php

namespace App\Helpers;

use App\Models\Notification;
use Carbon\Carbon;

class NotificationHandler {

    // { NEW ACCOUNT
    public static function createOnRegister($userId) {
        NotificationHandler::create(
            $userId,
            'Registration Complete!',
            'Congratulations! Your registration has been accepted. You can now log in to your Linig-On account to get started.',
        );
    }
    // }
    
    // { MAKING BOOKINGS
    public static function createOnBookingToUser($userId) {
        NotificationHandler::create(
            $userId,
            'Booking Successfully Created!',
            'You have successfully booked a service!',
        );
    }

    public static function createOnBookingToWorker($userId, $clientName) {
        NotificationHandler::create(
            $userId,
            'Someone booked a service!',
            'Hey! ' . $clientName . ' is in need of a service from you. Would you like accept it? View your Bookings tab.',
        );
    }
    // }

    // { A WORKER ACCEPTS CLIENT BOOKING
    public static function createOnBookingAcceptToUser($userId, $workerName) {
        NotificationHandler::create(
            $userId,
            'Booking Accepted!',
            'Hooray! ' . $workerName . ' has accepted and confirmed your booking.',
        );
    }

    public static function createOnBookingAcceptToWorker($userId, $clientName) {
        NotificationHandler::create(
            $userId,
            'Booking Accepted!',
            'Hey! You have accepted and confirmed a booking from the ' . $clientName . '.',
        );
    }
    // }

    // { A WORKER CANCELS CLIENT BOOKINGS
    public static function createOnBookingCanceledToUser($userId) {
        NotificationHandler::create(
            $userId,
            'Booking Canceled.',
            'Heads up! Your booking has been cancelled.',
        );
    }

    public static function createOnBookingCanceledToWorker($userId, $clientName) {
        NotificationHandler::create(
            $userId,
            'Booking Canceled.',
            'You have canceled a booking from ' . $clientName . '.',
        );
    }
    // }

    // { A WORKER MARK DONE A BOOKING
    public static function createOnBookingCompleteToUser($userId, $workerName) {
        NotificationHandler::create(
            $userId,
            'Service Done!',
            'Your cleaning appointment from ' . $workerName . 'has been completed. Thank you for trusting Linig-On!.',
        );
    }

    public static function createOnBookingCompleteToWorker($userId) {
        NotificationHandler::create(
            $userId,
            'Service Done!',
            'A service has been successfully implemented!',
        );
    }
    // }
    
    private static function create($userId, $heading, $message) {
        Notification::create([
            'user_id' => $userId,
            'heading' => $heading,
            'message' => $message,
            'created_at' => Carbon::now()
        ]);
    }
}
