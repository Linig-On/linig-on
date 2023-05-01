<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(['layouts.app', 'layouts.service'], function ($view) {
            if (Auth::check() != null) {
                $notifications = DB::table('notifications')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->take(7)
                    ->get();
                
                $view->with('listOfNotifications', $notifications);
            }
        });
        
    }
}
