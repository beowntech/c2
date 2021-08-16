<?php

namespace App\Console\Commands;

use App\Tales;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use App\DynamicPage;

class SitemapBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $data = Tales::where('deleted_at',null)->get();
        foreach ($data as $d => $val) {
            if ($val->seo->isNotEmpty()) {
                $sitemap->add(Url::create(env('APP_URL') . "/" . $val->seo[0]->permalink)
                    ->setLastModificationDate($val->created_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(1.0));
            }
        }
        $sitemap->writeToFile(public_path('sitemap_blogs.xml'));
    }
}
