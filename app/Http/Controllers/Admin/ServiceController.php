<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Դիտելու ծառայությունների ցանկը
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services', compact('services'));
    }


    // Պահպանելու նոր ծառայություն
    public function store(Request $request)
    {
        // Վավերացում
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:30720',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:30720',
            'youtube_link' => 'nullable|url',
        ]);

        // Գլխավոր նկարի պահպանումը storage/app/public/services-ում
        $mainImagePath = $request->file('main_image')->store('services', 'public');

        // Լրացուցիչ նկարների պահպանումը
        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('services', 'public');
            }
        }

        // Ծառայության ստեղծում
        Service::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'main_image' => $mainImagePath,
            'images' => $additionalImages,
            'youtube_link' => $validated['youtube_link'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Ծառայությունը հաջողությամբ ավելացվեց։');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services_edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'youtube_link' => 'nullable|url',
        ]);

        // Եթե փոփոխել են գլխավոր նկարը
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('services', 'public');
            $service->main_image = $mainImagePath;
        }

        // Եթե ավելացրել են լրացուցիչ նկարներ
        if ($request->hasFile('images')) {
            $additionalImages = [];
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('services', 'public');
            }
            $service->images = $additionalImages;
        }

        $service->title = $validated['title'];
        $service->description = $validated['description'];
        $service->youtube_link = $validated['youtube_link'] ?? null;
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Ծառայությունը թարմացվել է։');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Նախ ջնջում ենք գլխավոր նկարը, եթե պահվում է ֆայլ համակարգում
        if ($service->main_image && \Storage::exists($service->main_image)) {
            \Storage::delete($service->main_image);
        }

        // Ջնջել նաև լրացուցիչ նկարները (եթե պահված են որպես json массив)
        if ($service->images && is_array($service->images)) {
            foreach ($service->images as $img) {
                if (\Storage::exists($img)) {
                    \Storage::delete($img);
                }
            }
        }
        

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Ծառայությունը ջնջվեց հաջողությամբ։');
    }

}
