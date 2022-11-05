<div class="container mt-4">
    <div class="bg-dark bg-dark-gradient">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-3 g-3">
            <div class="col text-center">
                <h4 class="text-light font-monospace">Follow Us</h4>
                <div>
                    @if (env('FACEBOOK_URL'))
                        <a href="{{ env('FACEBOOK_URL') }}" target="blank"><i
                                class="bi bi-facebook btn btn-dark text-light font-monospace">&nbsp;Facebook</i></a>
                    @endif
                </div>
                <div>
                    @if (env('INSTAGRAM_URL'))
                        <a href="{{ env('INSTAGRAM_URL') }}" target="blank"><i
                                class="bi bi-instagram btn btn-dark text-light font-monospace">&nbsp;Instagram</i></a>
                    @endif
                </div>
                <div>
                    @if (env('TIKTOK_URL'))
                        <a href="{{ env('TIKTOK_URL') }}" target="blank"><i
                                class="bi bi-tiktok btn btn-dark text-light font-monospace">&nbsp;TikTok</i></a>
                    @endif
                </div>
                <div>
                    @if (env('YOUTUBE_URL'))
                        <a href="{{ env('YOUTUBE_URL') }}" target="blank"><i
                                class="bi bi-youtube btn btn-dark text-light font-monospace">&nbsp;Youtube</i></a>
                    @endif
                </div>
            </div>
            <div class="col text-center">
                <h4 class="text-light font-monospace ">Info</h4>
                <div>
                    <a class="text-light btn btn-dark font-monospace"
                        href="{{ route('login') }}">{{ __('Accedi') }}</a>
                </div>
            </div>

            <div class="col text-center">
                <h4 class="text-light font-monospace ">Download App</h4>
                <div class="col">
                    @if (env('APP_STORE_URL'))
                        <a href="{{ env('APP_STORE_URL') }}" target="blank">
                            <i class="bi bi-apple btn btn-dark text-light font-monospace">&nbsp;App Store
                            </i>
                        </a>
                    @endif
                    <br>
                    @if (env('GOOGLE_PLAY_URL'))
                        <a href="{{ env('GOOGLE_PLAY_URL') }}" target="blank"><i
                                class="bi bi-google-play btn btn-dark text-light font-monospace">&nbsp;Google Play</i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
