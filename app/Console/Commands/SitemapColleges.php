<?php

namespace App\Console\Commands;

use App\Properties;
use Illuminate\Console\Command;
use App\SEO;
use App\Tales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use App\DynamicPage;

class SitemapColleges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:colleges';

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

        $data = Properties::where('deleted_at',null)->get();
        foreach ($data as $s => $val) {
            if ($val->seo->isNotEmpty()) {
                $city = Properties::where('id', $val->id)->with('location')->get();
                if($city[0]->location != null) {
                    $sitemap->add(Url::create(env('APP_URL')."/college-in-".strtolower(str_replace(' ','_',$city[0]->location->cities->name))."/".$val->seo[0]->permalink."")
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setLastModificationDate($val->updated_at)
                        ->setPriority(1.0));
                }
            }
        }
        $sitemap->writeToFile(public_path('sitemap_colleges.xml'));
    }
}
