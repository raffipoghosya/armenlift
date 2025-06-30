<!DOCTYPE html>
<html lang="hy">

<head>
  <meta charset="UTF-8">
  <title>Աշխատանքներ</title>
  <link rel="stylesheet" href="{{ asset('css/kap.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Font Definitions */
    @font-face {
      font-family: 'Montserrat Armenian';
      src: url('../fonts/web_font/Montserratarm-Regular.woff2') format('woff2'),
        url('../fonts/web_font/Montserrat-Armenian-Regular.woff') format('woff');
      font-weight: normal;
      font-style: normal;
    }

    @font-face {
      font-family: 'Montserrat Armenian bold';
      src: url('../fonts/web_font/Montserratarm-Bold.woff2') format('woff2');
      font-weight: 700;
      font-style: normal;
    }

    @font-face {
      font-family: 'Montserrat Armenian semiBold';
      src: url('../fonts/web_font/Montserratarm-SemiBold.woff2') format('woff2');
      font-weight: 600;
      font-style: normal;
    }

    @font-face {
      font-family: 'Montserrat Armenian light';
      src: url('../fonts/web_font/Montserratarm-Medium.woff2') format('woff2');
      font-weight: 500;
      font-style: normal;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #16202A;
      color: white;
      font-family: 'Montserrat Armenian', sans-serif;
    }

    .jobs-section {
      padding: 160px 10%;
    }

    .jobs-section h2 {
      font-size: 46px;
      color: #D9EAF2;
      margin-bottom: 10px;
    }

    .job-address {
      padding: 1px 0px 25px;
      display: flex;
      align-items: center;
      color: #cdd9e1;
      font-size: 14px;
      gap: 2px;
      margin-top: 6px;
    }

    .jobs-title-line {
      height: 2px;
      width: 100%;
      max-width: 500px;
      margin-bottom: 40px;
      background: linear-gradient(to right, #609AC4 0%, rgba(96, 154, 196, 0) 100%);
    }

    .job-detail-container {
      display: flex;
      flex-direction: column;
      gap: 80px;
    }

    .job-detail-card {
      display: flex;
      gap: 40px;
      align-items: flex-start;
      background-color: #1d2a33;
      padding: 30px;
      border-radius: 12px;
    }

    .job-left {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .job-left .main-image {
      width: 410px;
      height: 370px;
      border-radius: 10px;
      margin-bottom: 15px;
      object-fit: cover;
    }

    .thumbnail-row {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .thumbnail-row img {
      width: 76px;
      height: 76px;
      border-radius: 6px;
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .thumbnail-row img:hover {
      transform: scale(1.05);
    }

    .thumbnail-row img.selected {
      border: 2px solid #ffffff;
      box-shadow: 0 0 5px #ffffff99;
    }

    .job-right {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .job-right h3 {
      font-family: 'Montserrat Armenian bold';
      font-size: 32px;
      margin-bottom: 16px;
      position: relative;
      padding-bottom: 18px;
    }

    .job-right h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 100%;
      max-width: 360px;
      background: linear-gradient(to right, #609AC4 0%, rgba(96, 154, 196, 0) 100%);
    }

    .job-description {
      font-size: 15px;
      line-height: 1.6;
      color: #dddddd;
    }

    .pagination-nav {
      display: flex;
      justify-content: center;
      margin-top: 40px;
    }

    .custom-pagination {
      display: flex;
      list-style: none;
      gap: 10px;
      padding: 0;
      margin: 0;
      font-size: 18px;
      align-items: center;
    }

    .custom-pagination li {
      color: #ffffff;
      cursor: pointer;
      transition: 0.3s;
    }

    .custom-pagination li a {
      color: #ffffff;
      text-decoration: none;
    }

    .custom-pagination li.active span {
      display: inline-block;
      width: 33px;
      height: 33px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      background: linear-gradient(to bottom, #609AC4, #36698E);
      color: #fff;
      font-weight: bold;
    }

    .custom-pagination li.dots {
      pointer-events: none;
      font-size: 24px;
      opacity: 0.7;
    }

    .custom-pagination li a:hover {
      opacity: 0.6;
    }

    .breakable-title {
      word-break: break-word;
      overflow-wrap: break-word;
      max-width: 800px;
      /* ըստ դիզայնի */
    }
  </style>
</head>

<body>

  <header class="top-bar">
    <div class="logo"><a href="/#homepage"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար"
          class="inner-image" />
      </a> </div>
    <nav class="menu">
      <a href="/#about">
        <img src="{{ asset('css/svg/rusaboute.svg') }}" width="164" height="50" alt="ՄԵՐ ՄԱՍԻՆ" />
      </a>
      <a href="/#services">
        <img src="{{ asset('css/svg/russervices1.svg') }}" width="214" height="50" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" />
      </a>
      <a href="/#job">
        <img src="{{ asset('css/svg/ruslala.svg') }}" width="184" height="50" alt="ԱՇԽԱՏԱՆՔՆԵՐ" />
      </a>
      <a href="/#kap">
        <img src="{{ asset('css/svg/rusjob1.svg') }}" width="160" height="50" alt="Ապրանքներ" />
      </a>
      <a href="/#kap">
        <img src="{{ asset('css/svg/ruskap1.svg') }}" width="152" height="50" alt="ԿԱՊ" />
      </a>
    </nav>
    <div class="languages">
      <button>ՀԱՅ</button>
      <button style=" background:  #2E4A5E;">РУС</button>
      <button>ENG</button>

      <div class="languagess">
        <img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber" class="social-icon" />
        <img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp" class="social-icon" />
      </div>
    </div>
  </header>
  <section id="job" class="jobs-section">
    <h2>ПОРТФОЛИО</h2>
    <div class="jobs-title-line"></div>

    <div class="job-detail-container">
      <div class="job-detail-card">
        <div class="job-left">
          <img class="main-image" src="{{ asset('storage/' . $job->main_image) }}" alt="{{ $job->title }}">
          <div class="thumbnail-row">
            @foreach ($job->images as $image)
        <img src="{{ asset('storage/' . $image) }}" alt="thumb" onclick="changeMainImage(this)">
      @endforeach
          </div>
        </div>
        <div class="job-right">
          <h3 class="breakable-title">{{ $job->title }}</h3>

          @if ($job->address)
        <p class="job-address">
        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg"
          style="display:inline-block; vertical-align:middle; margin-right:5px;">
          <path
          d="M6.5 0C4.77 0 3.12 0.66 1.9 1.84C0.69 3.02 0 4.61 0 6.28C0 7.64 0.46 8.97 1.31 10.06L6.5 16L11.69 10.06C12.54 8.97 13 7.64 13 6.28C13 4.61 12.31 3.02 11.09 1.84C9.87 0.66 8.22 0 6.5 0ZM6.5 8.57C5.03 8.57 3.86 7.4 3.86 5.93C3.86 4.47 5.03 3.29 6.5 3.29C7.97 3.29 9.14 4.47 9.14 5.93C9.14 7.4 7.97 8.57 6.5 8.57Z"
          fill="url(#paint0_linear_1_886)" />
          <defs>
          <linearGradient id="paint0_linear_1_886" x1="6.5" y1="0" x2="6.5" y2="16"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#2E4A5E" />
            <stop offset="1" stop-color="#609AC4" />
          </linearGradient>
          </defs>
        </svg>
        <span>{{ $job->address }}</span>
        </p>
      @endif

          <div class="job-description">
            {!! nl2br(e($job->description)) !!}
          </div>
        </div>
      </div>
    </div>

    @if ($otherJobs->count())
    <h2 style="margin-top:100px;">ДРУГАЯ ПОРТФОЛИО</h2>
    <div class="jobs-title-line"></div>

    <div class="job-detail-container">
      @foreach ($otherJobs as $item)
      <div class="job-detail-card">
      <div class="job-left">
      <a href="{{ route('jobs.ru', $item->id) }}">
      <img class="main-image" src="{{ asset('storage/' . $item->main_image) }}" alt="{{ $item->title }}">
      </a>
      </div>
      <div class="job-right">
      <h3 class="breakable-title">
      <a href="{{ route('jobs.ru', $item->id) }}" style="color: #D9EAF2;">
        {{ $item->title }}
      </a>
      @if ($job->address)
      <p class="job-address">
      <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg"
      style="display:inline-block; vertical-align:middle; margin-right:5px;">
      <path
      d="M6.5 0C4.77 0 3.12 0.66 1.9 1.84C0.69 3.02 0 4.61 0 6.28C0 7.64 0.46 8.97 1.31 10.06L6.5 16L11.69 10.06C12.54 8.97 13 7.64 13 6.28C13 4.61 12.31 3.02 11.09 1.84C9.87 0.66 8.22 0 6.5 0ZM6.5 8.57C5.03 8.57 3.86 7.4 3.86 5.93C3.86 4.47 5.03 3.29 6.5 3.29C7.97 3.29 9.14 4.47 9.14 5.93C9.14 7.4 7.97 8.57 6.5 8.57Z"
      fill="url(#paint0_linear_1_886)" />
      <defs>
      <linearGradient id="paint0_linear_1_886" x1="6.5" y1="0" x2="6.5" y2="16"
      gradientUnits="userSpaceOnUse">
      <stop stop-color="#2E4A5E" />
      <stop offset="1" stop-color="#609AC4" />
      </linearGradient>
      </defs>
      </svg>
      <span>{{ $job->address }}</span>
      </p>
      @endif
      </h3>
      <div class="job-description">
      {!! nl2br(e(Str::limit($item->description, 300))) !!}
      </div>
      </div>
      </div>
    @endforeach
    </div>
  @endif
  </section>


  <script>
    function changeMainImage(thumbnail) {
      const container = thumbnail.closest('.job-left');
      const main = container.querySelector('.main-image');
      const tempSrc = main.src;
      main.src = thumbnail.src;
      thumbnail.src = tempSrc;
    }
  </script>

  <section id="kap" class="contact-section">
    <h2 style="color: #D9EAF2;">Контакты</h2>
    <div class="contact-title-line"></div>

    <div class="contact-container">
      <div class="contact-info">
        <ul>
          <li>
            <img src="/css/svg/location.svg" alt="Адрес" width="16" height="16" style="margin-right: 11px;">
            Адрес: 0076, Армения, г. Ереван, Аксел Бакунц 4
          </li>

          <li>
            <img src="/css/svg/telefon.svg" alt="Телефон" width="16" height="16" style="margin-right: 11px;">
            Тел.: +37491430512
          </li>
          <li>
            <img src="/css/svg/gmail.svg" alt="Эл. почта" width="16" height="16" style="margin-right: 11px;">
            Эл. почта: armenlift@gmail.com
          </li>
        </ul>
        <div class="contact-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1543.7648850677285!2d44.571620621786245!3d40.19027842153545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa30027a212d9%3A0xbc637ff8aac8ecab!2sAlmaka!5e1!3m2!1sen!2sam!4v1750763459909!5m2!1sen!2sam"
            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <form class="contact-form">
        <div class="form-row">
          <input type="text" placeholder="Имя" />
          <input type="text" placeholder="Фамилия" />
        </div>
        <div class="form-row">
          <input type="text" placeholder="Номер телефона" />
          <input type="email" placeholder="Эл. почта" />
        </div>
        <textarea placeholder="Сообщение..."></textarea>
        <button type="submit">Отправить</button>
      </form>
    </div>
  </section>


  <script>
    function changeMainImage(thumbnail) {
      const container = thumbnail.closest('.job-left');
      const main = container.querySelector('.main-image');
      const tempSrc = main.src;
      main.src = thumbnail.src;
      thumbnail.src = tempSrc;
    }
  </script>

</body>

</html>