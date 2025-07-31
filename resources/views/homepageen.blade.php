<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- External Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/services.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/job.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/kap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/product.css') }}" />

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900&display=swap" rel="stylesheet" />

    {{-- Consolidated CSS Styles --}}
    <style>
        /* Mobile Menu Specific Styles */
        .mobile-menu-toggle {
            display: none;
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

        .desktop-menu,
        .desktop-languages {
            display: flex;
        }

        .mobile-drawer {
            display: none;
        }

        .mobile-drawer.open+.top-bar .logo {
            display: none;
        }

        .drawer-logo {
            display: none;
        }

        .mobile-drawer.open .drawer-logo {
            display: block;
        }

        /* About Section Styles */
        .about-license {
            margin: 20px 0;
            text-align: left;
        }

        .about-license img {
            height: 50px;
            max-width: 100%;
        }

        /* Jobs Section Styles */
        .job-header-bar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
        }

        .job-section-title {
            color: #D9EAF2;
            font-family: 'Montserrat Armenian bold';
            font-size: 38px;
            margin: 0;
        }

        .job-filter-buttons {
            display: flex;
            gap: 20px;
            margin-left: 20px;
            margin-bottom: 25px;
        }

        .job-filter-svg {
            height: 40px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 5px;
        }

        .job-filter-svg:hover {
            transform: scale(1.05);
            opacity: 0.85;
        }

        .job-filter-svg.active {
            box-shadow: 0 0 0 3px #D9EAF2;
            background-color: rgba(217, 234, 242, 0.1);
            transform: scale(1.1);
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            position: relative;
            padding: 20px;
            border-radius: 12px;
            max-width: 90%;
            max-height: 90%;
        }

        .modal-content img {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 8px;
        }

        .close-btn {
            position: absolute;
            top: -14px;
            right: -14px;
            background: #fff;
            color: #000;
            border-radius: 50%;
            font-size: 24px;
            width: 32px;
            height: 32px;
            text-align: center;
            line-height: 32px;
            cursor: pointer;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
        }

        /* Responsive Media Queries */
        @media (max-width: 1000px) {
            .about-image {
                display: none;
            }
        }

        @media (max-width: 980px) {
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
    <div class="background" id="backgroundSlider">
        <div class="slider-button slider-left" onclick="prevSlide()">
            <img src="/css/svg/arrow-left.svg" alt="Նախորդ">
        </div>
        <div class="slider-button slider-right" onclick="nextSlide()">
            <img src="/css/svg/arrow-left.svg" style="transform: rotate(180deg);" alt="Հաջորդ">
        </div>
        <header class="top-bar">
            <div class="logo">
                <a href="#homepage">
                    <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար" class="inner-image" />
                </a>
            </div>

            <div class="mobile-menu-toggle" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <nav class="menu desktop-menu desktop-only">
                <a href="#about"><img src="{{ asset('css/svg/enaboute1.svg') }}" width="164" height="50" alt="ABOUT" /></a>
                <a href="#services"><img src="{{ asset('css/svg/enservices1.svg') }}" width="214" height="50" alt="SERVICES" /></a>
                <a href="#job"><img src="{{ asset('css/svg/denjobs.svg') }}" width="160" height="50" alt="PORTFOLIO" /></a>
                <a href="#products"><img src="{{ asset('css/svg/enjob1.svg') }}" width="160" height="50" alt="PRODUCTS" /></a>
                <a href="#kap"><img src="{{ asset('css/svg/enkap1.svg') }}" width="152" height="50" alt="CONTACTS" /></a>
            </nav>

            <div class="languages desktop-languages desktop-only">
                <a href="{{ route('homepage.hy') }}"><button>ՀԱՅ</button></a>
                <a href="{{ route('homepage.ru') }}"><button>РУ</button></a>
                <a href="{{ route('homepage.en') }}"><button style=" background:  #2E4A5E;">ENG</button></a>
                <div class="languagess">
                    <a href="viber://add?number=+37491430512" target="_blank"><img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber" class="social-icon" /></a>
                    <a href="https://wa.me/37491430512" target="_blank"><img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp" class="social-icon" /></a>
                </div>
            </div>
        </header>

        <div class="mobile-drawer" id="mobileDrawer">
            <div class="drawer-header">
                <a href="#homepage"></a>
            </div>
            <nav class="drawer-menu">
                <a href="#about"><img src="{{ asset('css/svg/enaboute1.svg') }}" alt="ABOUT" /></a>
                <a href="#services"><img src="{{ asset('css/svg/enservices1.svg') }}" alt="SERVICES" /></a>
                <a href="#job"><img src="{{ asset('css/svg/denjobs.svg') }}" alt="PORTFOLIO" /></a>
                <a href="#products"><img src="{{ asset('css/svg/enjob1.svg') }}" alt="PRODUCTS" /></a>
                <a href="#kap"><img src="{{ asset('css/svg/enkap1.svg') }}" alt="CONTACTS" /></a>
                <div class="drawer-languages">
                    <a href="{{ route('homepage.hy') }}"><button>ՀԱՅ</button></a>
                    <a href="{{ route('homepage.ru') }}"><button>РУ</button></a>
                    <a href="{{ route('homepage.en') }}"><button>ENG</button></a>
                </div>
                <div class="drawer-socials">
                    <a href="viber://add?number=+37491430512" target="_blank"><img src="{{ asset('css/svg/viber.svg') }}" width="23" alt="Viber" /></a>
                    <a href="https://wa.me/37491430512" target="_blank"><img src="{{ asset('css/svg/whatsapp.svg') }}" width="23" alt="WhatsApp" /></a>
                </div>
            </nav>
        </div>

        <main id="homepage" class="content"></main>
    </div>

    @if ($about && $about->show_on_en)
        <section id="about" class="about-section">
            <div class="about-text">
                <h2 style="color: #D9EAF2; font-family: 'Montserrat Armenian';">ABOUT</h2>
                <div class="decor-line"></div>
                <div class="about-license">
                    <img src="{{ asset('css/svg/licenziaen.svg') }}" alt="License" onclick="openModal()" style="cursor: pointer;" />
                </div>
                <p style="font-family: 'Montserrat Armenian'; font-weight: 300; font-size: 17px;">{!! nl2br(e($about->description)) !!}</p>
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
        $enServices = $services->filter(fn($s) => $s->show_on_en);
    @endphp

    @if($enServices->count())
        <section id="services" class="services-section">
            <h2 style="color: #2E4A5E;">SERVICES</h2>
            <div class="services-title-line"></div>
            <div class="services-cards" id="services-cards">
                @foreach ($enServices as $service)
                    <div class="service-card">
                        <img src="{{ asset('storage/' . $service->main_image) }}" alt="Service Image" />
                        <div class="service-text">
                            <div class="card-inner-line"></div>
                            <p>{{ $service->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @php
        $enJobs = $jobs->filter(fn($j) => $j->show_on_en);
    @endphp

    @if($enJobs->count())
        <section id="job" class="jobs-section">
            <h2 style="color:#D9EAF2;">PORTFOLIO</h2>
            <div class="jobs-title-line"></div>
            <div class="job-header-bar"></div>
            <div class="job-filter-buttons">
                <img src="{{ asset('css/svg/hasen.svg') }}" alt="Public" class="job-filter-svg" onclick="filterJobs('public')" />
                <img src="{{ asset('css/svg/hasen1.svg') }}" alt="Residential" class="job-filter-svg" onclick="filterJobs('residential')" />
            </div>
            <div class="scroll-wrapper">
                <div class="jobs-gallery">
                    @foreach ($enJobs as $job)
                        <div class="job-item" data-type="{{ $job->type }}">
                            <a href="{{ route('jobs.en', $job->id) }}">
                                <img src="{{ asset('storage/' . $job->main_image) }}" alt="Job Image" />
                            </a>
                            <h3>{{ \Illuminate\Support\Str::limit($job->title, 24) }}</h3>
                            @if ($job->address)
                                <p class="job-address">
                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:inline-block; vertical-align:middle; margin-right:5px;">
                                        <path d="M6.5 0C4.77672 0.00196598 3.1246 0.66484 1.90606 1.84321C0.687511 3.02159 0.00203992 4.61924 6.91533e-06 6.28571C-0.00205706 7.64756 0.45795 8.97245 1.30946 10.0571C1.30946 10.0571 1.48673 10.2829 1.51569 10.3154L6.5 16L11.4867 10.3126C11.5127 10.2823 11.6905 10.0571 11.6905 10.0571L11.6911 10.0554C12.5422 8.97121 13.002 7.64693 13 6.28571C12.998 4.61924 12.3125 3.02159 11.0939 1.84321C9.8754 0.66484 8.22328 0.00196598 6.5 0ZM6.5 8.57143C6.03252 8.57143 5.57553 8.43737 5.18684 8.18622C4.79814 7.93506 4.49518 7.57808 4.31629 7.16042C4.13739 6.74276 4.09058 6.28318 4.18178 5.83979C4.27298 5.39641 4.4981 4.98913 4.82866 4.66947C5.15922 4.34981 5.58038 4.13211 6.03888 4.04392C6.49738 3.95572 6.97263 4.00099 7.40452 4.17399C7.83642 4.34699 8.20557 4.63996 8.46529 5.01584C8.72501 5.39172 8.86363 5.83364 8.86363 6.28571C8.86285 6.89169 8.61358 7.47263 8.17048 7.90112C7.72738 8.32961 7.12663 8.57067 6.5 8.57143Z" fill="url(#paint0_linear_1_886)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_1_886" x1="6.5" y1="0" x2="6.5" y2="16" gradientUnits="userSpaceOnUse">
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
    @endif

    <section id="products" class="product-section">
        <h2>CATALOG</h2>
        <div class="decor-line"></div>
        <div class="product-grid">
            @foreach ($products as $product)
                @if ($product->locale === 'en')
                    <div class="product-card">
                        <div class="header">{{ $product->title }}</div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                        <div class="content">
                            <p>{{ $product->description }}</p>
                            @if (is_array($product->pdf) && count($product->pdf))
                                <div class="pdf-button-group">
                                    @foreach ($product->pdf as $pdf)
                                        <a href="{{ asset('storage/' . $pdf['file']) }}" target="_blank" class="pdf-button">📄 {{ $pdf['name'] ?? 'PDF File' }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <section id="kap" class="contact-section">
        <h2 style="color: #D9EAF2;">CONTACTS</h2>
        <div class="contact-title-line"></div>
        <div class="contact-container">
            <div class="contact-info">
                <ul>
                    <li><img src="/css/svg/location.svg" alt="Address" width="16" height="16" style="margin-right: 11px;"> Address: 0076, Armenia, Yerevan, Aksel Bakunts 4</li>
                    <li><img src="/css/svg/telefon.svg" alt="Phone" width="16" height="16" style="margin-right: 11px;"> Phone: +37491430512</li>
                    <li><img src="/css/svg/gmail.svg" alt="Email" width="16" height="16" style="margin-right: 11px;"> Email: armenlift@gmail.com</li>
                </ul>
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1543.7648850677285!2d44.571620621786245!3d40.19027842153545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa30027a212d9%3A0xbc637ff8aac8ecab!2sAlmaka!5e1!3m2!1sen!2sam!4v1750763459909!5m2!1sen!2sam" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <form class="contact-form">
                <div class="form-row">
                    <input type="text" placeholder="First Name" />
                    <input type="text" placeholder="Last Name" />
                </div>
                <div class="form-row">
                    <input type="text" placeholder="Phone Number" />
                    <input type="email" placeholder="Email" />
                </div>
                <textarea placeholder="Message..."></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </section>

    <div id="imageModal" class="modal-overlay" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation();">
            <img src="{{ asset('css/images/modal.png') }}" alt="License Image" />
        </div>
    </div>

    {{-- Consolidated JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Mobile Menu ---
            const drawer = document.getElementById('mobileDrawer');

            window.toggleMenu = function() {
                drawer.classList.toggle('open');
            }

            document.querySelectorAll('.drawer-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    drawer.classList.remove('open');
                });
            });

            // --- Background Slider ---
            const slider = document.getElementById('backgroundSlider');
            if (slider) {
                const desktopImages = [
                    '/css/images/enb1.png',
                    '/css/images/enb2.png',
                    '/css/images/enb3.png'
                ];
                const mobileImages = [
                    '/css/images/enb11.png',
                    '/css/images/enb22.png',
                    '/css/images/enb33.png'
                ];
                let currentIndex = 0;

                function getCurrentImageArray() {
                    return window.innerWidth < 900 ? mobileImages : desktopImages;
                }

                function updateBackground() {
                    const images = getCurrentImageArray();
                    slider.style.backgroundImage = `url('${images[currentIndex]}')`;
                }

                window.nextSlide = function() {
                    const images = getCurrentImageArray();
                    currentIndex = (currentIndex + 1) % images.length;
                    updateBackground();
                }

                window.prevSlide = function() {
                    const images = getCurrentImageArray();
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    updateBackground();
                }

                window.addEventListener('resize', updateBackground);
                updateBackground(); // Initial call
            }

            // --- Services Auto-Scroller ---
            const container = document.getElementById('services-cards');
            if (container) {
                let autoScrollDirection = 1;
                const autoScrollSpeed = 1.5;
                setInterval(() => {
                    container.scrollLeft += autoScrollDirection * autoScrollSpeed;
                    const maxScroll = container.scrollWidth - container.clientWidth;
                    const atRightEnd = container.scrollLeft >= (maxScroll - 2);
                    const atLeftEnd = container.scrollLeft <= 2;
                    if (atRightEnd) {
                        autoScrollDirection = -1;
                    } else if (atLeftEnd) {
                        autoScrollDirection = 1;
                    }
                }, 16);
            }

            // --- Job Filtering ---
            let currentFilter = 'all';
            window.filterJobs = function(type) {
                const items = document.querySelectorAll('.job-item');
                const buttons = document.querySelectorAll('.job-filter-svg');

                if (currentFilter === type) {
                    currentFilter = 'all';
                    items.forEach(item => item.style.display = 'block');
                    buttons.forEach(btn => btn.classList.remove('active'));
                    return;
                }

                currentFilter = type;

                items.forEach(item => {
                    const jobType = item.getAttribute('data-type');
                    item.style.display = (jobType === type) ? 'block' : 'none';
                });

                buttons.forEach(btn => {
                    const alt = btn.getAttribute('alt');
                    if ((type === 'public' && alt.includes('Public')) || (type === 'residential' && alt.includes('Residential'))) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            }

            // --- Image Modal ---
            window.openModal = function() {
                document.getElementById('imageModal').classList.add('active');
            }
            window.closeModal = function() {
                document.getElementById('imageModal').classList.remove('active');
            }
        });
    </script>
</body>

</html>