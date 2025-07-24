<?php

namespace Database\Seeders;

use App\Models\HomeBanner;
use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeBanner;
        $obj->heading = "Welcome to Iftar Party";
        $obj->subheading = "February 21, 2026, Sultan's Dine - Baily Road";
        $obj->text = "You're cordially invited to a formal Iftar gathering to celebrate the blessings of Ramadan. Join us as we break our fast together on 21 February at 6pm at Sultan's Dine - Baily Road. Your presence would be a cherished addition to our evening";
        $obj->background = "home_banner_123456.jpg";
        $obj->event_date = "02/21/2026";
        $obj->event_time = "06:00:00 PM";
        $obj->save();

    }
}
