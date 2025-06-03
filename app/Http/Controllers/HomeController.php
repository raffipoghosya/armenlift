<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();     // Get about us data
        $services = Service::all();    // Get all services
        $jobs = Job::all();            // Get all jobs

        // Ensure we always have an about object, even if empty
        if (!$about) {
            $about = new AboutUs();
        }

        return view('homepage', compact('about', 'services', 'jobs'));
    }
}
