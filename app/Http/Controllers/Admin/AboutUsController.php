<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    // Ցուցադրել բոլոր լեզվային տարբերակները բաժանված ըստ locale
    public function index()
    {
        $abouts = AboutUs::all()->groupBy('locale');

        return view('admin.about', [
            'aboutsByLocale' => $abouts,
        ]);
    }

    // Ավելացնել կամ թարմացնել ըստ locale
    public function store(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:hy,en,ru',
            'description' => 'required|string',
            'image' => 'nullable|image|max:30720', // 30MB
        ]);

        // Փնտրում ենք ըստ locale կամ ստեղծում նոր
        $about = AboutUs::firstOrNew(['locale' => $request->locale]);

        $about->description = $request->description;
        $about->locale = $request->locale;

        // Սահմանել լեզվային ցուցադրման դրոշներ
        $about->show_on_hy = $request->locale === 'hy';
        $about->show_on_en = $request->locale === 'en';
        $about->show_on_ru = $request->locale === 'ru';

        // Եթե նոր նկար է ընտրված, ջնջել հինը և պահել նորը
        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $imagePath = $request->file('image')->store('about_us', 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->back()->with('success', 'Հրապարակումը հաջողությամբ պահպանվել է։');
    }

    // Ջնջել ըստ ID
    public function destroy(AboutUs $about)
    {
        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return redirect()->back()->with('success', 'Հրապարակումը հաջողությամբ ջնջվել է։');
    }
}
