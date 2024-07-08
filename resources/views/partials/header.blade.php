<header id="header" class="header fixed-top">
    @php
        $instagram = \App\Models\Content::where('type', 'instagram')->first();
        $facebook = \App\Models\Content::where('type', 'facebook')->first();
        $phone = \App\Models\Content::where('type', 'Phone')->first();
        $email = \App\Models\Content::where('type', 'Email')->first();
    @endphp
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                @isset($email)
                    <i class="bi bi-envelope d-flex align-items-center">
                        <a href="mailto:{{ $email->content }}">{{ $email->content }}</a>
                    </i>
                @else
                    <i class="bi bi-envelope d-flex align-items-center">
                        <a href="#">No Email Available</a>
                    </i>
                @endisset

                @isset($phone)
                    <i class="bi bi-phone d-flex align-items-center ms-4">
                        <span class="mt-3">{!! $phone->content !!}</span>
                    </i>
                @else
                    <i class="bi bi-phone d-flex align-items-center ms-4">
                        <span class="">No Phone Number Available</span>
                    </i>
                @endisset
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                @isset($instagram)
                    <a href="{{ $instagram->content }}" target="_blank" class="instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                @else
                    <a href="#" class="instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                @endisset

                @isset($facebook)
                    <a href="{{ $facebook->content }}" target="_blank" class="facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                @else
                    <a href="#" class="facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                @endisset
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.png" class="w-100 rounded-circle" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="{{ $title == 'Beranda' ? 'active' : '' }}">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="{{ $title == 'Tentang' || $title == 'Aktifitas' ? 'active' : '' }}">
                            <span>Tentang</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="/tentang">Tentang AMA Bandung</a></li>
                            <li><a href="/aktifitas">Aktifitas Kami</a></li>
                        </ul>
                    </li>
                    <li><a href="/artikel" class="{{ $title == 'Artikel' ? 'active' : '' }}">Artikel</a></li>
                    <li class="dropdown">
                        <a href="#"
                            class="{{ $title == 'Acara' || $title == 'Acara Sebelumnya' ? 'active' : '' }}">
                            <span>Acara</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="/acara">Acara Terbaru</a></li>
                            <li><a href="/acara-sebelumnya">Acara Sebelumnya</a></li>
                        </ul>
                    </li>
                    <li><a href="/gallery" class="{{ $title == 'Gallery' ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="/testimoni" class="{{ $title == 'Testimoni' ? 'active' : '' }}">Testimoni</a></li>
                    <li><a href="/kontak" class="{{ $title == 'Kontak' ? 'active' : '' }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>
