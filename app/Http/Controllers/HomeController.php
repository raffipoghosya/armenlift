<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Job;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();     // Get about us data
        $services = Service::all();    // Get all services
        $jobs = Job::all();            // Get all jobs
        $products = Product::latest()->get(); // ✅ Ավելացվում է
        
        // Եթե about-ը չկա, ստեղծում ենք դատարկ object
        if (!$about) {
            $about = new AboutUs();
        }

        return view('homepage', compact('about', 'services', 'jobs', 'products'));
    }
}
