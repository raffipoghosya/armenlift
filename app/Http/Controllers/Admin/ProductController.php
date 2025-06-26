<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'pdfs.*' => 'nullable|file|mimes:pdf',
            'pdf_titles.*' => 'nullable|string',
            'locale' => 'required|string|in:hy,en,ru',
            'show_on_hy' => 'nullable|boolean',
            'show_on_en' => 'nullable|boolean',
            'show_on_ru' => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $pdfData = [];
        $pdfFiles = $request->file('pdfs', []);
        $pdfTitles = $request->input('pdf_titles', []);
        
        foreach ($pdfFiles as $index => $pdfFile) {
            if ($pdfFile && $pdfFile->isValid()) {
                $pdfPath = $pdfFile->store('products/pdfs', 'public');
                $pdfData[] = [
                    'file' => $pdfPath,
                    'name' => $pdfTitles[$index] ?? 'PDF',
                ];
            }
        }

        Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
            'pdf' => $pdfData,
            'locale' => $data['locale'],
            'show_on_hy' => $data['locale'] === 'hy',
            'show_on_en' => $data['locale'] === 'en',
            'show_on_ru' => $data['locale'] === 'ru',
        ]);
        

        return redirect()->back()->with('success', 'Ապրանքը հաջողությամբ ավելացվեց։');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'pdfs' => 'nullable|array',
            'pdfs.*' => 'file|mimes:pdf',
            'pdf_titles' => 'nullable|array',
            'pdf_titles.*' => 'nullable|string|max:255',
            'existing_pdf_titles' => 'nullable|array',
            'existing_pdf_titles.*' => 'nullable|string|max:255',
            'existing_pdf_files' => 'nullable|array',
            'existing_pdf_files.*' => 'file|mimes:pdf',
            'locale' => 'required|string|in:hy,en,ru',
            'show_on_hy' => 'nullable|boolean',
            'show_on_en' => 'nullable|boolean',
            'show_on_ru' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $existingPdfs = is_array($product->pdf) ? $product->pdf : [];

        if ($request->hasFile('existing_pdf_files')) {
            foreach ($request->file('existing_pdf_files') as $index => $file) {
                if (isset($existingPdfs[$index])) {
                    if (Storage::disk('public')->exists($existingPdfs[$index]['file'])) {
                        Storage::disk('public')->delete($existingPdfs[$index]['file']);
                    }
                    $path = $file->store('products/pdfs', 'public');
                    $existingPdfs[$index]['file'] = $path;
                }
            }
        }

        if ($request->has('existing_pdf_titles')) {
            foreach ($request->existing_pdf_titles as $index => $newTitle) {
                if (isset($existingPdfs[$index])) {
                    $existingPdfs[$index]['name'] = $newTitle;
                }
            }
        }

        $newPdfs = [];
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $index => $pdfFile) {
                $title = $request->pdf_titles[$index] ?? 'PDF';
                $storedPath = $pdfFile->store('products/pdfs', 'public');
                $newPdfs[] = [
                    'name' => $title,
                    'file' => $storedPath,
                ];
            }
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->locale = $request->locale;
        $product->show_on_hy = $request->locale === 'hy';
        $product->show_on_en = $request->locale === 'en';
        $product->show_on_ru = $request->locale === 'ru';
        
        $product->pdf = array_merge($existingPdfs, $newPdfs);
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Թարմացվեց հաջողությամբ');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->pdf) {
            foreach ($product->pdf as $pdf) {
                if (Storage::disk('public')->exists($pdf['file'])) {
                    Storage::disk('public')->delete($pdf['file']);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Ջնջվեց հաջողությամբ');
    }

    public function deletePdf(Product $product, $index)
    {
        $pdfs = $product->pdf;

        if (isset($pdfs[$index])) {
            $file = $pdfs[$index]['file'];
            if (Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }

            unset($pdfs[$index]);
            $product->pdf = array_values($pdfs);
            $product->save();
        }

        return back()->with('success', 'PDF ֆայլը ջնջվեց հաջողությամբ։');
    }
}
