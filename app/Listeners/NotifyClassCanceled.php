<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Jobs\NotifyClassCanceledJob;
use App\Mail\ClassCancelMail;
use App\Notifications\ClassCancelNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {
        $members = $event->scheduledClass->member()->get();
        $className= $event->scheduledClass->classType->name;
        $classDateTime=$event->scheduledClass->date_time;
        $details = compact('className','classDateTime');

//        $members->each(function($user) use ($details) {
//            //Send Mail to Users
//            $name = $user ->name;
//            Mail::to($user)->send(new ClassCancelMail($details,$name));
//        });

        //Notification::send($members,new ClassCancelNotification($details));
        NotifyClassCanceledJob::dispatch($members,$details);
    }
}
