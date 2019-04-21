<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Jobs\SendWelcomeEmailJob;
use Carbon\Carbon;

Route::get(
    '/', 
    function () {
        return view('welcome');
    }
);

Route::get(
    '/sendEmail',
    function () {
        $job = SendWelcomeEmailJob::dispatch()
                ->onQueue('default')
                ->delay(
                    Carbon::now()->addSeconds(5)
                );

        return "welcome email sent!";
    }
);

Route::get(
    '/sendCountEmails/{number}',
    function ($number) {
        for ($i=0; $i < $number; $i++) { 
            $job = SendWelcomeEmailJob::dispatch()->onQueue('high');
        }

        return "welcome emails sent!";
    }
);
