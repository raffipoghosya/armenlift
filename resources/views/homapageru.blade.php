<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/services.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/job.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/kap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/product.css') }}" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900&display=swap"
        rel="stylesheet" />

</head>

<body>
    <div class="background">
        <header class="top-bar">
            <div class="logo"><a href="#homepage"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար"
                        class="inner-image" /></a>
            </div>
            <nav class="menu">
                <a href="#about">
                    <img src="{{ asset('css/svg/aboute1.svg') }}" width="164" height="50" alt="ՄԵՐ ՄԱՍԻՆ" />
                </a>
                <a href="#services">
                    <img src="{{ asset('css/svg/services1.svg') }}" width="214" height="50" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" />
                </a>
                <a href="#job">
                    <img src="{{ asset('css/svg/job1.svg') }}" width="184" height="50" alt="ԱՇԽԱՏԱՆՔՆԵՐ" />
                </a>
                <a href="#products">
                    <img src="{{ asset('css/svg/jobs.svg') }}" width="160" height="50" alt="Ապրանքներ" />
                </a>
                <a href="#kap">
                    <img src="{{ asset('css/svg/kap1.svg') }}" width="112" height="50" alt="ԿԱՊ" />
                </a>
            </nav>
            <div class="languages">
            <a href="{{ route('homepage.hy') }}"><button>ՀԱՅ</button></a>
            <a href="{{ route('homepage.ru') }}"><button>РУС</button></a>
            <a href="{{ route('homepage.en') }}"><button>ENG</button></a>

                <div class="languagess">
                    <img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber"
                        class="social-icon" />
                    <img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp"
                        class="social-icon" />
                </div>
            </div>
        </header>

        <main id="homepage" class="content">
            <img src="{{ asset('css/images/firtz2.png') }}" alt="Ներսի նկար" class="inner-image" />
        </main>
    </div>

    @if ($about && $about->show_on_ru)
        <section id="about" class="about-section">
            <div class="about-text">
                <h2 style="color: #D9EAF2; font-family: 'Montserrat Armenian';">О нас</h2>
                <div class="decor-line"></div>
                <p style="font-family: 'Montserrat Armenian'; font-weight: 300; font-size: 17px;">
                    {!! nl2br(e($about->description)) !!}
                </p>
            </div>
            <div class="about-image">
                @if ($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Armenlift Image" />
                @else
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="Default Image" />
                @endif
            </div>
        </section>
    @endif



@php
    // Фильтруем только те услуги, у которых show_on_ru = true
    $ruServices = $services->filter(fn($s) => $s->show_on_ru);
@endphp
{{-- Services Section (Русский) --}}
@if($ruServices->count())
    <section id="services" class="services-section">
        <h2 style="color: #2E4A5E;">Услуги</h2>
        <div class="services-title-line"></div>

        <div class="services-cards" id="services-cards">
            @foreach ($ruServices as $service)
                <div class="service-card">
                    <img src="{{ asset('storage/' . $service->main_image) }}" alt="Изображение услуги" />
                    <div class="service-text">
                        <div class="card-inner-line"></div>
                        <p>{{ $service->title }}</p>
                        @if ($service->description)
                            <!-- <p>{{ $service->description }}</p> -->
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="scroll-buttons">
            <button id="scroll-left" class="scroll-btn">
                <img src="{{ asset('css/svg/left.svg') }}" alt="Влево">
            </button>
            <button id="scroll-right" class="scroll-btn">
                <img src="{{ asset('css/svg/left.svg') }}" style="transform: rotate(180deg);" alt="Вправо">
            </button>
        </div>
    </section>
@endif


    <script>
    const container = document.getElementById('services-cards');
    const scrollLeftBtn = document.getElementById('scroll-left');
    const scrollRightBtn = document.getElementById('scroll-right');

    let scrollDirection = 0; // Ոչ մի ուղղություն նախնական
    let scrollSpeed = 8;
    let maxSpeed = 25;
    let scrollInterval;
    let smoothStep = 3;

    function scrollStart(newDirection) {
        // Եթե ուղղությունը նույնն է, արագացնենք
        if (scrollDirection === newDirection) {
            scrollSpeed = Math.min(scrollSpeed + smoothStep, maxSpeed);
        } else {
            scrollDirection = newDirection;
            scrollSpeed = 8; // Վերադառնանք սկսնակ արագությանը
        }

        clearInterval(scrollInterval);
        scrollInterval = setInterval(() => {
            container.scrollLeft += scrollDirection * scrollSpeed;
        }, 16);
    }

    function scrollStop() {
        clearInterval(scrollInterval);
        scrollSpeed = 8; // Վերադառնում է սկսնակ արագությանը
        scrollDirection = 0;
    }

    scrollLeftBtn.addEventListener('mousedown', () => scrollStart(-1));
    scrollRightBtn.addEventListener('mousedown', () => scrollStart(1));
    scrollLeftBtn.addEventListener('mouseup', scrollStop);
    scrollRightBtn.addEventListener('mouseup', scrollStop);
    scrollLeftBtn.addEventListener('mouseleave', scrollStop);
    scrollRightBtn.addEventListener('mouseleave', scrollStop);
</script>



    <section id="job" class="jobs-section">
        <h2 style="color:#D9EAF2;">Продукция</h2>
        <div class="jobs-title-line"></div>

        <div class="scroll-wrapper">
            <div class="jobs-gallery">
                @foreach ($jobs as $job)
                    <div class="job-item">
                        <a href="{{ route('jobs.show', $job->id) }}">
                            <img src="{{ asset('storage/' . $job->main_image) }}" alt="{{ $job->title }}" />
                        </a>
                        <h3>{{ \Illuminate\Support\Str::limit($job->title, 24) }}</h3>
                        @if ($job->address)
                            <p class="job-address">
                                <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    style="display:inline-block; vertical-align:middle; margin-right:5px;">
                                    <path
                                        d="M6.5 0C4.77672 0.00196598 3.1246 0.66484 1.90606 1.84321C0.687511 3.02159 0.00203992 4.61924 6.91533e-06 6.28571C-0.00205706 7.64756 0.45795 8.97245 1.30946 10.0571C1.30946 10.0571 1.48673 10.2829 1.51569 10.3154L6.5 16L11.4867 10.3126C11.5127 10.2823 11.6905 10.0571 11.6905 10.0571L11.6911 10.0554C12.5422 8.97121 13.002 7.64693 13 6.28571C12.998 4.61924 12.3125 3.02159 11.0939 1.84321C9.8754 0.66484 8.22328 0.00196598 6.5 0ZM6.5 8.57143C6.03252 8.57143 5.57553 8.43737 5.18684 8.18622C4.79814 7.93506 4.49518 7.57808 4.31629 7.16042C4.13739 6.74276 4.09058 6.28318 4.18178 5.83979C4.27298 5.39641 4.4981 4.98913 4.82866 4.66947C5.15922 4.34981 5.58038 4.13211 6.03888 4.04392C6.49738 3.95572 6.97263 4.00099 7.40452 4.17399C7.83642 4.34699 8.20557 4.63996 8.46529 5.01584C8.72501 5.39172 8.86363 5.83364 8.86363 6.28571C8.86285 6.89169 8.61358 7.47263 8.17048 7.90112C7.72738 8.32961 7.12663 8.57067 6.5 8.57143Z"
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="products" class="product-section">
        <h2>Портфолио</h2>
        <div class="decor-line"></div>

        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="header">{{ $product->title }}</div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    <div class="content">
                        <p>{{ $product->description }}</p>
                        @if (is_array($product->pdf) && count($product->pdf))
                            <div class="pdf-button-group">
                                @foreach ($product->pdf as $pdf)
                                    <a href="{{ asset('storage/' . $pdf['file']) }}" target="_blank" class="pdf-button">
                                        📄 {{ $pdf['name'] ?? 'PDF ֆայլ' }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </section>






    <section id="kap" class="contact-section">
        <h2 style="color: #D9EAF2;">Контакты</h2>
        <div class="contact-title-line"></div>

        <div class="contact-container">
            <div class="contact-info">
                <ul>
                    <li>
                        <img src="/css/svg/location.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Հասցե՝ 0076, ՀՀ, ք․Երևան, Ակսել Բակունց 4, 51 տարածք
                    </li>

                    <li>
                        <img src="/css/svg/telefon.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Հեռ․: +37491430512
                    </li>
                    <li>
                        <img src="/css/svg/gmail.svg" alt="Հասցե" width="16" height="16" style="margin-right: 11px;">
                        Էլ. փոստ․ armenlift@gmail.com
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


</body>

</html>