@extends('main')
@section('content')
    <div class="container mt-5">
        <div class="container section-title" style="margin-top: 150px" data-aos="fade-up">
            <h2>Tentang Kami</h2>
        </div><!-- End Section Title -->

        <div class="row mb-5">
            <h2 class="mb-3">AMA Bandung</h2>
            <hr>
            <p>
                @isset($contents['tentang'])
                    {!! $contents['tentang']->content !!}
                @else
                    Konten tentang kami tidak tersedia.
                @endisset
            </p>
            <h5 class="mb-3">Visi & Misi</h5>
            <p>
                <b>Visi AMA Indonesia :</b> <br>
                @isset($contents['visi'])
                    {!! $contents['visi']->content !!}
                @else
                    Visi tidak tersedia.
                @endisset
            </p>
            <p><b>Misi AMA Indonesia</b></p>
            <div class="ms-1">
                @isset($contents['misi'])
                    {!! $contents['misi']->content !!}
                @else
                    Misi tidak tersedia.
                @endisset
            </div>
        </div>
    </div>
@endsection
