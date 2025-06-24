<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Աշխատանքների ցուցակ
    public function index()
    {
        $jobs = Job::latest()->paginate(3); 
        return view('admin.jobs', compact('jobs'));
    }

    public function show(Job $job)
    {
        $jobs = Job::latest()->paginate(3); 
        return view('job_show', compact('job', 'jobs'));
    }

    // Աշխատանքի պահպանում
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:30720',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
            'address' => 'nullable|string|max:255', // ✅ Ավելացված է
        ]);

        $mainImagePath = $request->file('main_image')->store('jobs', 'public');

        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('jobs', 'public');
            }
        }

        Job::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'main_image' => $mainImagePath,
            'images' => $additionalImages,
            'youtube_link' => $validated['youtube_link'] ?? null,
            'address' => $validated['address'] ?? null, // ✅ Ավելացված է
        ]);

        return redirect()->back()->with('success', 'Աշխատանքը հաջողությամբ ավելացվեց։');
    }

    // Աշխատանքի խմբագրում
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs_edit', compact('job'));
    }

    // Աշխատանքի թարմացում
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:30720',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
            'address' => 'nullable|string|max:255', // ✅ Ավելացված է
        ]);

        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('jobs', 'public');
            $job->main_image = $mainImagePath;
        }

        if ($request->hasFile('images')) {
            $existingImages = is_array($job->images) ? $job->images : [];
            foreach ($request->file('images') as $image) {
                $existingImages[] = $image->store('jobs', 'public');
            }
            $job->images = $existingImages; // ✅ Հին + Նոր
        }
        

        $job->title = $validated['title'];
        $job->description = $validated['description'];
        $job->youtube_link = $validated['youtube_link'] ?? null;
        $job->address = $validated['address'] ?? null; // ✅ Ավելացված է
        $job->save();

        return redirect()->route('admin.jobs.index')->with('success', 'Աշխատանքը թարմացվեց։');
    }

    // Ջնջել աշխատանքը
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if ($job->main_image && \Storage::exists($job->main_image)) {
            \Storage::delete($job->main_image);
        }

        if ($job->images && is_array($job->images)) {
            foreach ($job->images as $img) {
                if (\Storage::exists($img)) {
                    \Storage::delete($img);
                }
            }
        }

        $job->delete(); // ✅ Այստեղ հասցեն ավտոմատ կջնջվի, երբ row-ը ջնջվում է

        return redirect()->route('admin.jobs.index')->with('success', 'Աշխատանքը ջնջվեց։');
    }
}
