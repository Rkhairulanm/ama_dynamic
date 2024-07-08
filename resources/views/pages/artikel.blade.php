@extends('main')

@section('content')
    <div class="container mt-5">
        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            <div class="container" style="margin-top: 120px">
                <div class="row gy-4">
                    @forelse ($artikel as $item)
                        <div class="col-lg-4">
                            <article class="position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    @if ($item->image)
                                        <img src="{{ Storage::url($item->image) }}" class="img-fluid"
                                            alt="{{ $item->title }}">
                                    @else
                                        <img src="{{ asset('default-image.jpg') }}" class="img-fluid" alt="Default Image">
                                    @endif
                                    <span class="post-date">{{ $item->created_at->format('M d, Y') }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $item->title }}</h3>

                                    <hr>

                                    <a href="/artikel-detail-{{ $item->id }}" class="readmore stretched-link">
                                        <span>Read More</span><i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                            </article>
                        </div><!-- End post list item -->
                    @empty
                        <div class="col-12">
                            <p>Artikel tidak tersedia saat ini.</p>
                        </div>
                    @endforelse

                </div>
            </div>
            <div class=" section mx-5 my-2">
                {{ $artikel->withQueryString()->links() }}
            </div>

        </section><!-- /Blog Posts Section -->
    </div>
@endsection
