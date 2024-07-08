@extends('main')
@section('content')
    <div class="container mt-5">
        <!-- About Section -->
        <section id="about" class="about section mt-5">

            <div class="container mt-3">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
                        <a href="{{ Storage::url($artikel->image) }}" class="glightbox" data-gallery="images-gallery">
                            <img src="{{ Storage::url($artikel->image) }}" alt="" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="inner-title">{{ $artikel->title }} </h2>
                        <div class="our-story">
                            <h3>{{ $artikel->title }}</h3>
                            <p>{!! $artikel->content !!}</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->
    </div>
@endsection
