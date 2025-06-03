<!DOCTYPE html>
<html lang="hy">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Աշխատանքների Կառավարում</title>
  <script src="https://cdn.tailwindcss.com"></script>

<body >
</head>
<header style="background-color: #4f46e5; padding: 15px 30px; display: flex; align-items: center;">
    <a href="{{ route('admin.dashboard') }}" 
       style="color: white; background-color: #4338ca; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Վերադառնալ Գլխավոր Էջ
    </a>
</header>
  <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-indigo-700">Ավելացնել Աշխատանք</h2>

    <!-- Success Message -->
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Վերնագիր</label>
        <input type="text" name="title" class="w-full border border-gray-300 rounded-md p-2" required />
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Նկարագրություն</label>
        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-md p-2" required></textarea>
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Գլխավոր Նկար</label>
        <input type="file" name="main_image" accept="image/*" class="w-full border p-2 rounded-md" required />
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Լրացուցիչ Նկարներ</label>
        <input type="file" name="images[]" multiple accept="image/*" class="w-full border p-2 rounded-md" />
        <p class="text-sm text-gray-500 mt-1">Դու կարող ես ընտրել մի քանի նկար։</p>
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">YouTube հղում</label>
        <input type="url" name="youtube_link" class="w-full border border-gray-300 rounded-md p-2" placeholder="https://youtube.com/..." />
      </div>

      <div class="pt-4">
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md">
          Ավելացնել Աշխատանք
        </button>
      </div>
    </form>
  </div>

  <!-- Existing Jobs -->
  <div class="max-w-5xl mx-auto mt-10">
    <h3 class="text-xl font-bold mb-4 text-gray-800">Ցուցադրված Աշխատանքներ</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach ($jobs as $job)
        <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
          <img src="{{ asset('storage/' . $job->main_image) }}" alt="Job Image" class="w-full h-48 object-cover" />

          <div class="p-4">
            <h4 class="text-lg font-bold mb-1">{{ $job->title }}</h4>
            <p class="text-gray-700 text-sm mb-2">{{ $job->description }}</p>

            @if($job->youtube_link)
              <a href="{{ $job->youtube_link }}" target="_blank" class="text-indigo-600 text-sm underline">Դիտել YouTube-ում</a>
            @endif

            @if($job->images && is_array($job->images))
              <div class="mt-3 flex flex-wrap gap-2">
                @foreach ($job->images as $img)
                  <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" class="w-16 h-16 object-cover rounded" />
                @endforeach
              </div>
            @endif

            <!-- Խմբագրել կոճակ -->
            <button onclick="toggleEditForm({{ $job->id }})"
              class="absolute top-2 right-16 bg-yellow-500 text-white px-3 py-1 text-sm rounded hover:bg-yellow-600">
              Խմբագրել
            </button>

            <!-- Ջնջել կոճակ -->
            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="absolute top-2 right-2">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Հաստատե՞լ ջնջել այս աշխատանքը։')" 
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm rounded">
                Ջնջել
              </button>
            </form>

            <!-- Թաքնված խմբագրման ձևը -->
            <form id="edit-form-{{ $job->id }}" action="{{ route('admin.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data" class="mt-4 hidden border-t pt-4 space-y-4">
              @csrf
              @method('PUT')

              <input type="text" name="title" value="{{ $job->title }}" class="w-full border p-2 rounded" required />
              <textarea name="description" rows="3" class="w-full border p-2 rounded" required>{{ $job->description }}</textarea>

              <label class="block font-semibold mt-2 mb-1">Նոր Գլխավոր Նկար (ըստ ցանկության)</label>
              <input type="file" name="main_image" class="w-full border p-2 rounded" />

              <label class="block font-semibold mt-2 mb-1">Նոր Լրացուցիչ Նկարներ (ըստ ցանկության)</label>
              <input type="file" name="images[]" multiple class="w-full border p-2 rounded" />

              <input type="url" name="youtube_link" value="{{ $job->youtube_link }}" class="w-full border p-2 rounded" placeholder="YouTube հղում" />

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
  </script>

</body>
</html>
