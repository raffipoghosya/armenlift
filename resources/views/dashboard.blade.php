<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard with Logout</title>
  <style>
    /* Reset some default styles */
    * {
      box-sizing: border-box;
    }

    body,
    html {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: #4f46e5;
      /* Indigo */
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
      font-weight: 700;
      font-size: 24px;
    }

    .logout-btn {
      background-color: #ef4444;
      /* Red-500 */
      border: none;
      color: white;
      padding: 10px 18px;
      font-weight: 600;
      font-size: 14px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #b91c1c;
      /* Red-700 */
    }

    main {
      flex-grow: 1;
      padding: 40px 50px;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 28px;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
      padding: 30px 20px;
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .card:hover {
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
      transform: translateY(-5px);
    }

    .card-icon {
      font-size: 56px;
      color: #4f46e5;
      margin-bottom: 18px;
    }

    .card-title {
      font-size: 22px;
      font-weight: 700;
      color: #1e1e2f;
      margin-bottom: 10px;
    }

    .card-desc {
      font-size: 16px;
      color: #666;
      line-height: 1.4;
    }

    /* Responsive tweaks */
    @media (max-width: 600px) {
      main {
        padding: 20px 15px;
      }

      .card-icon {
        font-size: 48px;
      }
    }
  </style>
</head>

<body>

  <header>
    <h1>Dashboard</h1>
    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Log Out</button>
    </form>
  </header>

  <main>
    <div class="dashboard-grid">
      <a href="{{ route('admin.about') }}" class="card" title="ՄԵՐ ՄԱՍԻՆ">
        <div class="card-icon">👥</div>
        <div class="card-title">ՄԵՐ ՄԱՍԻՆ</div>
        <div class="card-desc">կառավարիր ՄԵՐ ՄԱՍԻՆ բաժինը </div>
      </a>
      <a href="{{ route('admin.services.index') }}" class="card" title="Manage Services">
        <div class="card-icon">📝</div>
        <div class="card-title">ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ</div>
        <div class="card-desc">կառավարիր ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ բաժինը</div>
      </a>

      <a href="{{ route('admin.jobs.index') }}" class="card" title="Աշխատանքների Կառավարում">
        <div class="card-icon">⚙️</div>
        <div class="card-title">ԱՇԽԱՏԱՆՔՆԵՐ</div>
        <div class="card-desc">Կառավարիր Աշխատանքների բաժինը</div>
      </a>

    </div>
  </main>

</body>

</html>