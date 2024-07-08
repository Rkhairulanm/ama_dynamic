<footer id="footer" class="footer dark-background">
    @php
        $instagram = \App\Models\Content::where('type', 'instagram')->first();
        $facebook = \App\Models\Content::where('type', 'facebook')->first();
        $phone = \App\Models\Content::where('type', 'Phone')->first();
        $email = \App\Models\Content::where('type', 'Email')->first();
        $location = \App\Models\Content::where('type', 'Location')->first();
        $locationform = \App\Models\Lokasi::all();
    @endphp
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Facebook</h4>
                    <hr>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAMA-Bandung-1978984022338334%2F%3Ffref%3Dts&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                        width="100%" height="470" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowtransparency="true"></iframe>
                </div>

                <div class="col-lg-4 col-md-6 footer-about">
                    <h4>Kontak</h4>
                    <hr>
                    <div class="footer-contact pt-3">
                        <div class="d-flex">
                            <p class="me-3"><strong>Lokasi </strong></p>
                            <p>
                                @isset($location)
                                    {!! $location->content !!}
                                @else
                                    Lokasi tidak tersedia
                                @endisset
                            </p>
                        </div>
                        <div class="d-flex">
                            <p class="me-3"><strong>Phone </strong></p>
                            <p>
                                @isset($phone)
                                    {!! $phone->content !!}
                                @else
                                    Nomor telepon tidak tersedia
                                @endisset
                            </p>
                        </div>
                        <div class="d-flex">
                            <p class="me-3"><strong>Email ‎ </strong></p>
                            <p>
                                @isset($email)
                                    {!! $email->content !!}
                                @else
                                    Email tidak tersedia
                                @endisset
                            </p>
                        </div>
                    </div>
                    <div class="social-links d-flex mt-4">
                        @isset($facebook)
                            <a href="{{ $facebook->content }}" target="_blank"><i class="bi bi-facebook"></i></a>
                        @else
                            <a href="#"><i class="bi bi-facebook"></i></a>
                        @endisset

                        @isset($instagram)
                            <a href="{{ $instagram->content }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        @else
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        @endisset
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Berlangganan</h4>
                    <hr>
                    <p>Dengan berlangganan Anda akan mendapatkan laporan motivasi</p>
                    @if (Session::has('status'))
                        <div class="alert alert-success text-secondary" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="/subs-send" method="post" class="php-email-form">
                        @csrf
                        <div class="row g-3 newsletter-form">
                            <div class="col-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-12">
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <select class="form-select" id="lokasi_id" name="lokasi_id" required>
                                    <option value="" disabled selected>Select Location</option>
                                    @forelse ($locationform as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="" disabled>No locations available</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn custom-btn w-100">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container text-center">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">AMA Bandung</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by Rkhairulanm
            </div>
        </div>
    </div>
</footer>
