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

    /* --- Global Section Padding --- */
    .jobs-section,
    .contact-section {
      padding: 160px 10%;
      /* Default padding for larger screens */
    }

    /* --- Section Titles --- */
    .jobs-section h2,
    .contact-section h2 {
      font-size: 46px;
      color: #D9EAF2;
      margin-bottom: 10px;
    }

    .jobs-title-line,
    .contact-title-line {
      height: 2px;
      width: 100%;
      max-width: 500px;
      margin-bottom: 40px;
      background: linear-gradient(to right, #609AC4 0%, rgba(96, 154, 196, 0) 100%);
    }

    /* --- Job Address Styling --- */
    .job-address {
      padding: 1px 0px 25px;
      display: flex;
      align-items: center;
      color: #cdd9e1;
      font-size: 14px;
      gap: 2px;
      margin-top: 6px;
    }

    /* --- Job Detail Card --- */
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
      color: white;
      /* Ensure text color is set for consistency */
      font-family: 'Montserrat Armenian', sans-serif;
      /* Ensure font is set for consistency */
    }

    /* --- Job Left (Image Section) --- */
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
      /* Adjusted from 8px to 10px for consistency if desired, keeping original for now */
      flex-wrap: wrap;
      justify-content: center;
      /* Center thumbnails */
    }

    .thumbnail-row img {
      width: 76px;
      /* Overwritten by your new code */
      height: 76px;
      /* Overwritten by your new code */
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

    /* --- Job Right (Description Section) --- */
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
      /* Adjusted from 10px to 16px to match original */
      position: relative;
      padding-bottom: 18px;
      /* Added for the line */
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

    .job-location {
      /* This class was defined but not used in HTML, keeping for reference */
      font-size: 16px;
      color: #a7c9dd;
      margin-bottom: 20px;
    }

    .job-description {
      font-size: 15px;
      line-height: 1.6;
      color: #dddddd;
    }

    /* --- Pagination --- */
    .pagination-nav {
      display: flex;
      justify-content: center;
      margin-top: 40px;
    }

    .custom-pagination {
      display: flex;
      list-style: none;
      gap: 32px;
      /* Adjusted from 10px to 32px based on your new code */
      padding: 0;
      margin: 0;
      font-family: 'Montserrat Armenian', sans-serif;
      font-size: 28px;
      /* Adjusted from 18px to 28px based on your new code */
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
      width: 58px;
      /* Adjusted from 33px to 58px based on your new code */
      height: 58px;
      /* Adjusted from 33px to 58px based on your new code */
      line-height: 58px;
      /* Adjusted from 33px to 58px based on your new code */
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

    /* --- Jobs Gallery (Other Jobs Section) --- */
    /* .jobs-gallery and .job-item styles from English page */
    .scroll-wrapper {
      overflow-x: auto;
      padding-bottom: 10px;
      scrollbar-width: thin;
      scrollbar-color: #84b5d4 transparent;
      margin-left: 0;
      /* Adjusted to 0 as other galleries might be directly on grid */
    }

    .scroll-wrapper::-webkit-scrollbar {
      height: 8px;
    }

    .scroll-wrapper::-webkit-scrollbar-thumb {
      background-color: #84b5d4;
      border-radius: 6px;
    }

    .jobs-gallery {
      /* This was in your previous, but not used in the provided HTML for "otherJobs". I'm keeping it for consistency if you add it back. */
      display: grid;
      grid-auto-flow: column;
      grid-template-rows: repeat(2, 370px);
      /* ֆիքսված երկու տող */
      grid-auto-columns: 240px;
      gap: 20px;
      padding-right: 20px;
      min-width: max-content;
    }

    .job-item {
      border-radius: 8px;
      padding: 3px;
      color: white;
      width: 250px;
      /* Width of each job item */
      height: 274px;
      /* Height of each job item */
      box-sizing: border-box;
    }

    .job-item img {
      width: 250px;
      /* Image fills the job-item width */
      height: 274px;
      /* Image fills the job-item height */
      object-fit: cover;
      border-radius: 6px;
    }

    .job-item h3 {
      font-size: 16px;
      margin-top: 8px;
      font-family: 'Montserrat Armenian semiBold';
    }

    /* --- Contact Section --- */
    .contact-section {
      padding: 160px 10%;
    }

    .contact-section h2 {
      font-size: 46px;
      color: #D9EAF2;
      margin-bottom: 10px;
    }

    .contact-title-line {
      height: 2px;
      width: 100%;
      max-width: 500px;
      margin-bottom: 40px;
      background: linear-gradient(to right, #609AC4 0%, rgba(96, 154, 196, 0) 100%);
    }

    .contact-container {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
      /* Allow items to wrap on smaller screens */
      justify-content: center;
      /* Center items when wrapped */
    }

    .contact-info,
    .contact-form {
      flex: 1;
      min-width: 300px;
      /* Minimum width before wrapping */
    }

    .contact-info ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .contact-info ul li {
      display: flex;
      align-items: flex-start;
      margin-bottom: 15px;
      line-height: 1.5;
      color: #dddddd;
    }

    .contact-map {
      margin-top: 30px;
    }

    .contact-map iframe {
      border-radius: 8px;
    }

    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .contact-form .form-row {
      display: flex;
      gap: 15px;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #36698E;
      border-radius: 8px;
      background-color: #1d2a33;
      color: white;
      font-family: 'Montserrat Armenian', sans-serif;
      font-size: 15px;
    }

    .contact-form input::placeholder,
    .contact-form textarea::placeholder {
      color: #aaa;
    }

    .contact-form textarea {
      min-height: 120px;
      resize: vertical;
    }

    .contact-form button {
      padding: 12px 25px;
      background: linear-gradient(to right, #609AC4, #36698E);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: opacity 0.3s ease;
      align-self: flex-start;
      /* Align button to the start */
    }

    .contact-form button:hover {
      opacity: 0.9;
    }

    /* --- Mobile Menu Specific Styles --- */
    .mobile-menu-toggle {
      display: none;
      /* Hidden by default for desktop */
      flex-direction: column;
      gap: 4px;
      cursor: pointer;
      z-index: 1001;
    }

    .mobile-menu-toggle .bar {
      width: 24px;
      height: 3px;
      background: white;
      border-radius: 2px;
    }

    /* Default: Desktop view */
    .desktop-menu,
    .desktop-languages {
      display: flex;
    }

    .mobile-menu-toggle,
    .mobile-drawer {
      display: none;
    }

    /* Hide the main logo when the mobile drawer is open */
    .mobile-drawer.open+.top-bar .logo {
      display: none;
    }

    /* Ensure the drawer logo is only visible when the drawer is open */
    .drawer-logo {
      display: none;
      /* Hidden by default */
    }

    .mobile-drawer.open .drawer-logo {
      display: block;
      /* Visible when drawer is open */
    }

    /* --- Media Queries for Responsiveness --- */

    /* Tablet and Smaller Desktops (e.g., up to 1024px or 980px as per your toggle) */
    @media (max-width: 1024px) {

      .jobs-section,
      .contact-section {
        padding: 120px 5%;
        /* Reduce padding on smaller screens */
      }

      .job-detail-card {
        flex-direction: column;
        /* Stack image and description vertically */
        align-items: center;
        /* Center content when stacked */
        text-align: center;
        /* Center text within the card */
      }

      .job-left .main-image {
        width: 100%;
        /* Make image full width */
        max-width: 450px;
        /* Limit max width for larger screens */
        height: auto;
        /* Adjust height automatically */
      }

      .job-right h3::after {
        left: 50%;
        /* Center the line under the title */
        transform: translateX(-50%);
        /* Adjust for perfect centering */
      }

      .job-address {
        justify-content: center;
        /* Center the address */
      }

      .job-detail-container {
        gap: 40px;
        /* Reduce gap between "other jobs" cards on smaller screens */
      }

      .contact-container {
        flex-direction: column;
        /* Stack contact info and form */
        align-items: center;
        /* Center items when stacked */
      }

      .contact-info,
      .contact-form {
        width: 100%;
        /* Take full width when stacked */
        max-width: 600px;
        /* Limit overall width for forms */
      }

      .contact-form .form-row {
        flex-direction: column;
        /* Stack form inputs vertically */
        gap: 10px;
      }

      .contact-form button {
        align-self: center;
        /* Center the button when form is stacked */
      }
    }

    /* Mobile Devices (e.g., up to 768px) */
    @media (max-width: 768px) {

      .jobs-section h2,
      .contact-section h2 {
        font-size: 38px;
        /* Further reduce font size */
      }

      .jobs-section,
      .contact-section {
        padding: 80px 4%;
        /* More reduced padding for mobile */
      }

      .job-left .main-image {
        max-width: 300px;
        /* Even smaller max-width for image */
      }

      .job-right h3 {
        font-size: 28px;
        /* Smaller title font size */
        padding-bottom: 12px;
        /* Adjust padding for smaller title */
      }

      .job-right h3::after {
        max-width: 250px;
        /* Shorter line for smaller titles */
      }

      .job-description {
        font-size: 14px;
        /* Slightly smaller description font */
      }

      .thumbnail-row img {
        width: 60px;
        /* Smaller thumbnails */
        height: 60px;
      }

      .contact-info ul li {
        font-size: 14px;
        /* Smaller contact info text */
      }
    }

    /* Small Mobile Devices (e.g., up to 480px) */
    @media (max-width: 480px) {

      .jobs-section h2,
      .contact-section h2 {
        font-size: 30px;
        /* Smallest font size for titles */
      }

      .jobs-section,
      .contact-section {
        padding: 60px 3%;
        /* Minimal padding on very small screens */
      }

      .job-detail-card {
        padding: 20px;
        /* Smaller padding inside cards */
        gap: 20px;
      }

      .job-left .main-image {
        width: 100%;
        max-width: none;
        /* Allow image to fill width completely if needed */
        height: 250px;
        /* Fixed height for consistency on small screens */
      }

      .job-right h3 {
        font-size: 24px;
        /* Even smaller title font size */
      }

      .job-right h3::after {
        max-width: 180px;
        /* Even shorter line */
      }

      .job-address {
        font-size: 13px;
        /* Smaller address font */
      }

      .contact-form input,
      .contact-form textarea {
        font-size: 14px;
        /* Smaller input font */
        padding: 10px;
      }

      .contact-form button {
        padding: 10px 20px;
        /* Smaller button padding */
        font-size: 15px;
      }
    }

    /* Specific Mobile breakpoints based on your existing mobile-menu-toggle */
    @media (max-width: 980px) {
      /* This is where your mobile menu kicks in */
      .desktop-menu,
      .desktop-languages {
        display: none !important;
      }

      .mobile-menu-toggle {
        display: flex;
        position: fixed;
        top: 70px;
        right: 20px;
        z-index: 1001;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
      }

      .mobile-menu-toggle .bar {
        width: 26px;
        height: 3px;
        background: white;
        border-radius: 2px;
      }

      .mobile-drawer {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 80%;
        max-width: 320px;
        background-color: #2E4A5E;
        z-index: 999;
        padding: 20px;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.3);
        transition: left 0.3s ease;
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .mobile-drawer.open {
        left: 0;
      }

      .drawer-header {
        text-align: center;
        margin-bottom: 10px;
        margin-top: 100px;
        /* Added for spacing at the top of the drawer */
      }

      .drawer-menu a img {
        height: 42px;
        margin: 6px 0;
      }

      .drawer-languages {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        flex-wrap: wrap;
      }

      .drawer-languages button {
        padding: 6px 12px;
        background-color: white;
        color: #2E4A5E;
        border: none;
        border-radius: 6px;
        font-weight: 600;
      }

      .drawer-socials {
        display: flex;
        gap: 12px;
        margin-top: 10px;
      }

      .drawer-socials img {
        width: 24px;
        height: 24px;
      }
    }
  </style>
</head>

<body>

  <header class="top-bar">
    <div class="logo">
      <a href="/#homepage"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար" class="inner-image" />
      </a>
    </div>

    <div class="mobile-menu-toggle" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>

    <nav class="menu desktop-menu">
      <a href="/#about">
        <img src="{{ asset('css/svg/rusaboute.svg') }}" width="164" height="50" alt="ՄԵՐ ՄԱՍԻՆ" />
      </a>
      <a href="/#services">
        <img src="{{ asset('css/svg/russervices1.svg') }}" width="214" height="50" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" />
      </a>
      <a href="/#job">
        <img src="{{ asset('css/svg/ruslala.svg') }}" width="184" height="50" alt="ԱՇԽԱՏԱՆՔՆԵՐ" />
      </a>
      <a href="/#products">
        <img src="{{ asset('css/svg/rusjob1.svg') }}" width="160" height="50" alt="Ապրանքներ" />
      </a>
      <a href="/#kap">
        <img src="{{ asset('css/svg/ruskap1.svg') }}" width="152" height="50" alt="ԿԱՊ" />
      </a>
    </nav>
    <div class="languages desktop-languages">
      <a href="{{ route('homepage.hy') }}"><button>ՀԱՅ</button></a>
      <a href="{{ route('homepage.ru') }}"><button style=" background:  #2E4A5E;">РУ</button></a>
      <a href="{{ route('homepage.en') }}"><button>ENG</button></a>

      <div class="languagess">
        <a href="viber://add?number=+37491430512" target="_blank">
          <img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber" class="social-icon" />
        </a>
        <a href="https://wa.me/37491430512" target="_blank">
          <img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp" class="social-icon" />
        </a>
      </div>
    </div>
  </header>

  <div class="mobile-drawer" id="mobileDrawer">
    <div class="drawer-header">
      <a href="/#homepage">
        </a>
    </div>

    <nav class="drawer-menu">
      <a href="/#about"><img src="{{ asset('css/svg/rusaboute.svg') }}" alt="ՄԵՐ ՄԱՍԻՆ" /></a>
      <a href="/#services"><img src="{{ asset('css/svg/russervices1.svg') }}" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" /></a>
      <a href="/#job"><img src="{{ asset('css/svg/ruslala.svg') }}" alt="ԱՇԽԱՏԱՆՔՆԵՐ" /></a>
      <a href="/#products"><img src="{{ asset('css/svg/rusjob1.svg') }}" alt="Ապրանքներ" /></a>
      <a href="/#kap"><img src="{{ asset('css/svg/ruskap1.svg') }}" alt="ԿԱՊ" /></a>

      <div class="drawer-languages">
        <a href="{{ route('homepage.hy') }}"><button>ՀԱՅ</button></a>
        <a href="{{ route('homepage.ru') }}"><button>РУ</button></a>
        <a href="{{ route('homepage.en') }}"><button>ENG</button></a>
      </div>

      <div class="drawer-socials">
        <a href="viber://add?number=+37491430512" target="_blank">
          <img src="{{ asset('css/svg/viber.svg') }}" width="23" alt="Viber" />
        </a>
        <a href="https://wa.me/37491430512" target="_blank">
          <img src="{{ asset('css/svg/whatsapp.svg') }}" width="23" alt="WhatsApp" />
        </a>
      </div>
    </nav>
  </div>

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
                <a style="text-decoration: none; color: #cdd9e1;" href="{{ route('jobs.ru', $item->id) }}"
                  style="color: #D9EAF2;">
                  {{ $item->title }}
                </a>
              </h3>
              @if ($item->address)
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
                  <span>{{ $item->address }}</span>
                </p>
              @endif
              <div class="job-description">
                {!! nl2br(e(Str::limit($item->description, 300))) !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </section>

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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1543.7648850677285!2d44.571620621786245!3d40.19027842153545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa30027a212d9%3A0xbc637ff8aac8ecab!2sAlmaka!5e1!3m2!1sen!2sam!4v1750763459909!5m2!1sen!2sam" width="100%" height="250" style="border:0;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
      // Store the current main image source in a temporary variable
      const tempSrc = main.src;
      // Set the main image source to the thumbnail's source
      main.src = thumbnail.src;
      // Set the thumbnail's source to the original main image source
      thumbnail.src = tempSrc;

      // Optional: Add/remove 'selected' class for visual feedback
      const thumbnails = container.querySelectorAll('.thumbnail-row img');
      thumbnails.forEach(img => img.classList.remove('selected'));
      // Find the thumbnail that now has the (new) main image source and mark it as selected
      // Note: This logic assumes unique image sources. If not, you might need a different approach.
      // For simplicity, we just mark the one that was clicked
      thumbnail.classList.add('selected');
    }

    // Mobile menu toggle script
    function toggleMenu() {
      document.getElementById('mobileDrawer').classList.toggle('open');
    }

    document.addEventListener('click', function(e) {
      const drawer = document.getElementById('mobileDrawer');
      const toggle = document.querySelector('.mobile-menu-toggle');

      // Check if the click is outside the drawer and outside the toggle button
      if (drawer && toggle && !drawer.contains(e.target) && !toggle.contains(e.target)) {
        drawer.classList.remove('open');
      }
    });
  </script>

</body>
</html>