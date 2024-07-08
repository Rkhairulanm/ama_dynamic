@extends('main')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('assets/img/hero-bgg.jpg') }}" alt="" data-aos="fade-in">
        <div class="container">
            <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-xl-6 col-lg-8">
                    @isset($contents['heroTitle'])
                        <h2>{!! $contents['heroTitle']->content !!}</h2>
                    @else
                        <h2>Default Hero Title</h2>
                    @endisset

                    @isset($contents['heroDescription'])
                        <p>{!! $contents['heroDescription']->content !!}</p>
                    @else
                        <p>Default Hero Description</p>
                    @endisset
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#283b91" fill-opacity="1"
            d="M0,128L40,117.3C80,107,160,85,240,101.3C320,117,400,171,480,202.7C560,235,640,245,720,250.7C800,256,880,256,960,218.7C1040,181,1120,107,1200,96C1280,85,1360,139,1400,165.3L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>

    <!-- Services Section -->
    <section id="services" class="services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-house"></i>
                        </div>
                        <a href="/tentang" class="stretched-link">
                            @isset($contents['houseCardTitle'])
                                <h3>{!! $contents['houseCardTitle']->content !!}</h3>
                            @else
                                <h3>Default House Card Title</h3>
                            @endisset
                        </a>
                        @isset($contents['houseCardDescription'])
                            <p>{!! $contents['houseCardDescription']->content !!}</p>
                        @else
                            <p>Default House Card Description</p>
                        @endisset
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <a href="/acara-sebelumnya" class="stretched-link">
                            @isset($contents['lightBlubCardTitle'])
                                <h3>{!! $contents['lightBlubCardTitle']->content !!}</h3>
                            @else
                                <h3>Default Lightbulb Card Title</h3>
                            @endisset
                        </a>
                        @isset($contents['lightBlubCardDescription'])
                            <p>{!! $contents['lightBlubCardDescription']->content !!}</p>
                        @else
                            <p>Default Lightbulb Card Description</p>
                        @endisset
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-gears"></i>
                        </div>
                        <a href="/kontak" class="stretched-link">
                            @isset($contents['gearsCardTitle'])
                                <h3>{!! $contents['gearsCardTitle']->content !!}</h3>
                            @else
                                <h3>Default Gears Card Title</h3>
                            @endisset
                        </a>
                        @isset($contents['gearsCardDescription'])
                            <p>{!! $contents['gearsCardDescription']->content !!}</p>
                        @else
                            <p>Default Gears Card Description</p>
                        @endisset
                    </div>
                </div>
                <!-- End Service Item -->
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Acara</h2>
            <p>Beberapa acara terbaru yang kami selenggarakan</p>
        </div>
        <!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                @forelse ($acara as $item)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="/acara-detail-{{ $item->id }}">
                            <div class="team-member d-flex align-items-start">
                                <div class="w-50"><img src="{{ Storage::url($item->image) }}" class="img-fluid img-q"
                                        alt=""></div>
                                <div class="member-info">
                                    <h4>{{ $item->name }} </h4>
                                    <span>{{ $item->organizer }} </span>
                                    <p>{!! $item->content !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>No acara available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Doctors Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimomi Mitra</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row align-items-center">
                <center>
                    <div class="col-lg-9" data-aos="fade-up" data-aos-delay="200">

                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      }
                    }
                  </script>
                            <div class="swiper-wrapper">
                                @foreach ($testimoni as $item)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="d-flex">
                                                <img src="{{ Storage::url($item->image) }}" style="object-fit: cover"
                                                    class="testimonial-img flex-shrink-0" alt="">
                                                <div class="text-start pt-3">
                                                    <h3>{{ $item->name }}</h3>
                                                    <h4>{{ $item->profession }}</h4>
                                                </div>
                                            </div>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>{!! $item->description !!}</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div><!-- End testimonial item -->
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                </center>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <section id="clients" class="clients section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Mitra Kami </h2>
        </div><!-- End Section Title -->


        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "spaceBetween": 40
                    },
                    "480": {
                      "slidesPerView": 3,
                      "spaceBetween": 60
                    },
                    "640": {
                      "slidesPerView": 4,
                      "spaceBetween": 80
                    },
                    "992": {
                      "slidesPerView": 6,
                      "spaceBetween": 120
                    }
                  }
                }
              </script>
                <div class="swiper-wrapper align-items-center">
                    @foreach ($mitra as $item)
                        <div class="swiper-slide"><img src="{{ Storage::url($item->image) }}" class="img-fluid"
                                alt=""></div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Clients Section -->
@endsection
