<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Job;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Հայերեն homepage
     */
    public function indexHy()
    {
        App::setLocale('hy');

        $about    = AboutUs::where('locale', 'hy')->first() ?? new AboutUs();
        $services = Service::where('locale', 'hy')
                           ->where('show_on_hy', true)
                           ->latest()
                           ->get();
        $jobs     = Job::all();
        $products = Product::latest()->get();

        return view('homepage', compact('about', 'services', 'jobs', 'products'));
    }

    /**
     * Անգլերեն homepage
     */
    public function indexEn()
    {
        App::setLocale('en');

        $about    = AboutUs::where('locale', 'en')->first() ?? new AboutUs();
        $services = Service::where('locale', 'en')
                           ->where('show_on_en', true)
                           ->latest()
                           ->get();
        $jobs     = Job::all();
        $products = Product::latest()->get();

        return view('homepageen', compact('about', 'services', 'jobs', 'products'));
    }

    /**
     * Ռուսերեն homepage
     */
    public function indexRu()
    {
        App::setLocale('ru');

        $about    = AboutUs::where('locale', 'ru')->first() ?? new AboutUs();
        $services = Service::where('locale', 'ru')
                           ->where('show_on_ru', true)
                           ->latest()
                           ->get();
        $jobs     = Job::all();
        $products = Product::latest()->get();

        return view('homapageru', compact('about', 'services', 'jobs', 'products'));
    }
}
