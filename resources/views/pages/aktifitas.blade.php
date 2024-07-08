@extends('main')
@section('content')
    <div class="container mt-5">
        <!-- Departments Section -->
        <section id="departments" class="departments section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $title }}</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                @if($aktifitas->isEmpty())
                    <p>Aktivitas tidak tersedia saat ini.</p>
                @else
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-tabs flex-column">
                                @foreach ($aktifitas as $index => $item)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                            href="#departments-tab-{{ $index + 1 }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                @foreach ($aktifitas as $index => $item)
                                    <div class="tab-pane {{ $index == 0 ? 'active show' : '' }}"
                                        id="departments-tab-{{ $index + 1 }}">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>{{ $item->name }}</h3>
                                                <p>{!! $item->content !!}</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="{{ Storage::url($item->image) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </section><!-- /Departments Section -->
    </div>
@endsection
