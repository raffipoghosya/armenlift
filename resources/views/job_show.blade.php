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
  max-width: 400px; /* ըստ դիզայնի */
}
  </style>
</head>
<body>

<header class="top-bar">
            <div class="logo"><a href="/#homepage"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար" class="inner-image" />
            </a> </div>
            <nav class="menu">
                <a href="/#about">
                    <img src="{{ asset('css/svg/aboute1.svg') }}" width="164" height="50" alt="ՄԵՐ ՄԱՍԻՆ" />
                </a>
                <a href="/#services">
                    <img src="{{ asset('css/svg/services1.svg') }}" width="214" height="50" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" />
                </a>
                <a href="/#job">
                    <img src="{{ asset('css/svg/lalala.svg') }}" width="184" height="50" alt="ԱՇԽԱՏԱՆՔՆԵՐ" />
                </a>
                <a href="/#kap">
                    <img src="{{ asset('css/svg/jobs.svg') }}" width="160" height="50" alt="Ապրանքներ" />
                </a>
                <a href="/#kap">
                    <img src="{{ asset('css/svg/kap1.svg') }}" width="112" height="50" alt="ԿԱՊ" />
                </a>
            </nav>
            <div class="languages">
                <button>ՀԱՅ</button>
                <button>РУС</button>
                <button>ENG</button>

                <div class="languagess">
                <img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber" class="social-icon" />
                <img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp" class="social-icon" />
                </div>
            </div>
        </header>

<section id="job" class="jobs-section">
    <h2>ԱՇԽԱՏԱՆՔՆԵՐ</h2>
    <div class="jobs-title-line"></div>

    <div class="job-detail-container">
        @foreach ($jobs as $job)
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
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16" fill="#cdd9e1">
                <path d="M168 0C75.3 0 0 75.3 0 168c0 87.6 141.1 252.1 149.7 261.4a23.8 23.8 0 0 0 36.5 0C242.9 420.1 384 255.6 384 168 384 75.3 308.7 0 216 0zm0 240a72 72 0 1 1 0-144 72 72 0 0 1 0 144z"/>
              </svg>
              <span>{{ $job->address }}</span>
            </p>
          @endif
                <div class="job-description">
                    {!! nl2br(e(Str::limit($job->description, 700))) !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if ($jobs->hasPages())
    <nav class="pagination-nav">
        <ul class="custom-pagination">
            @foreach ($jobs->links()->elements as $element)
                @if (is_string($element))
                    <li class="dots">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
    @endif
</section>




<section id="kap" class="contact-section">
        <h2 style="color: #D9EAF2;">ԿԱՊ ՄԵԶ ՀԵՏ</h2>
        <div class="contact-title-line"></div>

        <div class="contact-container">
            <div class="contact-info">
                <ul>
                    <li>
                        <img src="/css/svg/location.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Հասցե՝ 0001, ՀՀ, ք. Երևան, Ա. Հովհաննիսյան 24/4
                    </li>

                    <li>
                        <img src="/css/svg/telefon.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Հեռ․: +37460440015, +37491430512
                    </li>
                    <li>
                        <img src="/css/svg/gmail.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Էլ. փոստ․ info@armenlift.am
                    </li>
                </ul>
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13425.18030938452!2d44.56812181181287!3d40.18895947745968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa34fa900b185%3A0xd485e4d5341197b9!2s24%20Hovhannisian%20St%2C%20Yerevan%200076!5e0!3m2!1sen!2sam!4v1747660007856!5m2!1sen!2sam"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

            <form class="contact-form">
                <div class="form-row">
                    <input type="text" placeholder="Անուն" />
                    <input type="text" placeholder="Ազգանուն" />
                </div>
                <div class="form-row">
                    <input type="text" placeholder="Հեռախոսահամար" />
                    <input type="email" placeholder="Email" />
                </div>
                <textarea placeholder="Հաղորդագրություն..."></textarea>
                <button type="submit">Ուղարկել</button>
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
