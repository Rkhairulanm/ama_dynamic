@extends('main')
@section('content')
    <div class="container mt-5">
        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($testimoni as $index => $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="team-member d-flex align-items-start">
                                <div class="pic">
                                    <img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $item->name }}</h4>
                                    <span>{{ $item->profession }}</span>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach
                </div>
            </div>

        </section><!-- /Team Section -->
    </div>
@endsection
