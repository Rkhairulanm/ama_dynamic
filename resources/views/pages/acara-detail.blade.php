@extends('main')
@section('content')
    <div class="container" style="margin-top: 100px;">
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
                        <a href="{{ Storage::url($acara->image) }}" class="glightbox" data-gallery="images-gallery">
                            <img src="{{ Storage::url($acara->image) }}" alt="" class="img-fluid">
                        </a>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="inner-title">{{ $acara->name }} </h2>
                        <div class="our-story">
                            <p class="text-secondary">{{ $acara->created_at->format('M d, Y') }}</p>
                            <h3>{{ $acara->name }}</h3>
                            <i class="fa-regular fa-user mt-3"></i> {{ $acara->organizer }}
                            <hr class="mb-4">
                            <p>{!! $acara->content !!}</p>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- /About Section -->
    </div>
@endsection
