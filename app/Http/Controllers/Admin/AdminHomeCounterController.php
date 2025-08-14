<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCounter;
use Illuminate\Http\Request;

class AdminHomeCounterController extends Controller
{
    public function index()
    {
        $home_counter = HomeCounter::class::where('id', 1)->first();
        return view('admin.home_counter.index', compact('home_counter'));
    }

    public function update(Request $request)
    {
        $home_counter = HomeCounter::where('id', 1)->first();

        if ($request->background) {
            $request->validate([
                'background' => ['image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            ]);
            $final_name = 'home_counter_' . time() . '.' . $request->background->extension();
            $request->background->move(public_path('uploads'), $final_name);
            unlink(public_path('uploads/' . $home_counter->background));
            $home_counter->background = $final_name;
        }

        $home_counter->item1_icon = $request->item1_icon;
        $home_counter->item1_number = $request->item1_number;
        $home_counter->item1_title = $request->item1_title;
        $home_counter->item2_icon = $request->item2_icon;
        $home_counter->item2_number = $request->item2_number;
        $home_counter->item2_title = $request->item2_title;
        $home_counter->item3_icon = $request->item3_icon;
        $home_counter->item3_number = $request->item3_number;
        $home_counter->item3_title = $request->item3_title;
        $home_counter->item4_icon = $request->item4_icon;
        $home_counter->item4_number = $request->item4_number;
        $home_counter->item4_title = $request->item4_title;
        $home_counter->status = $request->status;
        $home_counter->update();

        return redirect()->back()->with('success', 'Home Counter is Updated!');
    }
}
