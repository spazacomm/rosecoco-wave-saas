<?php

    use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    name('wave.profile');

    new class extends Component
    {
        public $username;

        #[Computed]
        public function user()
        {
            return config('wave.user_model')::where('username', '=', $this->username)->with('roles')->firstOrFail();
        }
    }
?>

<x-dynamic-component :component="((auth()->guest()) ? 'layouts.marketing' : 'layouts.marketing')" bodyClass="bg-zinc-50">

    @volt('wave.profile')
    <div>
    <div class="gallery-single pt-lg-3 pt-1">
        <div class="container-medium mx-auto">
            <div class="d-flex flex-wrap">
                <nav aria-label="breadcrumb" class="d-flex justify-content-center fs-7">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-decoration-none">London Escorts</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/profile/{{$this->user->username}}" class="text-decoration-none">{{$this->user->username}}</a>
                        </li>
                    </ol>
                </nav>
                <div class="gallery-single-start">
                    <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-4">

                        <span class="d-flex text-small align-items-center position-relative back-btn ">
                            <a class="d-flex flex-wrap align-items-center"
                                href="https://www.crushescorts.com/escorts/lorenza">
                                <span class="fa-back me-2"></span>
                                <span class="d-md-block d-none">PREVIOUS PROFILE</span>
                                <span class="d-md-none">Prev</span>
                            </a>
                        </span>

                        <a href="https://www.crushescorts.com">
                            <img src="https://www.crushescorts.com/frontend/images/home.svg" width="25" height="25"
                                alt="Home icon">
                        </a>





                        <span class="text-small position-relative back-btn next-btn">
                            <a class="d-flex flex-wrap align-items-center" href="/">
                                <span class="d-md-block d-none">NEXT PROFILE</span>
                                <span class="d-md-none">Next</span>
                                <span class="fa-back ms-2 mb-1"></span>
                            </a>
                        </span>
                    </div>
                    <div class="gallery-single-slider-wrap position-relative">
                        <div
                            class="splide splide-arrow gallery-single-slider top-0 start-0 w-100 position-absolute top-0 left-0">
                            <span
                                class="favourites d-flex justify-content-center align-items-center top-0 end-0 me-3 mt-3 position-absolute bg-white rounded-circle z-2">
                                <i class="fa-heart-f fs-4 save-favourite"></i>
                                <span class="favourites-message">
                                    <span class="text"></span>
                                    <span class="favourites-close"></span>
                                </span>
                            </span>
                            <div class="splide__track">
                                <div class="splide__list">
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="/storage/{{$this->user->avatar}}">
                                            <img src="/storage/{{$this->user->avatar}}"
                                                alt="Kim" loading="eager">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1808/conversions/PHOTO-2024-12-20-19-26-09-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1808/conversions/PHOTO-2024-12-20-19-26-09-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1810/conversions/PHOTO-2024-12-20-19-26-13-large.webp">
                                            <img src="https://crushescorts.com/storage/1810/conversions/PHOTO-2024-12-20-19-26-13-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1811/conversions/PHOTO-2024-12-20-19-26-10-large.webp">
                                            <img src="https://crushescorts.com/storage/1811/conversions/PHOTO-2024-12-20-19-26-10-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1812/conversions/PHOTO-2024-12-20-19-26-13-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1812/conversions/PHOTO-2024-12-20-19-26-13-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1813/conversions/PHOTO-2024-12-20-19-26-12-large.webp">
                                            <img src="https://crushescorts.com/storage/1813/conversions/PHOTO-2024-12-20-19-26-12-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1814/conversions/PHOTO-2024-12-20-19-26-14-large.webp">
                                            <img src="https://crushescorts.com/storage/1814/conversions/PHOTO-2024-12-20-19-26-14-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1815/conversions/PHOTO-2024-12-20-19-26-12-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1815/conversions/PHOTO-2024-12-20-19-26-12-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1816/conversions/PHOTO-2024-12-20-19-26-11-large.webp">
                                            <img src="https://crushescorts.com/storage/1816/conversions/PHOTO-2024-12-20-19-26-11-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1817/conversions/PHOTO-2024-12-20-19-26-10-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1817/conversions/PHOTO-2024-12-20-19-26-10-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1818/conversions/PHOTO-2024-12-20-19-26-08-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1818/conversions/PHOTO-2024-12-20-19-26-08-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1820/conversions/PHOTO-2024-12-20-19-26-08-large.webp">
                                            <img src="https://crushescorts.com/storage/1820/conversions/PHOTO-2024-12-20-19-26-08-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1821/conversions/PHOTO-2024-12-20-19-26-07-large.webp">
                                            <img src="https://crushescorts.com/storage/1821/conversions/PHOTO-2024-12-20-19-26-07-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="https://crushescorts.com/storage/1809/conversions/PHOTO-2024-12-20-19-26-14-2-large.webp">
                                            <img src="https://crushescorts.com/storage/1809/conversions/PHOTO-2024-12-20-19-26-14-2-large.webp"
                                                alt="Kim" loading="lazy">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-single-about ms-auto pe-lg-0 pt-lg-4 mt-2">
                        <div class="row">
                            <div class="col-lg-7">
                                <span
                                    class="d-flex rounded-10 recom-text align-items-center border-bottom border-lg p-3 border-dark-gray-2">
                                    <span class="fa-stars-recommend fs-3 me-3"></span>
                                    <span>
                                        <h5 class="m-0">This is escort is recommended</h5>
                                        <h6 class="m-0 text-small f500 text-dark-gray-9">Popular escort, highly reviewed
                                        </h6>
                                    </span>
                                </span>


                                <span class="d-flex align-items-center justify-content-between py-3">
                                    <span>
                                        <h4 class="m-0 fs-4 h-fonts">{{$this->user->username }}</h4>
                                        <h6 class="m-0 f500 text-small text-dark-gray-9"></h6>
                                    </span>
                                    <span>
                                        <h4 class="m-0 fs-5 d-flex f500 align-items-center"><span
                                                class="fa-star text-small pe-1"></span> 5</h4>
                                        <h6 class="m-0 text-small text-dark-gray-9">2 Reviews</h6>
                                    </span>
                                </span>
                                <div class="d-lg-flex flex-lg-column-reverse flex-lg-wrap">
                                    <span class="cms">
                                        <p class="my-lg-4 text-dark-gray-9">
                                        <p>Kim is the epitome of a cheeky <a
                                                href="https://www.crushescorts.com/categories/european-escorts"
                                                target="_new">European escort</a> beauty with her dazzling brown eyes,
                                            killer curves, and a <a
                                                href="https://www.crushescorts.com/categories/busty-escorts"
                                                target="_new">busty</a> 36D figure that turns heads wherever she goes.
                                            Standing at 5ft4 with a petite dress size 8 frame, she&rsquo;s the perfect
                                            mix of sultry and sweet. Kim has a warm personality to match her looks, with
                                            a playful charm and flirtatious attitude that&rsquo;ll keep you grinning
                                            from ear to ear.</p>

                                        <p>Kim&rsquo;s services are designed to tantalize and tease, with offerings that
                                            include OWO, <a
                                                href="https://www.crushescorts.com/categories/role-play-escorts"
                                                target="_new">roleplay</a>, and 69. Want to spice things up? Kim also
                                            loves to indulge in adventurous options like rimming or a cheeky striptease.
                                            Whether you&rsquo;re after a sensual <a
                                                href="https://www.crushescorts.com/categories/tantric-massage-escorts"
                                                target="_new">massage</a> to unwind or an unforgettable party companion,
                                            she&rsquo;s here to make all your fantasies a reality.</p>

                                        <p>You can find Kim in the vibrant <a
                                                href="https://www.crushescorts.com/locations/queensway-escorts"
                                                target="_new">Queensway</a>, ready to make your day (or night!) for just
                                            &pound;200 an hour. She&rsquo;s the perfect mix of naughty and
                                            sophisticated, making her the ideal choice for an unforgettable experience.
                                            Want to explore more stunning companions? Visit our <a
                                                href="https://www.crushescorts.com/" target="_new">London escort
                                                gallery</a> and browse to your heart&#39;s content!</p>

                                        </p>

                                    </span>
                                    <div
                                        class="profile-info border my-4 my-lg-0 mt-lg-2 px-2 px-lg-4 py-2 rounded-10 gray-common-border gray-common-bg">
                                        <span class="row">
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Age</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">26</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Bust Size</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">36D (natural)</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Eye Colour</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">Brown</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Hair Colour</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">Black</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Height</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">5ft 4in</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Languages</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">English, Spanish</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Location</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">Queensway</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Nationality</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">Eastern European</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Nearest Tube</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">Queensway</h6>
                                            </span>
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Dress Size</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">8</h6>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div
                                    class="border meeting-tab border-1 p-3 pt-4 pb-0 rounded-10 profile-meeting-tab gray-common-border gray-common-bg">
                                    <h5 class="text-white f500 border-0 f500 bg-transparent shadow-none px-3">
                                        Meeting rates
                                    </h5>
                                    <div class="">
                                        <div class="px-3 mb-4">
                                            <div class="d-flex mb-1 pb-1">
                                                <div class="col-4 col-xl-6"></div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-dark-gray-7">Incall
                                                </div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-dark-gray-7">Outcall
                                                </div>
                                            </div>
                                            <div class="d-flex py-2 border-bottom gray-common-border">
                                                <div
                                                    class="col-4 col-xl-6 text-md-small f500 text-white text-uppercase">
                                                    1 Hour</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£200</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£250</div>
                                            </div>

                                            <div class="d-flex py-2 border-bottom gray-common-border">
                                                <div
                                                    class="col-4 col-xl-6 text-md-small f500 text-white text-uppercase">
                                                    90 Mins</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£350</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£450</div>
                                            </div>

                                            <div class="d-flex py-2 border-bottom gray-common-border">
                                                <div
                                                    class="col-4 col-xl-6 text-md-small f500 text-white text-uppercase">
                                                    2 Hours</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£400</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£500</div>
                                            </div>

                                            <div class="d-flex py-2 border-bottom gray-common-border">
                                                <div
                                                    class="col-4 col-xl-6 text-md-small f500 text-white text-uppercase">
                                                    3 Hours</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£600</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£750</div>
                                            </div>

                                            <div class="d-flex py-2 border-bottom gray-common-border">
                                                <div
                                                    class="col-4 col-xl-6 text-md-small f500 text-white text-uppercase">
                                                    Dinner</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£600</div>
                                                <div class="col-4 col-xl-3 text-md-small f500 text-white">£750</div>
                                            </div>

                                            <a href="tel:+07478770704"
                                                class="d-flex mb-2 mt-4 align-items-center text-decoration-none bg-dark-primary-7 text-white rounded-10 call-info"
                                                aria-label="Click Here to call us">
                                                <span class="fa-phone-black fs-5"></span>
                                                <span class="mx-auto">{{$this->user->phone_number}}</span>
                                            </a>
                                            <a target="_blank" class="d-flex align-items-center text-decoration-none bg-primary text-white rounded-10 call-info
                                        whatapp-bg"
                                                href="https://wa.me/{{$this->user->whatsapp_number}}?text=Hey, I’d like to book Kim. When is she available?"
                                                aria-label="Click Here to chat/bookonline">
                                                <span class="fa-whatsapp fs-5"></span>
                                                <span class="mx-auto">Chat with us on WhatsApp</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="divider mx-auto border-top border-dark-gray-1 my-5 d-md-block d-none w-100">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="fonts-sub fs-4 f300 text-black-2 mb-3 f500">Listed in</div>
                                <div class="d-flex flex-wrap align-content-start grid gap-2">
                                    
                                    
                                    <a href="https://www.crushescorts.com/categories/busty-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"></a>
                                   
                                    <a href="https://www.crushescorts.com/categories/brunette-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">Brunette Escorts</a>
                                    <a href="https://www.crushescorts.com/categories/high-class-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">High Class Escorts</a>
                                    <a href="https://www.crushescorts.com/categories/european-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">European Escorts</a>
                                    <a href="https://www.crushescorts.com/categories/curvy-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">Curvy Escorts</a>
                                    <a href="https://www.crushescorts.com/categories/petite-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">Petite Escorts</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-md-0 pt-2">
                                <div class="divider mx-auto border-top border-dark-gray-1 my-md-5 mt-4 mb-3 w-100">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="fonts-sub fs-4 f300 text-black-2 mb-3 f500">Services Provided</div>
                                <div class="d-flex flex-wrap align-content-start grid gap-2">
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> OWO Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Role Play Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> 69 Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Rimming Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Watersports Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Striptease Escorts</span>
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Massage Escorts</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-md-0 pt-2">
                                <div class="divider mx-auto border-top border-dark-gray-1 my-md-5 mt-4 mb-3  w-100">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="fonts-sub fs-4 f300 text-black-2 mb-3 f500">Locations</div>
                                <div class="d-flex flex-wrap align-content-start grid gap-2">
                                    <a href="https://www.crushescorts.com/locations/queensway-escorts" class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> Queensway Escorts</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 pt-md-0 pt-2">
                                <div class="divider mx-auto border-top border-dark-gray-1 my-md-5 mt-4 w-100"></div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 position-relative mt-4 mt-lg-0">
                                <span class="d-flex align-items-center justify-content-between">
                                    <span>
                                        <h4 class="m-0 fs-4 f500">Reviews</h4>
                                    </span>
                                    <span class="write-review-btn desktop-view">
                                        <button
                                            class="btn text-md-small f500 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#reviewpop">Write a review</button>
                                    </span>
                                </span>
                                <span
                                    class="d-flex align-items-center justify-content-between rounded-2 border gray-common-border mt-3 mt-lg-4 py-4 px-3 px-lg-5">
                                    <span class="text-center">
                                        <h4 class="mb-2 fs-4">5</h4>
                                        <span class="d-flex">
                                            <span class="fa-star me-1"></span>
                                            <span class="fa-star me-1"></span>
                                            <span class="fa-star me-1"></span>
                                            <span class="fa-star me-1"></span>
                                            <span class="fa-star me-1"></span>
                                            <!-- Loop for empty stars -->

                                        </span>
                                    </span>
                                    <span class="text-center">
                                        <h4 class="mb-2 fs-2"><span class="fa-stars-recommend"></span></h4>
                                        <h3 class="m-0 fs-5 text-white fs-md-down-6">Highly Reviewed</h3>
                                    </span>
                                    <span class="text-center" data-bs-toggle="modal" data-bs-target="#ratingpop">
                                        <h4 class="mb-2 fs-5">2</h4>
                                        <h3 class="m-0 fs-5 fs-md-down-6">Reviews</h3>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="splide review_tab mt-4 mt-lg-5">
                                    <div class="splide__track">
                                        <div class="splide__list">

                                            <div class="splide__slide">
                                                <div
                                                    class="py-4 py-3 border p-3 pt-4 rounded-10 gray-common-border gray-common-bg review_tab-col">
                                                    <span class="d-flex pb-2">


                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>

                                                        <!-- Loop for empty stars -->
                                                    </span>
                                                    <p class="text-dark-gray-9 f300 mt-2 mb-2">
                                                        Kim is the type of girl who knows exactly what she’s doing. The
                                                        way she moved had me sweating like I’d just run a marathon.
                                                        Those lips? Absolute magic. I’ll be back.
                                                    </p>




                                                </div>
                                            </div>
                                            <div class="splide__slide">
                                                <div
                                                    class="py-4 py-3 border p-3 pt-4 rounded-10 gray-common-border gray-common-bg review_tab-col">
                                                    <span class="d-flex pb-2">


                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>
                                                        <span class="fa fa-star text-lg-small me-1"></span>

                                                        <!-- Loop for empty stars -->
                                                    </span>
                                                    <p class="text-dark-gray-9 f300 mt-2 mb-2">
                                                        Kim had me hooked the moment I walked in. She’s got curves for
                                                        days and knows how to use them. That cheeky grin while she took
                                                        charge? Unreal.
                                                    </p>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="write-review-btn d-lg-none">
                                    <button
                                        class="btn text-md-small f400 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2"
                                        data-bs-toggle="modal" data-bs-target="#reviewpop">Write a review</button>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="divider mx-auto border-top border-dark-gray-1 my-5 d-md-block d-none w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="similar-staff container-medium mx-auto">
        <h4>Similar profiles</h4>
        <div class="row">
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/mira">
                        <div class=" staff-gallery">
                            <img class="fw fh" src="https://crushescorts.com/storage/1689/conversions/a8-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/mira">Mira</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£250</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/maya">
                        <div class=" staff-gallery">
                            <img class="fw fh"
                                src="https://crushescorts.com/storage/537/conversions/image0FykYv-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/maya">Maya</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£200</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/kate">
                        <div class=" staff-gallery">
                            <img class="fw fh"
                                src="https://crushescorts.com/storage/1367/conversions/imageXTp6N8-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/kate">Kate</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£500</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">2.5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/sonia">
                        <div class=" staff-gallery">
                            <img class="fw fh" src="https://crushescorts.com/storage/1738/conversions/sonia6-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/sonia">Sonia</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£150</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/jasmine">
                        <div class=" staff-gallery">
                            <img class="fw fh"
                                src="https://crushescorts.com/storage/1598/conversions/image83Ucpx-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/jasmine">Jasmine</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£180</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="https://www.crushescorts.com/escorts/barbara">
                        <div class=" staff-gallery">
                            <img class="fw fh" src="https://crushescorts.com/storage/1687/conversions/blob-thumb.webp"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="https://www.crushescorts.com/escorts/barbara">Barbara</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"></span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">£300</span>
                    <span
                        class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                        <i class="fa-star me-md-1"></i>
                        <span class="favourites-message">
                            <span class="text">2.5</span>
                            <span class="favourites-close"></span>
                        </span>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
    @endvolt
</x-dynamic-component>
