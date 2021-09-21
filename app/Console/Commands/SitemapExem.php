<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use App\DynamicPage;
use App\Exam;

class SitemapExem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:exam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sitemap Exam';

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

        $data = Exam::all();
        foreach ($data as $s => $val) {
            if ($val->seo->isNotEmpty()) {
                $city = Exam::where('id', $val->id)->get();
                if ($city->isNotEmpty()) {
                    foreach ($city as $c => $value) {
                        if ($value->location->isNotEmpty()) {
                            $sitemap->add(Url::create(env('APP_URL') . "/exam/" . $val->seo[0]->permalink . "")
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                                ->setLastModificationDate($val->updated_at)
                                ->setPriority(1.0));
                        }
                    }
                }
            }
        }
        $sitemap->writeToFile(public_path('sitemap_exam.xml'));
    }
}
