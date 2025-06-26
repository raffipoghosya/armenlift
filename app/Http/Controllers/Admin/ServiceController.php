<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services', compact('services'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'main_image'   => 'required|image|mimes:jpeg,png,jpg|max:30720',
            'images.*'     => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
            'locale'       => 'required|in:hy,en,ru',
        ]);
    
        // Store main image
        $mainImagePath = $request->file('main_image')->store('services', 'public');
    
        // Store additional images
        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('services', 'public');
            }
        }
    
        // Create service
        Service::create([
            'title'        => $validated['title'],
            'description'  => $validated['description'],
            'main_image'   => $mainImagePath,
            'images'       => $additionalImages,
            'youtube_link' => $validated['youtube_link'] ?? null,
            'locale'       => $validated['locale'],
            'show_on_hy'   => $validated['locale'] === 'hy',
            'show_on_en'   => $validated['locale'] === 'en',
            'show_on_ru'   => $validated['locale'] === 'ru',
        ]);
    
        return redirect()->back()->with('success', 'Ծառայությունը հաջողությամբ ավելացվեց։');
    }
    

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services_edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, $id)
{
    $service = Service::findOrFail($id);

    // Validation
    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'description'  => 'required|string',
        'main_image'   => 'nullable|image|mimes:jpeg,png,jpg|max:30720',
        'images.*'     => 'image|mimes:jpeg,png,jpg|max:30720',
        'youtube_link' => 'nullable|url',
        'locale'       => 'required|in:hy,en,ru',
    ]);

    // Update main image if provided
    if ($request->hasFile('main_image')) {
        Storage::delete($service->main_image);
        $service->main_image = $request->file('main_image')->store('services', 'public');
    }

    // Update additional images if provided
    if ($request->hasFile('images')) {
        if (is_array($service->images)) {
            foreach ($service->images as $oldImage) {
                Storage::delete($oldImage);
            }
        }
        $newImages = [];
        foreach ($request->file('images') as $image) {
            $newImages[] = $image->store('services', 'public');
        }
        $service->images = $newImages;
    }

    // Assign other fields
    $service->title        = $validated['title'];
    $service->description  = $validated['description'];
    $service->youtube_link = $validated['youtube_link'] ?? null;
    $service->locale       = $validated['locale'];
    $service->show_on_hy   = $validated['locale'] === 'hy';
    $service->show_on_en   = $validated['locale'] === 'en';
    $service->show_on_ru   = $validated['locale'] === 'ru';
    $service->save();

    return redirect()->route('admin.services.index')->with('success', 'Ծառայությունը թարմացվել է։');
}

    /**
     * Remove the specified service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete main image
        if ($service->main_image && Storage::exists($service->main_image)) {
            Storage::delete($service->main_image);
        }

        // Delete additional images
        if (is_array($service->images)) {
            foreach ($service->images as $img) {
                if (Storage::exists($img)) {
                    Storage::delete($img);
                }
            }
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Ծառայությունը ջնջվեց հաջողությամբ։');
    }
}
