<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/services.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/job.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/kap.css') }}" />
    <title>Document</title>
</head>

<body>
    <div class="background">
        <header class="top-bar">
            <div class="logo"> <img src="{{ asset('css/images/logo.png') }}" alt="Ներսի նկար" class="inner-image" />
            </div>


            <nav class="menu">
    <a href="#">
        <img src="{{ asset('css/svg/aboute1.svg') }}" width="164" height="50" alt="ՄԵՐ ՄԱՍԻՆ" />
    </a>
    <a href="#">
        <img src="{{ asset('css/svg/services1.svg') }}" width="214" height="50" alt="ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ" />
    </a>
    <a href="#">
        <img src="{{ asset('css/svg/job1.svg') }}" width="184" height="50" alt="ԱՇԽԱՏԱՆՔՆԵՐ" />
    </a>
    <a href="#">
        <img src="{{ asset('css/svg/kap1.svg') }}" width="112" height="50" alt="ԿԱՊ" />
    </a>
</nav>





            <div class="languages">
                <button>Հայ</button>
                <button>EN</button>
                <button>RU</button>
            </div>
        </header>

        <main class="content">
            <img src="{{ asset('css/images/firtz2.png') }}" alt="Ներսի նկար" class="inner-image" />
        </main>
    </div>

    <section class="about-section">
        <div class="about-text">
            <h2>ՄԵՐ ՄԱՍԻՆ</h2>
            <div class="decor-line"></div>
            <p>
                <strong> «Արմենլիֆտ» ՀՁ ՍՊԸ-ն հիմնադրվել է 1998 թվականի օգոստոսի 15-ին:</strong> <br><br>

                Կազմակերպության հիմնադիր են հանդիսանում Գևորգ Բաղդասարի Մուրադխանյանը
                և Գոռ Բաղդասարի Մուրադխանյանը: Առաջին իսկ օրերից ընկերությունը հավաքագրել է իր կազմում փորձառու
                մասնագետների և շատ կարճ ժամանակում իր հաստատուն տեղն է գրավել վերելակների տեղադրման և տեխնիկական
                սպասարկման Հայաստանյան շուկայում:<br><br>

                2001 թվականի դեկտեմբերի 17-ին «Արմենլիֆտ» ՀՁ ՍՊԸ-ն ՀՀ Քաղաքաշինության նախարարության կողմից ստացել է թիվ
                - 6520 պետական լիցենզիան:<br><br>

                2008 թվականի ապրիլի 7-ին «Արմենլիֆտ» ՀՁ ՍՊԸ-ն ՀՀ քաղաքաշինության նախարարության կողմից ստացել է թիվ -
                11893 պետական լիցենզիան:<br><br>

                2001 թվականից «Արմենլիֆտ» ՀՁ ՍՊԸ-ն հանդիսանում է OTIS ֆիրմայի
                պաշտոնական ներկայացուցիչը Հայաստանի Հանրապետությունում:
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


    <section class="services-section">
    <h2>ԾԱՌԱՅՈՒԹՅՈՒՆՆԵՐ</h2>
    <div class="services-title-line"></div>

    <div class="services-cards" id="services-cards">
        @foreach ($services as $service)
            <div class="service-card">
                <img src="{{ asset('storage/' . $service->main_image) }}" alt="service Image" />
                <div class="service-text">
                    <div class="card-inner-line"></div>
                    <p>{{ $service->title }}</p>
                    @if ($service->description)
                        <p>{{ $service->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>



    <section class="jobs-section">
        <h2>ԱՇԽԱՏԱՆՔՆԵՐ</h2>
        <div class="jobs-title-line"></div>

        <div class="jobs-gallery">
            @foreach ($jobs as $job)
                <div class="job-item">
                    <img src="{{ asset('storage/' . $job->main_image) }}" alt="{{ $job->title }}">
                    <!-- <p>{{ $job->title }}</p> -->

                    {{-- Ցանկության դեպքում կարող ես ավելացնել մանրամասն կոճակ --}}
                    {{-- <a href="{{ route('job.show', $job->id) }}">Տեսնել ավելին</a> --}}

                </div>
            @endforeach
        </div>
    </section>
    <!-- <section class="jobs-section">
        <h2>ԱՇԽԱՏԱՆՔՆԵՐ</h2>
        <div class="jobs-title-line"></div>

        <div class="services-cards jobs-cards">
            @foreach ($jobs as $job)
                <div class="service-card job-card">
                    <img src="{{ asset('storage/' . $job->main_image) }}" alt="{{ $job->title }}" />
                    <div class="service-text job-text">
                        <div class="card-inner-line"></div>
                        <p>{{ $job->title }}</p>
                        @if ($job->description)
                            <p>{{ $job->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section> -->



    <section class="contact-section">
        <h2>ԿԱՊ ՄԵԶ ՀԵՏ</h2>
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


    <!-- <script>
        document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.menu svg').forEach(svg => {
        const text = svg.querySelector('text');
        const bbox = text.getBBox();
        const padding = 40;
        const newWidth = bbox.width + padding;

        // Միայն լայնությունը հաշվարկում ենք, բարձրությունը թողնում ենք ֆիքսված
        svg.setAttribute('width', newWidth);
        svg.setAttribute('viewBox', `0 0 ${newWidth} 50`);

        const image = svg.querySelector('image');
        if (image) {
            image.setAttribute('width', newWidth);
            image.setAttribute('height', '50'); // ֆիքսված բոյ
            image.setAttribute('preserveAspectRatio', 'xMidYMid meet'); // նոր ավելացված
        }

        text.setAttribute('x', newWidth / 2);
    });
});

    </script> -->

