@extends('main')
@section('content')
    <div class="container mt-5">
        <!-- Doctors Section -->
        <section id="doctors" class="doctors section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Acara</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    @foreach ($acara as $item)
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
                        </div><!-- End Team Member -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Doctors Section -->
    </div>
@endsection
