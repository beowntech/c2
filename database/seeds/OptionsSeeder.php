<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create(
            [
                'option_name' => 'blog_video',
                'option_value' => json_encode([]),
                'status' => 1,
            ]
        );
    }
}
