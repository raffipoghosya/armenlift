<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Կառավարել «Մեր Մասին» Էջը</title>
    <style>
        /* ... Ձեր բոլոր CSS ոճերը մնում են նույնը ... */
        /* (Ես կրճատել եմ այս մասը՝ տեղ խնայելու համար) */
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        body { font-family: 'Nunito', sans-serif; background-color: #f3f4f6; margin: 0; padding: 0; }
        .container, .cards-container { max-width: 800px; margin: 2rem auto; }
        .container { background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #4f46e5; font-weight: 700; margin-bottom: 1.5rem; font-size: 2rem; }
        .success-message { color: #16a34a; background-color: #dcfce7; border: 1px solid #22c55e; padding: 10px 15px; border-radius: 0.375rem; margin-bottom: 20px; }
        .error-messages { color: #b91c1c; background-color: #fee2e2; border: 1px solid #f87171; padding: 10px 15px; border-radius: 0.375rem; margin-top: 20px; }
        label { display: block; font-weight: 600; margin: 1.25rem 0 0.5rem 0; font-size: 1.1rem; color: #374151; }
        textarea, select { width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 1rem; box-sizing: border-box; }
        button { margin-top: 1.5rem; background-color: #4f46e5; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 0.375rem; font-weight: 700; cursor: pointer; transition: background-color 0.3s; }
        button:hover { background-color: #4338ca; }
        .card { background: white; padding: 1.5rem; margin-bottom: 1.5rem; border-radius: 0.5rem; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        .card h4 { color: #4338ca; margin-top: 0; }
        .card p { color: #374151; }
        .card img { margin-top: 1rem; max-width: 250px; border-radius: 0.375rem; }
        .card-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 1rem; }
        .delete-form button { background-color: #dc2626; margin-top: 0; }
        .delete-form button:hover { background-color: #b91c1c; }
        h3 { font-size: 1.5rem; color: #111827; border-bottom: 2px solid #4f46e5; padding-bottom: 0.5rem; margin-top: 3rem; }
    </style>
</head>
<body>

<header style="background-color: #4f46e5; padding: 15px 30px; display: flex; align-items: center;">
    <a href="{{ route('admin.dashboard') }}"
       style="color: white; background-color: #4338ca; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Վերադառնալ Գլխավոր Էջ
    </a>
</header>

<div class="container">
    <h2>Ավելացնել նոր հրապարակում</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error-messages">
            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
        @csrf
        
        <label for="locale">Ընտրեք լեզուն</label>
        <select name="locale" id="locale" required>
            <option value="hy">Հայերեն</option>
            <option value="en">English</option>
            <option value="ru">Русский</option>
        </select>

        <label for="description">Տեքստ</label>
        <textarea name="description" id="description" rows="6" required>{{ old('description') }}</textarea>

        <label for="image">Նկար</label>
        <input type="file" name="image" id="image" accept="image/*">

        <button type="submit">Ավելացնել</button>
    </form>
</div>

<div class="cards-container">
    <h2>Առկա հրապարակումներ</h2>

    <h3>🇦🇲 Հայերեն (Armenian)</h3>
    @forelse($aboutsByLocale['hy'] ?? [] as $item)
        <div class="card">
            <div class="card-header">
                <h4>Հրապարակում #{{ $item->id }}</h4>
                <form action="{{ route('admin.about.destroy', $item) }}" method="POST" class="delete-form" onsubmit="return confirm('Վստա՞հ եք, որ ուզում եք ջնջել։');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Ջնջել</button>
                </form>
            </div>
            <p>{{ $item->description }}</p>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="image">
            @endif
        </div>
    @empty
        <p>Հայերեն լեզվի համար հրապարակումներ չկան։</p>
    @endforelse

    <h3>🇬🇧 English</h3>
    @forelse($aboutsByLocale['en'] ?? [] as $item)
        <div class="card">
             <div class="card-header">
                <h4>Publication #{{ $item->id }}</h4>
                <form action="{{ route('admin.about.destroy', $item) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
            <p>{{ $item->description }}</p>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="image">
            @endif
        </div>
    @empty
        <p>No publications found for English.</p>
    @endforelse

    <h3>🇷🇺 Русский</h3>
    @forelse($aboutsByLocale['ru'] ?? [] as $item)
        <div class="card">
            <div class="card-header">
                <h4>Публикация #{{ $item->id }}</h4>
                <form action="{{ route('admin.about.destroy', $item) }}" method="POST" class="delete-form" onsubmit="return confirm('Вы уверены, что хотите удалить?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
            <p>{{ $item->description }}</p>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="image">
            @endif
        </div>
    @empty
        <p>Публикаций для русского языка не найдено.</p>
    @endforelse

</div>

</body>
</html>