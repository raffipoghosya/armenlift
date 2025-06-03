<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::all(); // Բոլոր AboutUs գրառումները
        return view('admin.about', compact('abouts'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:30720', // մինչև 30MB
        ]);

        // Ստանում ենք առաջին row-ը կամ ստեղծում նոր
        $about = AboutUs::firstOrNew([]);

        // Թարմացնում ենք նկարագրությունը
        $about->description = $request->description;

        // Եթե նոր նկար կա՝ նախ ջնջում ենք հինը, հետո պահում նորը
        if ($request->hasFile('image')) {
            // Ջնջել հին նկարը, եթե գոյություն ունի
            if ($about->image && \Storage::disk('public')->exists($about->image)) {
                \Storage::disk('public')->delete($about->image);
            }

            // Պահել նոր նկարը about_us թղթապանակում (public storage)
            $imagePath = $request->file('image')->store('about_us', 'public');
            $about->image = $imagePath;
        }

        // Պահպանել տվյալները
        $about->save();

        return redirect()->back()->with('success', 'Տվյալները թարմացվել են։');
    }

}
