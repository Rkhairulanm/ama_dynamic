@extends('main')
@section('content')
    <div class="container mt-5">
        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">
                    @foreach ($gallery as $item)
                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="{{ Storage::url($item->image) }}" class="glightbox"
                                    data-gallery="images-gallery">
                                    <img src="{{ Storage::url($item->image) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div><!-- End Gallery Item -->
                    @endforeach

                </div>

            </div>

        </section><!-- /Gallery Section -->

    </div>
@endsection
