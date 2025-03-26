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

        #[Computed]
        public function previousUser()
        {
            return config('wave.user_model')::where('id', '<', $this->user()->id)
                ->orderBy('id', 'desc')
                ->first();
        }
    
        #[Computed]
        public function nextUser()
        {
            return config('wave.user_model')::where('id', '>', $this->user()->id)
                ->orderBy('id', 'asc')
                ->first();
        }
    }
?>

<x-dynamic-component :component="((auth()->guest()) ? 'layouts.marketing' : 'layouts.marketing')" bodyClass="bg-zinc-50">

    @volt('wave.profile')
    <div>
    <div class="gallery-single pt-lg-3 pt-1 ">
        <div class="container-medium mx-auto mt-5">
            <div class="d-flex flex-wrap">
                <nav aria-label="breadcrumb" class="d-flex justify-content-center fs-7">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-decoration-none">Rosecoco Escorts</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/profile/{{$this->user->username}}" class="text-decoration-none">{{$this->user->username}}</a>
                        </li>
                    </ol>
                </nav>
                <div class="gallery-single-start">
                    <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-4">

                        <span class="d-flex text-small align-items-center position-relative back-btn ">
                        @if($this->previousUser)
                <a class="d-flex flex-wrap align-items-center" href="{{ url('/profile/' . $this->previousUser->username) }}">
                    <span class="fa-back me-2"></span>
                    <span class="d-md-block d-none">PREVIOUS PROFILE</span>
                    <span class="d-md-none">Prev</span>
                </a>
            @endif
                        </span>

                        <a href="/">
                            <img src="https://www.crushescorts.com/frontend/images/home.svg" width="25" height="25"
                                alt="Home icon">
                        </a>





                        <span class="text-small position-relative back-btn next-btn">
                        @if($this->nextUser)
                            <a class="d-flex flex-wrap align-items-center" href="{{ url('/profile/' . $this->nextUser->username) }}">
                                <span class="d-md-block d-none">NEXT PROFILE</span>
                                <span class="d-md-none">Next</span>
                                <span class="fa-back ms-2 mb-1"></span>
                            </a>
                            @endif
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
                                    @foreach($this->user->images as $image)
                                    <div class="splide__slide">
                                        <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                            data-caption=""
                                            href="/storage/{{$image}}">
                                            <img src="/storage/{{$image}}"
                                                alt="{{$this->user->username}}" loading="lazy">
                                        </a>
                                    </div>
                                    @endforeach
                              

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
                                            {{$this->user()->profile('bio');}}

                                        </p>

                                    </span>
                                    <div
                                        class="profile-info border my-4 my-lg-0 mt-lg-2 px-2 px-lg-4 py-2 rounded-10 gray-common-border gray-common-bg">
                                        <span class="row">
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Age</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">{{$this->user()->profile('age')}}</h6>
                                            </span>
                                            <!-- <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Body</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">{{$this->user()->profile('body')}}</h6>
                                            </span> -->
                                            <!-- <span class="col-4 col-md-4 col-lg-3 py-2">
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
                                            </span> -->
                                            <!-- <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Languages</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500">{{$this->user()->profile('languages.value')}}</h6>
                                            </span> -->
                                            <span class="col-4 col-md-4 col-lg-3 py-2">
                                                <h4 class="m-0 text-md-small f500">Address</h4>
                                                <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">{{$this->user()->profile('address')}}</h6>
                                            </span>
                                            <!-- <span class="col-4 col-md-4 col-lg-3 py-2">
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
                                            </span> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div
                                    class="border meeting-tab border-1 p-3 pt-4 pb-0 rounded-10 profile-meeting-tab gray-common-border gray-common-bg">
                                    <!-- <h5 class="text-white f500 border-0 f500 bg-transparent shadow-none px-3">
                                        Meeting rates
                                    </h5> -->
                                    <div class="">
                                        <div class="px-3 mb-4">
                                            <!-- <div class="d-flex mb-1 pb-1">
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
                                            </div> -->

                                            <a href="tel:{{$this->user()->profile('phone_number')}}"
                                                class="d-flex mb-2 mt-4 align-items-center text-decoration-none bg-dark-primary-7 text-white rounded-10 call-info"
                                                aria-label="Click Here to call us">
                                                <span class="fa-phone-black fs-5"></span>
                                                <span class="mx-auto">{{$this->user()->profile('phone_number')}}</span>
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
                                    
                                    @foreach($this->user->categories as $category)
                                    <a href="https://www.crushescorts.com/categories/busty-escorts" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white">{{$category->name}}</a>
                                    @endforeach
                                   
                                 
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
                                @foreach($this->user->services as $service)
                                    <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> {{$service->name}}</span>
                                    @endforeach
                                    <!-- <span class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
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
                                    text-small text-white"> Massage Escorts</span> -->
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
                                @foreach($this->user->towns as $town)
                                    <a href="https://www.crushescorts.com/locations/queensway-escorts" class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
                                    text-small text-white"> {{$town->name}}</a>
                                    @endforeach
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

    <x-marketing.sections.recommended />


    <div class="modal fade " id="reviewpop" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-main-bg">
            <div class="modal-header justify-content-center border-0 pt-4">
                <button type="button" class="position-absolute start-0 border-0 bg-main-bg  px-3" data-bs-dismiss="modal" aria-label="Close"><span class="fa-close-small text-white"></span></button>
                <button type="button" class="position-absolute start-0 border-0 bg-main-bg  px-3 d-lg-none" data-bs-dismiss="modal" aria-label="Close"><span class="fa-back text-white"></span></button>
            </div>
            <div class="modal-body px-5">
                <div class="review-tab pb-2">
                    <span class="text-center d-block">
                        <img class="rounded-circle object-fit-cover" src="https://crushescorts.com/storage/1216/conversions/imagemOOcBX-thumb.webp" loading="lazy" width="76" height="76" alt="Abbie">
                    </span>
                    <form class="form py-3" id="reviews-form">
                        <input type="hidden" name="_token" value="FGd5WYpI675N03XGwAdU5XsTdDr4e6CSJ4PSKp9Z" autocomplete="off">
                        <input type="hidden" name="staff_id" value="132">
                        <div id="message"></div>
                        <div class="ratings-group">
                            <h5 class="mt-3 mb-2 text-start">How was your experience with Abbie?</h5>
                            <span class="user-rating justify-content-end">
                              <input type="radio" name="rating" value="5"><span class="star"></span>
                              <input type="radio" name="rating" value="4"><span class="star"></span>
                              <input type="radio" name="rating" value="3"><span class="star"></span>
                              <input type="radio" name="rating" value="2"><span class="star"></span>
                              <input type="radio" name="rating" value="1" data-gtm-form-interact-field-id="0"><span class="star"></span>
                            </span>
                            <input id="review-rating" name="sel_service" hidden="" value="1">
                        </div>
                        <div class="form-group mb-3 position-relative">
                            <input type="text" name="full_name" class="form-control rounded-10 text-white input__field" placeholder="">
                            <span class="input__label">Your name</span>
                        </div>
                        <div class="form-group mb-3 position-relative">
                            <input type="email" name="email" class="form-control rounded-10 text-white input__field" placeholder="">
                            <span class="input__label">Your Email</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="date" name="review_date" class="form-control rounded-10 form-control-date text-white flatpickr-input active">
                        </div>
                        <div class="form-group mb-3">
                            <h5 class="mt-4 mb-2 text-start">Write a public review</h5>
                            <p class="mb-2 text-start font-small text-white">Be honest, clear and detailed. Include all the good or bad, a future punter should know before booking.</p>
                                <textarea name="message" cols="30" rows="10" class="form-control rounded-10 mt-3 text-white" placeholder="Write a public review"></textarea>
                        </div>
                        <input type="hidden" name="user_review" value="1">
                        <div class="text-center">
                            <button id="reviewSubmit" name="btn_post_review"
                                    class="btn w-100 rounded-10 btn text-md-small f400 text-white bg-primary bg-hover-primary-dark review-btn rounded-2"
                                    type="submit" value="Submit review">Submit review </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


        
