<!DOCTYPE html>
<html lang="en">
@php
    $tentang = \App\Models\Content::where('type', 'Tentang')->first();
    $artikelKeyword = \App\Models\Artikel::where('published', true)->pluck('title')->implode(', ');
    $artikelAcara = \App\Models\Acara::where('ongoing', true)->pluck('name')->implode(', ');
    $artikelAcaras = \App\Models\Acara::where('ongoing', false)->pluck('name')->implode(', ');
    $aktifitasKeywords = \App\Models\Aktifitas::pluck('name')->implode(', ');
    $testimoniKeyword = \App\Models\Testimoni::pluck('name')->implode(', ');
    $pageKeywords = [
        'Beranda' => \App\Models\Keyword::where('page', 'Beranda')->pluck('keyword')->implode(', '),
        'Tentang' => \App\Models\Keyword::where('page', 'Tentang')->pluck('keyword')->implode(', '),
        'Aktifitas' =>
            \App\Models\Keyword::where('page', 'Aktifitas')->pluck('keyword')->implode(', ') .
            ', ' .
            $aktifitasKeywords,
        'Artikel' =>
            \App\Models\Keyword::where('page', 'Artikel')->pluck('keyword')->implode(', ') . ', ' . $artikelKeyword,
        'Artikel Detail' =>
            \App\Models\Keyword::where('page', 'Artikel')->pluck('keyword')->implode(', ') . ', ' . $artikelKeyword,
        'Acara' => \App\Models\Keyword::where('page', 'Acara')->pluck('keyword')->implode(', ') . ', ' . $artikelAcara,
        'Acara Detail' =>
            \App\Models\Keyword::where('page', 'Acara')->pluck('keyword')->implode(', ') . ', ' . $artikelAcara,
        'Acara Sebelumnya' =>
            \App\Models\Keyword::where('page', 'Acara Sebelumnya')->pluck('keyword')->implode(', ') .
            ', ' .
            $artikelAcaras,
        'Testimoni' =>
            \App\Models\Keyword::where('page', 'Testimoni')->pluck('keyword')->implode(', ') . ', ' . $testimoniKeyword,
        'Kontak' => \App\Models\Keyword::where('page', 'Kontak')->pluck('keyword')->implode(', '),
    ];

    $keywords = $pageKeywords[$title] ?? '';
    $tentangContent = $tentang->content ?? 'Deskripsi tidak tersedia';
@endphp

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ama Bandung - {{ $title }}</title>
    <meta content="{!! $tentangContent !!}" name="description">m
    <meta name="keywords" content="AMA Bandung, {{ $keywords }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="AMA Bandung">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>


<body class="index-page">

    @include('partials.header')

    <main class="main mt-5">
        @yield('content')
    </main>


    @include('partials.footer')
    @include('partials.scrolltop')
    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