<script>
  const container = document.getElementById('services-cards');

  // Կլոնավորում երկու անգամ անսահման սքրոլի համար
  function cloneCards() {
    const cards = Array.from(container.children);
    cards.forEach(card => {
      const clone = card.cloneNode(true);
      container.appendChild(clone);
    });
  }
  cloneCards();
  cloneCards();

  let scrollSpeed = 1; // px per frame
  let isAutoScrolling = true;

  // Drag variables
  let isDragging = false;
  let startX;
  let scrollStart;

  // Ավտոմատ սքրոլ ֆունկցիա
  function autoScroll() {
    if (isAutoScrolling && !isDragging) {
      container.scrollLeft += scrollSpeed;
      // Վերադարձ սկիզբ եթե հասնի կեսին
      if (container.scrollLeft >= container.scrollWidth / 2) {
        container.scrollLeft = 0;
      }
    }
    requestAnimationFrame(autoScroll);
  }

  // Սկսում ենք ավտոսքրոլը
  autoScroll();

  // Մկնիկի շարժման հսկողություն (drag to scroll)
  container.addEventListener('mousedown', (e) => {
    isDragging = true;
    isAutoScrolling = false;
    startX = e.pageX - container.offsetLeft;
    scrollStart = container.scrollLeft;
    container.classList.add('active');  // Էֆեկտ
  });

  container.addEventListener('mouseleave', () => {
    if(isDragging) {
      isDragging = false;
      isAutoScrolling = true;
      container.classList.remove('active');
    }
  });

  container.addEventListener('mouseup', () => {
    if(isDragging) {
      isDragging = false;
      isAutoScrolling = true;
      container.classList.remove('active');
    }
  });

  container.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - container.offsetLeft;
    const walk = (startX - x); // Calculate how far mouse moved
    container.scrollLeft = scrollStart + walk;

    // Loop scroll backward
    if (container.scrollLeft <= 0) {
      container.scrollLeft = container.scrollWidth / 2;
    }
    // Loop scroll forward
    if (container.scrollLeft >= container.scrollWidth / 2) {
      container.scrollLeft = 0;
    }
  });
</script>



</body>

</html>