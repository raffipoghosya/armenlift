<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Job;
use App\Models\Product;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Հայերեն homepage
     */
    public function indexHy()
    {
        App::setLocale('hy');

        $about    = AboutUs::where('locale', 'hy')->first() ?? new AboutUs();
        $services = Service::all();
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
        $services = Service::all();
        $jobs     = Job::all();
        $products = Product::latest()->get();
    
        // Ահա այստեղ view('homepage') փոխարինեք view('homepageen')
        return view('homepageen', compact('about', 'services', 'jobs', 'products'));
    }
    
    public function indexRu()
    {
        App::setLocale('ru');
    
        $about    = AboutUs::where('locale', 'ru')->first() ?? new AboutUs();
        $services = Service::all();
        $jobs     = Job::all();
        $products = Product::latest()->get();
    
        // Ահա այստեղ view('homepage') փոխարինեք view('homapageru')
        return view('homapageru', compact('about', 'services', 'jobs', 'products'));
    }
    
}
