<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class AdminHomeBannerController extends Controller
{
    public function index()
    {
        $home_banner = HomeBanner::where('id', 1)->first();
        return view('admin.home_banner.index', compact('home_banner'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => ['required'],
            'subheading' => ['required'],
            'event_date' => ['required'],
            'event_time' => ['required'],
        ]);

        $home_banner = HomeBanner::where('id', 1)->first();

        if ($request->background) {
            $request->validate([
                'background' => ['image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            ]);
            $final_name = 'home_banner_' . time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads'), $final_name);
            unlink(public_path('uploads/' . $home_banner->background));
            $home_banner->background = $final_name;
        }


        $home_banner->heading = $request->heading;
        $home_banner->subheading = $request->subheading;
        $home_banner->text = $request->text;
        $home_banner->event_date = $request->event_date;
        $home_banner->event_time = $request->event_time;
        $home_banner->update();

        return redirect()->back()->with('success', 'Home Banner is Updated!');
    }
}
