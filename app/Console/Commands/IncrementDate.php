<?php

namespace App\Console\Commands;

use App\Models\ScheduledClass;
use Illuminate\Console\Command;

class IncrementDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increment-date {--day=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledClasses = ScheduledClass::latest('date_time')->get();
        $scheduledClasses->each(function ($class){
            $class->date_time = $class->date_time->addDays(intval($this->option('day')));
            $class->save();
        });
    }
}
