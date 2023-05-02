<?php

namespace App\Helpers;

use App\Models\Notification;
use Carbon\Carbon;

class NotificationHandler {
    public function createOnRegister($userId) {
        $this->create(
            $userId,
            'Account Creation',
            'Congratulations! You have successfully registered your Linig-On account!',
        );
    }
    
    private function create($userId, $heading, $message) {
        Notification::create([
            'user_id' => $userId,
            'heading' => $heading,
            'message' => $message,
            'created_at' => Carbon::now()
        ]);
    }
}
