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
        <header  class="top-bar">
            <div class="logo"><a href="#homepage"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար" class="inner-image" /></a>
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
                <button>ՀԱՅ</button>
                <button>РУС</button>
                <button>ENG</button>

                <div class="languagess">
                    <img src="{{ asset('css/svg/viber.svg') }}" height="21px" width="23px" alt="Viber"
                        class="social-icon" />
                    <img src="{{ asset('css/svg/whatsapp.svg') }}" height="21px" width="23px" alt="WhatsApp"
                        class="social-icon" />
                </div>
            </div>
        </header>

        <main  id="homepage" class="content">
            <img src="{{ asset('css/images/firtz2.png') }}" alt="Ներսի նկար" class="inner-image" />
        </main>
    </div>

    <section id="about" class="about-section">
        <div class="about-text">
            <h2 style="color: #D9EAF2;">ՄԵՐ ՄԱՍԻՆ</h2>
            <div class="decor-line"></div>
            <p style="font-family: 'Montserrat Armenian'; font-size: 17px; font-weight:300 ;">
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


    <section id="services" class="services-section">
        <h2 style="color: #2E4A5E;">ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ</h2>
        <div class="services-title-line"></div>
        <div class="services-cards" id="services-cards">
            @foreach ($services as $service)
                <div class="service-card">
                    <img src="{{ asset('storage/' . $service->main_image) }}" alt="service Image" />
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
                <img src="{{ asset('css/svg/left.svg') }}" alt="Ձախ">
            </button>
            <button id="scroll-right" class="scroll-btn">
                <img src="{{ asset('css/svg/left.svg') }}" style="transform: rotate(180deg);" alt="Աջ">
            </button>
        </div>
    </section>

    <script>
        const container = document.getElementById('services-cards');
        const scrollLeftBtn = document.getElementById('scroll-left');
        const scrollRightBtn = document.getElementById('scroll-right');

        let scrollDirection = 1; // 1՝ աջ, -1՝ ձախ

        function startInfiniteAutoScroll() {
            setInterval(() => {
                container.scrollLeft += scrollDirection;

                // Հասել ենք աջ ծայրին
                if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                    scrollDirection = -1; // փոխում ենք դեպի ձախ
                }

                // Հասել ենք ձախ ծայրին
                if (container.scrollLeft <= 0) {
                    scrollDirection = 1; // փոխում ենք դեպի աջ
                }
            }, 20); // արագությունը կարելի է կարգավորել
        }

        // Ուղղության ձեռքով կառավարում
        scrollLeftBtn.addEventListener('click', () => {
            scrollDirection = -1;
        });

        scrollRightBtn.addEventListener('click', () => {
            scrollDirection = 1;
        });

        // Սկսում ենք ավտոմատ սքրոլը
        startInfiniteAutoScroll();
    </script>

<section id="job" class="jobs-section">
  <h2 style="color:#D9EAF2;">ԱՇԽԱՏԱՆՔՆԵՐ</h2>
  <div class="jobs-title-line"></div>

  <div class="scroll-wrapper">
    <div class="jobs-gallery">
      @foreach ($jobs as $job)
        <div class="job-item">
          <a href="{{ route('jobs.show', $job->id) }}">
            <img src="{{ asset('storage/' . $job->main_image) }}" alt="{{ $job->title }}" />
          </a>
          <h3>{{ \Illuminate\Support\Str::limit($job->title, 30) }}</h3>
          @if ($job->address)
            <p class="job-address">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16" fill="#cdd9e1">
                <path d="M168 0C75.3 0 0 75.3 0 168c0 87.6 141.1 252.1 149.7 261.4a23.8 23.8 0 0 0 36.5 0C242.9 420.1 384 255.6 384 168 384 75.3 308.7 0 216 0zm0 240a72 72 0 1 1 0-144 72 72 0 0 1 0 144z"/>
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
        <h2>ԱՊՐԱՆՔՆԵՐԸ</h2>
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


</body>

</html>