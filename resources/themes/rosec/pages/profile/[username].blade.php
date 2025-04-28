<?php

    use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    use App\Models\Review;
    name('wave.profile');

    new class extends Component
    {
        public $username;

        public $name;
    public $email;
    public $phone;
    public $booking_date;
    public $review;
    public $rating;

        #[Computed]
        public function user()
        {
            return config('wave.user_model')::where('username', '=', $this->username)->with('roles')->firstOrFail();
        }

        #[Computed]
        public function previousUser()
        {
            return config('wave.user_model')::where('id', '<', $this->user()->id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
                ->orderBy('id', 'desc')
                ->first();
        }
    
        #[Computed]
        public function nextUser()
        {
            return config('wave.user_model')::where('id', '>', $this->user()->id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
                ->orderBy('id', 'asc')
                ->first();
        }

        public function submitReview()
        {
            $this->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string',
                'booking_date' => 'required|date',
                'review' => 'required|string|min:10',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            Review::create([
                'user_id' => $this->user()->id,
                'name' => $this->name,
                'phone' => $this->phone,
                'booking_date' => $this->booking_date,
                'review' => $this->review,
                'rating' => $this->rating,
            ]);

            session()->flash('message', 'Review submitted successfully.');
            $this->reset(['name', 'phone', 'booking_date', 'review', 'rating']);
        }
    }
?>

<x-dynamic-component :component="((auth()->guest()) ? 'layouts.marketing' : 'layouts.marketing')"
    bodyClass="bg-zinc-50">

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
                                <a href="/profile/{{$this->user->username}}"
                                    class="text-decoration-none">{{$this->user->username}}</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="gallery-single-start">
                        <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-4">

                            <span class="d-flex text-small align-items-center position-relative back-btn ">
                                @if($this->previousUser)
                                <a class="d-flex flex-wrap align-items-center"
                                    href="{{ url('/profile/' . $this->previousUser->username) }}">
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
                                <a class="d-flex flex-wrap align-items-center"
                                    href="{{ url('/profile/' . $this->nextUser->username) }}">
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
                                                data-caption="" href="/storage/{{$this->user->avatar}}">
                                                <img src="/storage/{{$this->user->avatar}}" alt="Kim" loading="eager">
                                            </a>
                                        </div>

                                        @if(is_array($this->user->images) && count($this->user->images) > 0)
                                        @foreach($this->user->images as $image)
                                        <div class="splide__slide">
                                            <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                                data-caption="" href="/storage/{{$image}}">
                                                <img src="/storage/{{$image}}" alt="{{$this->user->username}}"
                                                    loading="lazy">
                                            </a>
                                        </div>
                                        @endforeach
                                        @endif




                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-single-about ms-auto pe-lg-0 pt-lg-4 mt-2">


                            <div class="row">
                                <div class="col-lg-7">

                                    <span
                                        class="d-flex rounded-10 recom-text align-items-center border-bottom border-lg p-3 border-dark-gray-2 justify-content-between flex-wrap">

                                        @if($this->user->is_claimed)
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <span class="fa-stars-recommend fs-3 me-3"></span>
                                            <div>
                                                <h5 class="m-0">This escort is recommended</h5>
                                                <h6 class="m-0 text-small f500 text-dark-gray-9">Popular escort and highly
                                                    rated</h6>
                                            </div>
                                        </div>

                                        @else

                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <span class="fa-stars-recommend fs-3 me-3"></span>
                                            <div>
                                                <h5 class="m-0">This profile has not been officially claimed</h5>
                                                <h6 class="m-0 text-small f500 text-dark-gray-9">Popular and highly
                                                    rated. Awaiting official verification</h6>
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <a target="_blank"
                                                class="text-decoration-none bg-dark-primary-7 text-white rounded-10 px-3 py-2 small"
                                                href="https://wa.me/+254794535789?text=Hey, I’d like to claim this profile: https://rosecoco.co.ke/profile/{{$this->user->username}}"
                                                aria-label="Click Here to chat/book online">
                                                Claim this profile
                                            </a>

                                            <a target="_blank"
                                                class="text-decoration-none bg-dark-primary-7 text-white rounded-10 px-3 py-2 small"
                                                href="https://wa.me/+254794535789?text=Hey, I’d like to report this profile: https://rosecoco.co.ke/profile/{{$this->user->username}}"
                                                aria-label="Click Here to chat/report online">
                                                Report profile
                                            </a>
                                        </div>
                                        @endif

                                    </span>
                                    <span class="d-flex align-items-center justify-content-between py-3">
                                        <span>
                                            <h4 class="m-0 fs-4 h-fonts">{{$this->user->username}}</h4>
                                            <h6 class="m-0 f500 text-small text-dark-gray-9"></h6>
                                        </span>
                                        <!-- <span>
                                            <h4 class="m-0 fs-5 d-flex f500 align-items-center"><span
                                                    class="fa-star text-small pe-1"></span> </h4>
                                            <h6 class="m-0 text-small text-dark-gray-9">0 Reviews</h6>
                                        </span> -->
                                    </span>

                                    <div class="d-lg-flex flex-lg-column-reverse flex-lg-wrap">
                                        <span class="cms">
                                            <p class="my-lg-4 text-dark-gray-9">
                                                {{$this->user->bio}}

                                            </p>

                                        </span>
                                        <div
                                            class="profile-info border my-4 my-lg-0 mt-lg-2 px-2 px-lg-4 py-2 rounded-10 gray-common-border gray-common-bg">
                                            <span class="row">
                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Age</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{ \Carbon\Carbon::parse($this->user->dob)->age }}</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Gender</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->gender}}</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Orientation</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->orientation}}</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Body Type</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->body_type}}</h6>
                                                </span>

                                            </span>
                                            <span class="row mt-3">
                                                <span class="col-8 col-md-4 col-lg-6 py-2">
                                                    <h4 class="m-0 text-md-small f500">Languages</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->languages}}</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">nationality</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->nationality}}</h6>
                                                </span>
                                            </span>
                                            <span class="row mt-3">

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Outcall</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{ $this->user->outcall ? 'Yes' : 'No' }}
</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Incall</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{ $this->user->incall ? 'Yes' : 'No' }}
</h6>
                                                </span>

                                                
                                                <!--[if BLOCK]><![endif]-->                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Incall Address</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                    {{$this->user->address}}</h6>
                                                </span>
                                                <!--[if ENDBLOCK]><![endif]-->

                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-5">
                                    <div
                                        class="border  border-1 p-3 pt-4 pb-3 rounded-10 profile-meeting-tab gray-common-border gray-common-bg">
                                        
                                        <div class="">
                                            <div class="px-3 mb-4">
                                               @if($this->user->is_claimed)

                                               <a href="tel:+{{$this->user->phone_number}}"
                                                    class="d-flex mb-2 mt-4 align-items-center text-decoration-none bg-dark-primary-7 text-white rounded-10 call-info"
                                                    aria-label="Click Here to call us">
                                                    <span class="fa-phone-black fs-5"></span>
                                                    <span class="mx-auto">{{$this->user->phone_number}}</span>
                                                </a>
                                                <a target="_blank" class="d-flex align-items-center text-decoration-none bg-primary text-white rounded-10 call-info
                                        whatapp-bg" href="https://wa.me/+{{$this->user->phone_number}}?text=Hey, I found your profile on rosecoco.co.ke. When are you available?"
                                                    aria-label="Click Here to chat/bookonline">
                                                    <span class="fa-whatsapp fs-5"></span>
                                                    <span class="mx-auto">Chat on WhatsApp</span>
                                                </a>

                                               @else

                                               <a target="_blank" class="d-flex align-items-center text-decoration-none bg-primary text-white rounded-10 call-info
                                        whatapp-bg" href="https://wa.me/+254794535789?text=Hey, I’d like to book {{$this->user->username}} (https://rosecoco.co.ke/profile/{{$this->user->username}}). When is she available?"
                                                    aria-label="Click Here to chat/bookonline">
                                                    <span class="fa-whatsapp fs-5"></span>
                                                    <span class="mx-auto">Chat on WhatsApp</span>
                                                </a>

                                               @endif

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div
                                        class="divider mx-auto border-top border-dark-gray-1 my-5 d-md-block d-none w-100">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="fonts-sub fs-4 f300 text-black-2 mb-3 f500">Listed in</div>
                                    <div class="d-flex flex-wrap align-content-start grid gap-2">

                                        @foreach($this->user->categories as $category)
                                        <a href="/categories/{{$category->id}}" class="border gray-common-bg border-dark-gray-5 rounded py-2 px-3
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
                                        <a href="/locations/{{$town->id}}" class="border gray-common-bg bg-hover-primary border-dark-gray-5 rounded py-2 px-3
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
                                                data-bs-toggle="modal" data-bs-target="#reviewpop">Write a
                                                review</button>
                                        </span>
                                    </span>
                                    <span
                                        class="d-flex align-items-center justify-content-between rounded-2 border gray-common-border mt-3 mt-lg-4 py-4 px-3 px-lg-5">
                                        <span class="text-center">
                                            <h4 class="mb-2 fs-4">{{$this->user->averageRating()}}</h4>
                                            <span class="d-flex">
                                                @for($i = 1; $i <= $this->user->reviews->count(); $i++)
                                                    <span class="fa-star me-1"></span>
                                                    @endfor

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
                                                @foreach($this->user->reviews as $review)
                                                <div class="splide__slide">
                                                    <div
                                                        class="py-4 py-3 border p-3 pt-4 rounded-10 gray-common-border gray-common-bg review_tab-col">
                                                        <span class="d-flex pb-2">

                                                            @for($i = 1; $i <= $review->rating; $i++)
                                                                <span class="fa fa-star text-lg-small me-1"></span>
                                                                @endfor

                                                        </span>
                                                        <p class="text-dark-gray-9 f300 mt-2 mb-2">
                                                            {{$review->review}}
                                                        </p>
                                                        <p class="text-dark-gray-9 f300 mt-2 mb-2">
                                                            - {{$review->name}}
                                                        </p>




                                                    </div>
                                                </div>
                                                @endforeach

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
                                    <div
                                        class="divider mx-auto border-top border-dark-gray-1 my-5 d-md-block d-none w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <x-marketing.sections.recommended />


        <div class="modal fade" id="reviewpop" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-main-bg">
                    <div class="modal-header justify-content-center border-0 pt-4">
                        <button type="button" class="position-absolute start-0 border-0 bg-main-bg px-3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span class="fa-close-small text-white"></span>
                        </button>
                    </div>

                    <div class="modal-body px-5">
                        <div class="review-tab pb-2">
                            <span class="text-center d-block">
                                <img class="rounded-circle object-fit-cover"
                                    src="https://crushescorts.com/storage/1216/conversions/imagemOOcBX-thumb.webp"
                                    loading="lazy" width="76" height="76" alt="Abbie">
                            </span>

                            <form wire:submit.prevent="submitReview" class="form py-3">
                                <div id="message">
                                    @if(session()->has('message'))
                                    <p class="text-success">{{ session('message') }}</p>
                                    @endif
                                </div>

                                <!-- Rating -->
                                <div class="ratings-group">
                                    <h5 class="mt-3 mb-2 text-start">How was your experience?</h5>
                                    <span class="user-rating justify-content-end">
                                        @foreach(range(5, 1) as $star)
                                        <input type="radio" wire:model="rating" value="{{ $star }}">
                                        <span class="star"></span>
                                        @endforeach
                                    </span>
                                </div>

                                <!-- Name -->
                                <div class="form-group mb-3 position-relative">
                                    <h5 class="mt-4 mb-2 text-start">Your Name</h5>
                                    <input type="text" wire:model="name"
                                        class="form-control rounded-10 bg-transparent text-white placeholder-white focus:text-black input__field"
                                        placeholder="">
                                    <!-- <span class="input__label">Your name</span> -->
                                </div>



                                <!-- Email -->
                                <!-- <div class="form-group mb-3 position-relative">
                            <input type="email" wire:model="email" class="form-control rounded-10 text-white input__field" placeholder="Your Email">
                        </div> -->

                                <!-- Phone -->
                                <div class="form-group mb-3 position-relative">
                                    <h5 class="mt-4 mb-2 text-start">Phone Number</h5>
                                    <input type="text" wire:model="phone"
                                        class="form-control rounded-10 bg-transparent text-white placeholder-white focus:text-black input__field"
                                        placeholder="">
                                    <!-- <span class="input__label">Your Phone</span> -->
                                </div>

                                <!-- Booking Date -->
                                <div class="form-group mb-3">
                                    <h5 class="mt-4 mb-2 text-start">Booking Date</h5>
                                    <input type="date" wire:model="booking_date" placeholder="Booking Date"
                                        class="form-control rounded-10 form-control-date bg-transparent text-white placeholder-white focus:text-black">
                                    <!-- <span class="input__label">Booking date</span> -->
                                </div>

                                <!-- Review -->
                                <div class="form-group mb-3">
                                    <h5 class="mt-4 mb-2 text-start">Write a public review</h5>
                                    <textarea wire:model="review"
                                        class="form-control rounded-10 mt-3 bg-transparent text-white placeholder-white focus:text-black"
                                        placeholder="Write your review here..."></textarea>
                                </div>

                                <div class="text-center">
                                    <button id="reviewSubmit"
                                        class="btn w-100 rounded-10 btn text-md-small f400 text-white bg-primary review-btn rounded-2"
                                        type="submit">
                                        Submit review
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





    @endvolt
</x-dynamic-component>