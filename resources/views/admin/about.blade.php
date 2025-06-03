<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ՄԵՐ ՄԱՍԻՆ</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 3rem auto;
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #4f46e5;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .success-message {
            color: #16a34a;
            background-color: #dcfce7;
            border: 1px solid #22c55e;
            padding: 10px 15px;
            border-radius: 0.375rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            margin-top: 20px;
            font-size: 1.1rem;
            color: #374151;
        }

        textarea {
            width: 100%;
            min-height: 150px;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            resize: vertical;
            font-family: inherit;
            color: #111827;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            margin-top: 25px;
            background-color: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        button:hover {
            background-color: #4338ca;
        }

        img {
            margin-top: 15px;
            max-width: 200px;
            border-radius: 0.375rem;
            box-shadow: 0 0 8px rgba(79, 70, 229, 0.3);
            display: block;
        }

        .error-messages {
            color: #b91c1c;
            background-color: #fee2e2;
            border: 1px solid #f87171;
            padding: 10px 15px;
            border-radius: 0.375rem;
            margin-top: 20px;
            font-weight: 600;
        }

        /* Cards container */
        .cards-container {
            max-width: 800px;
            margin: 3rem auto;
        }

        .card {
            background: white; 
            padding: 1rem; 
            margin-bottom: 1.5rem; 
            border-radius: 0.5rem; 
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        .card h4 {
            color: #4338ca; 
            margin-bottom: 0.5rem;
        }

        .card p {
            color: #374151; 
            font-size: 1rem; 
            margin-bottom: 1rem;
        }

        .card img {
            max-width: 100%; 
            max-height: 300px; 
            border-radius: 0.375rem; 
            box-shadow: 0 0 8px rgba(79, 70, 229, 0.3);
        }
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
    <h2>ՄԵՐ ՄԱՍԻՆ</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf

        <label for="description">Տեքստ</label>
        <textarea name="description" id="description">{{ old('description', $abouts->first()->description ?? '') }}</textarea>

        <label for="image">Նկար</label>
        <input type="file" name="image" id="image" accept="image/*">

        @if(isset($abouts) && $abouts->first() && $abouts->first()->image)
            <img src="{{ asset('storage/' . $abouts->first()->image) }}" alt="Current image">
        @endif

        <button type="submit">Պահպանել</button>
    </form>
</div>

<div class="cards-container">
    <h3>Հրապարակումներ</h3>

    @forelse($abouts as $item)
        <div class="card">
            <h4>{{ $item->title ?? 'Ոչ անվանում' }}</h4>
            <p>{{ $item->description }}</p>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="image">
            @endif
        </div>
    @empty
        <p>Ոչ մի հրապարակում չկա:</p>
    @endforelse

</div>

</body>
</html>
