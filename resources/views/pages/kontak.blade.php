@extends('main')

@section('content')
    <div class="container mt-5">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Kontak</h2>
                </div><!-- End Section Title -->

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126736.15417841394!2d107.625101!3d-6.949622!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e71a243856d3%3A0xb5406ab47e6b8262!2sAsosiasi%20Manajemen%20Indonesia%20(AMA)%20Chapter%20Bandung!5e0!3m2!1sid!2sid!4v1719804324260!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                @isset($contents)
                                    <p> {!! $contents['location']->content !!}</p>
                                @else
                                    Lokasi tidak tersedia
                                @endisset
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                @isset($contents)
                                    <p>{!! $contents['email']->content !!}</p>
                                @else
                                    Lokasi tidak tersedia
                                @endisset
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                @isset($contents)
                                    <p>{!! $contents['phone']->content !!}</p>
                                @else
                                    Lokasi tidak tersedia
                                @endisset
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        @if (Session::has('status'))
                            <div class="alert alert-success text-secondary opacity-5" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form action="/kontak-send" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </div>
@endsection
