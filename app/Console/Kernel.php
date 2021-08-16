<?php

namespace App\Console;

use App\Console\Commands\NotifyUsers;
use App\Console\Commands\SitemapIndex;
use App\Console\Commands\SitemapBlogs;
use App\Console\Commands\SitemapColleges;
use App\Console\Commands\SitemapPromotionPage;
use App\Console\Commands\SitemapExem;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        NotifyUsers::class,
        SitemapIndex::class,
        SitemapBlogs::class,
        SitemapColleges::class,
        SitemapPromotionPage::class,
        SitemapExem::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
//        $schedule->command('bookings:notify')->everyMinute();
        $schedule->command('sitemap:index')->daily();
        $schedule->command('sitemap:blogs')->daily();
        $schedule->command('sitemap:colleges')->weekly();
        $schedule->command('sitemap:pp')->daily();
        $schedule->command('sitemap:weekly')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
