<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use app\Notifications\PickupReminderNotification;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    // }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run')->daily()->at('01:00');

        $schedule->call(function () {
            $books = Book::whereDate('pickup_date', '=', Carbon::now()->addDays(2)->toDateString())->get();

            foreach ($books as $book) {
                $admins = User::where('is_admin', true)->get(); // Make sure this query correctly identifies your admin users
                foreach ($admins as $admin) {
                    $admin->notify(new PickupReminderNotification($book));
                }
            }
        })->daily();
    }
}