<script>
        $(document).ready(function() {

            // Clear the form when the modal is opened
            $('#revieweModal').on('shown.bs.modal', function () {
                $('#reviews-form')[0].reset(); // Reset all form fields
                $('.invalid-feedback').text(''); // Clear validation messages
                $('.form-control').removeClass('is-invalid'); // Remove invalid class
                $('#message').html(''); // Clear any messages
            });


            $("#reviews-form").validate({
                errorClass: "text-danger", // Add the custom error class
                rules: {
                    rating: {
                        required: true,
                    },
                    full_name: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    review_date: {
                        required: true,
                        date: true,
                    },
                    message: {
                        required: true,
                        minlength: 10,
                    },
                },
                messages: {
                    rating: "Please select a rating.",
                    full_name: {
                        required: "Your name is required.",
                        minlength: "Your name must be at least 3 characters.",
                    },
                    email: {
                        required: "Your email is required.",
                        email: "Please enter a valid email address.",
                    },
                    review_date: "Please select a date.",
                    message: {
                        required: "Please write your review.",
                        minlength: "Your review must be at least 10 characters long.",
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "rating") {
                        error.insertAfter(".ratings-group"); // Place error message after the radio group
                    } else {
                        error.insertAfter(element); // Default placement
                    }
                },
                submitHandler: function (form) {
                    // Collect form data
                    let formData = $(form).serialize();

                    // Send AJAX request
                    $.ajax({
                        url: "https://www.crushescorts.com/review/store", // Get the form action URL
                        type: 'POST', // Get the form method
                        data: formData,
                        beforeSend: function () {
                            $("#reviewSubmit").prop("disabled", true).val("Submitting...");
                        },
                        success: function (response) {
                            // Handle success
                            $("#message").html(
                                '<div class="alert alert-success">Your review has been submitted successfully!</div>'
                            );
                            $(form)[0].reset(); // Reset the form
                        },
                        error: function (xhr) {
                            // Handle error
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '<div class="alert alert-danger"><ul>';
                            $.each(errors, function (key, value) {
                                errorHtml += `<li>${value}</li>`;
                            });
                            errorHtml += "</ul></div>";
                            $("#message").html(errorHtml);
                        },
                        complete: function () {
                            $("#reviewSubmit").prop("disabled", false).val("Submit review");
                        },
                    });
                },
            });


            // Existing AJAX form submission code here
            // $('#reviews-form').on('submit', function(event) {
            //     event.preventDefault(); // Prevent the form from submitting via the browser
            //
            //     $.ajax({
            //         url: $(this).attr('action'), // Use the form's action attribute as the URL
            //         method: $(this).attr('method'), // Use the form's method attribute (POST)
            //         data: $(this).serialize(), // Serialize the form data
            //         success: function(response) {
            //             if(response.status === 'success') {
            //                 $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
            //                 $('#reviews-form')[0].reset(); // Reset the form
            //             }
            //         },
            //         error: function(xhr) {
            //             if(xhr.status === 422) { // Validation error
            //                 let errors = xhr.responseJSON.errors;
            //                 $.each(errors, function(key, value) {
            //                     let input = $('[name="' + key + '"]');
            //                     input.addClass('is-invalid');
            //                     input.next('.invalid-feedback').text(value[0]);
            //                 });
            //             } else {
            //                 $('#message').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            //             }
            //         }
            //     });
            // });
        });
    </script>
    
    @endvolt
</x-dynamic-component>


