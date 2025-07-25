<?php

namespace Database\Seeders;

use App\Models\HomeWelcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeWelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeWelcome;
        $obj->heading = "Welcome To Our Website";
        $obj->description = "This involves defining the event's goals, target audience, theme, and budget. It also includes creating a timeline, selecting a venue, and sourcing vendors. ";
        $obj->photo = "home_welcome.jpg";
        $obj->button_text = "Read More";
        $obj->button_link = "#";
        $obj->status = "Show";
        $obj->save();
    }
}
