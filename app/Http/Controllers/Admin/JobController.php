<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(500);
        return view('admin.jobs', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:30720',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'locale' => 'required|in:hy,en,ru',
        ]);

        $mainImagePath = $request->file('main_image')->store('jobs', 'public');

        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('jobs', 'public');
            }
        }

        $job = new Job();
        $job->title = $validated['title'];
        $job->description = $validated['description'];
        $job->main_image = $mainImagePath;
        $job->images = $additionalImages;
        $job->youtube_link = $validated['youtube_link'] ?? null;
        $job->address = $validated['address'] ?? null;
        $job->locale = $validated['locale'];

        // ✅ Auto-set show_on_* flag based on locale
        $job->show_on_hy = $job->locale === 'hy';
        $job->show_on_en = $job->locale === 'en';
        $job->show_on_ru = $job->locale === 'ru';

        $job->save();

        return redirect()->back()->with('success', 'Աշխատանքը հաջողությամբ ավելացվեց։');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs_edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:30720',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'locale' => 'required|in:hy,en,ru',
        ]);

        if ($request->hasFile('main_image')) {
            Storage::delete($job->main_image);
            $job->main_image = $request->file('main_image')->store('jobs', 'public');
        }

        if ($request->hasFile('images')) {
            if (is_array($job->images)) {
                foreach ($job->images as $oldImage) {
                    Storage::delete($oldImage);
                }
            }
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $newImages[] = $image->store('jobs', 'public');
            }
            $job->images = $newImages;
        }

        $job->title = $validated['title'];
        $job->description = $validated['description'];
        $job->youtube_link = $validated['youtube_link'] ?? null;
        $job->address = $validated['address'] ?? null;
        $job->locale = $validated['locale'];

        // ✅ Auto-set show_on_* flag based on locale
        $job->show_on_hy = $job->locale === 'hy';
        $job->show_on_en = $job->locale === 'en';
        $job->show_on_ru = $job->locale === 'ru';

        $job->save();

        return redirect()->route('admin.jobs.index')->with('success', 'Աշխատանքը թարմացվեց։');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if ($job->main_image && Storage::exists($job->main_image)) {
            Storage::delete($job->main_image);
        }

        if (is_array($job->images)) {
            foreach ($job->images as $img) {
                if (Storage::exists($img)) {
                    Storage::delete($img);
                }
            }
        }

        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Աշխատանքը ջնջվեց։');
    }

    public function showHy($id)
    {
        $job = Job::findOrFail($id);
        $otherJobs = Job::where('locale', 'hy')
            ->where('show_on_hy', true)
            ->where('id', '!=', $id)
            ->latest()
            ->take(10)
            ->get();

        return view('job_show', compact('job', 'otherJobs'));
    }
    public function showEn($id)
    {
        $job = Job::where('id', $id)
            ->where('locale', 'en')
            ->where('show_on_en', true)
            ->firstOrFail();

        $otherJobs = Job::where('id', '!=', $id)
            ->where('locale', 'en')
            ->where('show_on_en', true)
            ->latest()
            ->get();

        return view('joben_show', compact('job', 'otherJobs'));
    }
    public function showRu($id)
    {
        $job = Job::where('id', $id)
            ->where('locale', 'ru')
            ->where('show_on_ru', true)
            ->firstOrFail();

        $otherJobs = Job::where('id', '!=', $id)
            ->where('locale', 'ru')
            ->where('show_on_ru', true)
            ->latest()
            ->get();

        return view('jobru_show', compact('job', 'otherJobs'));
    }


}
