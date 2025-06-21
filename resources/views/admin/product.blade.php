<!DOCTYPE html>
<html lang="hy">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ապրանքների Կառապարում</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-indigo-700 p-4 flex items-center">
  <a href="{{ route('admin.dashboard') }}"
     class="text-white bg-indigo-800 px-4 py-2 rounded text-sm font-semibold no-underline">
    ← Վերադարնալ Գլխավոր Էջ
  </a>
</header>

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md mt-6">
  <h2 class="text-2xl font-bold mb-6 text-indigo-700">Ավելացնել Ապրանք</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div>
      <label class="block font-semibold mb-1 text-gray-700">Վերնագրություն</label>
      <input type="text" name="title" class="w-full border border-gray-300 rounded-md p-2" required />
    </div>

    <div>
      <label class="block font-semibold mb-1 text-gray-700">Նկարագրություն</label>
      <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-md p-2" required></textarea>
    </div>

    <div>
      <label class="block font-semibold mb-1 text-gray-700">Նկար</label>
      <input type="file" name="image" accept="image/*" class="w-full border p-2 rounded-md" required />
    </div>

    <div>
      <label class="block font-semibold mb-1 text-gray-700">PDF Ֆայլեր</label>
      <div class="space-y-2" id="pdf-container">
        <div class="flex gap-2">
          <input type="file" name="pdfs[]" accept="application/pdf" class="w-1/2 border p-2 rounded-md" onchange="showPdfPreview(this)" multiple />
          <p class="text-sm text-gray-500 mt-1 pdf-name-preview"></p>
          <input type="text" name="pdf_titles[]" placeholder="PDF անունը" class="w-1/2 border p-2 rounded-md" />
        </div>
      </div>
      <button type="button" onclick="addPdfField(this)" class="text-sm text-blue-600 hover:underline mt-2">
        ➕ Ավելացնել PDF դաշտ
      </button>
      <div class="additional-pdf-fields space-y-2"></div>
    </div>

    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md">
      Ավելացնել Ապրանք
    </button>
  </form>
</div>

<div class="max-w-5xl mx-auto mt-10">
  <h3 class="text-xl font-bold mb-4 text-gray-800">Առկա Ապրանքներ</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach ($products as $product)
      @php $pdfList = is_array($product->pdf) ? $product->pdf : []; @endphp

      <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h4 class="text-lg font-bold mb-1">{{ $product->title }}</h4>
          <p class="text-gray-700 text-sm mb-2">{{ $product->description }}</p>

          @if (count($pdfList))
            <label class="block font-semibold">Խմբագրել PDF-ները</label>
            <ul class="mb-4">
              @foreach ($pdfList as $index => $pdf)
                <li class="flex items-center justify-between bg-gray-100 p-2 rounded">
                  <a href="{{ asset('storage/' . $pdf['file']) }}" target="_blank" class="text-blue-700 underline">
                    📄 {{ $pdf['name'] ?? 'PDF' }}
                  </a>
                  <form action="{{ route('admin.products.deletePdf', [$product->id, $index]) }}" method="POST" onsubmit="return confirm('Ջնջե՞լ PDF-ը')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 text-sm hover:underline">Ջնջել</button>
                  </form>
                </li>
              @endforeach
            </ul>
          @endif

          <button onclick="toggleEditForm({{ $product->id }})" class="absolute top-2 right-16 bg-yellow-500 text-white px-3 py-1 text-sm rounded hover:bg-yellow-600">
            Խմբագրել
          </button>

          <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="absolute top-2 right-2">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Ջնջե՞լ ապրանքը')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm rounded">
              Ջնջել
            </button>
          </form>

          <form id="edit-form-{{ $product->id }}" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-4 hidden border-t pt-4 space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $product->title }}" class="w-full border p-2 rounded" required />
            <textarea name="description" rows="3" class="w-full border p-2 rounded" required>{{ $product->description }}</textarea>

            <label class="block font-semibold">Նոր Նկար</label>
            <input type="file" name="image" class="w-full border p-2 rounded" />

            @if (is_array($product->pdf) && count($product->pdf))
              <label class="block font-semibold">Խմբագրել PDF-ները</label>
              @foreach ($product->pdf as $index => $pdf)
                <div class="flex justify-between items-start bg-gray-100 p-4 rounded mb-2">
                  <div class="w-full space-y-2">
                    <a href="{{ asset('storage/' . $pdf['file']) }}" target="_blank" class="text-blue-700 underline block">
                      📄 {{ $pdf['name'] ?? 'PDF' }}
                    </a>
                    <input type="text" name="existing_pdf_titles[{{ $index }}]" value="{{ $pdf['name'] ?? '' }}" class="w-full border p-2 rounded" placeholder="Փոխել PDF անունը" />
                    <input type="file" name="existing_pdf_files[{{ $index }}]" accept="application/pdf" class="w-full border p-2 rounded" />
                  </div>
                  <form action="{{ route('admin.products.deletePdf', [$product->id, $index]) }}" method="POST" onsubmit="return confirm('Ջնջե՞լ PDF-ը')" class="pl-4 pt-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline text-sm">❌</button>
                  </form>
                </div>
              @endforeach
            @endif

            <label class="block font-semibold">Ավելացնել նոր PDF</label>
            <div class="flex gap-2 mb-2">
              <input type="file" name="pdfs[]" accept="application/pdf" class="w-1/2 border p-2 rounded" />
              <input type="text" name="pdf_titles[]" placeholder="PDF անունը" class="w-1/2 border p-2 rounded" />
            </div>
            <button type="button" onclick="addPdfField(this)" class="text-blue-600 text-sm hover:underline mb-2">
              ➕ Ավելացնել PDF դաշտ
            </button>
            <div class="additional-pdf-fields space-y-2"></div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-1 px-4 rounded">
              Թարմացնել
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script>
  function toggleEditForm(id) {
    const form = document.getElementById('edit-form-' + id);
    form.classList.toggle('hidden');
  }

  function addPdfField(button) {
    const container = button.nextElementSibling;
    const div = document.createElement('div');
    div.className = "flex gap-2 items-center";
    div.innerHTML = `
      <div class="w-1/2">
        <input type="file" name="pdfs[]" accept="application/pdf" class="w-full border p-2 rounded" onchange="showPdfPreview(this)" />
        <p class="text-sm text-gray-500 mt-1 pdf-name-preview"></p>
      </div>
      <input type="text" name="pdf_titles[]" placeholder="PDF անունը" class="w-1/2 border p-2 rounded" />
    `;
    container.appendChild(div);
  }

  function showPdfPreview(input) {
    const preview = input.parentElement.querySelector(".pdf-name-preview");
    if (input.files.length > 0) {
      preview.textContent = `📄 Ընտրված ֆայլը՝ ${input.files[0].name}`;
    } else {
      preview.textContent = "";
    }
  }
</script>
</body>
</html>
