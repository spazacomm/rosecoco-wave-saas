@filamentScripts
@livewireScripts

@if(config('wave.dev_bar'))
    @include('theme::partials.dev_bar')
@endif

{{-- @yield('javascript') --}}

@if(setting('site.google_analytics_tracking_id', ''))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ setting("site.google_analytics_tracking_id") }}');
    </script>
@endif

<!-- Additional Scripts -->
<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script defer src="/js/crush/bootstrap.bundle.js" crossorigin="anonymous"></script>
<script defer src="/js/crush/splide.min.js"></script>
<script defer src="/js/crush/fancybox.umd.js"></script>
<script defer src="/js/crush/flatpickr.min.js"></script>
<script defer src="/js/crush/app.js"></script>

<!-- Additional Styles -->
<link rel="stylesheet" href="/css/crush/fancybox.css">
<link rel="stylesheet" href="/css/crush/fonts.min.css">
<link rel="stylesheet" href="/css/crush/zuck.min.css">
<link rel="stylesheet" href="/css/crush/snapgram.min.css">

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5HR5P2FB" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<!-- Register the Service Worker -->
<!-- <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js').then(function(registration) {
            console.log('Service Worker registered with scope:', registration.scope);
        }).catch(function(error) {
            console.log('Service Worker registration failed:', error);
        });
    }
</script> -->

<!-- Setup CSRF Token for AJAX Requests -->
<script>
    $(document).ready(function() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': csrfToken }
        });
    });
</script>

<!-- Booking & Filtering AJAX -->
<script>
    $(document).ready(function() {
        $('.filter-booking-type, .filter-rate').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('bg-primary');

            let type = $(this).data('type');
            let prices = [];
            $('.filter-rate.bg-primary').each(function() {
                prices.push($(this).data('price'));
            });

            $.ajax({
                url: 'https://www.crushescorts.com/filter-staff-gallery',
                method: 'POST',
                data: { prices: prices },
                success: function(response) {
                    $('#profile-gallery').html(response.html);
                    $('.splide').each(function() {
                        new Splide(this, { type: 'loop', perPage: 1, autoplay: true, pagination: false, arrows: true }).mount();
                    });
                    $('.totalProfileCount').text(response.count + ' Live Profiles');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('input[name="sortby"], input[name="colour"], input[name="nationality"]').on('change', function() {
            var filters = {
                sortby: $('input[name="sortby"]:checked').val(),
                colour: $('input[name="colour[]"]:checked').map(function() { return this.value; }).get(),
                nationality: $('input[name="nationality[]"]:checked').map(function() { return this.value; }).get(),
            };

            $.ajax({
                url: 'https://www.crushescorts.com/filter-staff-gallery',
                method: 'POST',
                data: filters,
                success: function(response) {
                    $('#profile-gallery').html(response.html);
                    $('.splide').each(function() {
                        new Splide(this, { type: 'loop', perPage: 1, autoplay: true, pagination: false, arrows: true }).mount();
                    });
                    $('.totalProfileCount').text(response.count + ' Live Profiles');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.clear_filter').on('click', function() {
            $('.filter-rate').removeClass('bg-primary');
            $('input[name="sortby"], input[name="colour[]"], input[name="nationality[]"]').prop('checked', false);

            $.ajax({
                url: 'https://www.crushescorts.com/filter-staff-gallery',
                method: 'POST',
                data: { prices: [] },
                success: function(response) {
                    $('#profile-gallery').html(response.html);
                    $('.splide').each(function() {
                        new Splide(this, { type: 'loop', perPage: 1, autoplay: true, pagination: false, arrows: true }).mount();
                    });
                    $('.totalProfileCount').text(response.count + ' Live Profiles');
                },
                error(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<!-- Zuck Stories -->
<script defer src="/js/crush/zuck.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "https://www.crushescorts.com/stories",
            type: 'GET',
            cache: true,
            success: function (data) {
                if (data.length !== 0) {
                    $('.gallery-story-wrap').removeClass('d-none');
                    var stories = window.Zuck('#stories', {
                        backNative: true,
                        previousTap: true,
                        skin: 'Snapgram',
                        avatars: true,
                        list: false,
                        autoFullScreen: false,
                        cubeEffect: true,
                        paginationArrows: false,
                        localStorage: true,
                        stories: data
                    });
                } else {
                    $('.gallery-story-wrap').addClass('d-none');
                }
            },
            error: function (xhr) {
                console.error('Error fetching stories:', xhr.responseText);
            }
        });
    });
</script>

<!-- Preload Banner Image -->
<script>
    ((doc) => {
        if (window.innerWidth > 768) {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.href = 'https://www.crushescorts.com/frontend/images/banner-d.webp';
            link.as = 'image';
            document.head.appendChild(link);
        }
    })(document);
</script>
