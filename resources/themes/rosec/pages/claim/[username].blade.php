<?php

    use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    use App\Models\Review;
    name('wave.claim');

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

    @volt('wave.claim')
    <div>
        <div class="gallery-single pt-lg-3 pt-1 ">
            <div class="container-medium mx-auto mt-5">
                <div class="d-flex flex-wrap">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center fs-7">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-decoration-none">Claim Profile</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/profile/{{$this->user->username}}"
                                    class="text-decoration-none">{{$this->user->username}}</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="gallery-single-start">
                        
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
                                        @foreach($this->user->images as $image)
                                        <div class="splide__slide">
                                            <a class="media-holder single-profile d-block" data-fancybox="gallery"
                                                data-caption="" href="/storage/{{$image}}">
                                                <img src="/storage/{{$image}}" alt="{{$this->user->username}}"
                                                    loading="lazy">
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
                                            <h5 class="m-0">Profile stats:</h5>
                                            <h6 class="m-0 text-small font-bold f500 text-dark-gray-9 mt-1">2 reviews - 2531 visits - 24 bookings
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
                                                    class="fa-star text-small pe-1"></span> {{$this->user->averageRating()}}</h4>
                                            <h6 class="m-0 text-small text-dark-gray-9">{{$this->user->reviews->count()}} Reviews</h6>
                                        </span>
                                    </span>
                                    <div class="d-lg-flex flex-lg-column-reverse flex-lg-wrap">
                                        <span class="cms">
                                        <h4 class="m-0 fs-4 h-fonts mt-3">How it works:</h4>
                                        <ul>
                                            
                                        <li class="my-lg-4 text-dark-gray-9"><span class="font-bold">Make a Payment of Ksh 1,000:</span> Simply complete the one-time payment to officially claim your profile. This payment guarantees your ownership and grants you access to all the amazing features.</li>
                                        <li class="my-lg-4 text-dark-gray-9"><span class="font-bold">Instant Access:</span> After your payment is confirmed, you'll be able to log in and update your profile, set your password, and take full control of your details.</li>
                                        
</ul>

</ul> 

                                        <h4 class="m-0 fs-4 h-fonts mt-3">Why Claiming Your Profile is Worth It</h4>
                                        <ul>
                                            
                                        <li class="my-lg-4 text-dark-gray-9"><span class="font-bold">Full Control:</span> Once your profile is claimed, you'll be able to update your personal information, including profile images, services offered, availability, and more.</li>
                                        <li class="my-lg-4 text-dark-gray-9"><span class="font-bold">Stand Out from the Crowd:</span> With a claimed profile, you get priority visibility, making it easier for potential clients to find you first. The more professional your profile, the better your chances of attracting attention.</li>
                                        <li class="my-lg-4 text-dark-gray-9"><span class="font-bold">Access to Exclusive Features:</span> Once your profile is claimed, you'll be able to update your personal information, including profile images, services offered, availability, and more.</li>
</ul>

</ul> 


<h5 class="m-0  h-fonts mt-3">Questions?</h5>                                            
<p class="my-lg-4 text-dark-gray-9">
                                            



If you have any questions about the process or need assistance, our support team is here to help. Don't hesitate to reach out to us at any time.



                                            </p>

                                            <span class="write-review-btn desktop-view">
                                            <button
                                                class="btn text-md-small f500 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2"
                                                data-bs-toggle="modal" data-bs-target="#reviewpop">Claim this profile</button>
                                        </span>

                                        </span>
                                        
                                        <!-- <div
                                            class="profile-info border my-4 my-lg-0 mt-lg-2 px-2 px-lg-4 py-2 rounded-10 gray-common-border gray-common-bg">
                                            <span class="row">
                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Age</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                        {{$this->user()->profile('age')}}</h6>
                                                </span>

                                                <span class="col-4 col-md-4 col-lg-3 py-2">
                                                    <h4 class="m-0 text-md-small f500">Address</h4>
                                                    <h6 class="m-0 text-small text-dark-gray-9 f500 pt-3">
                                                        {{$this->user()->profile('address')}}</h6>
                                                </span>

                                            </span>
                                        </div> -->
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

                                                <!-- <button
                                            class="d-flex   btn text-md-small f500 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#reviewpop">Book {{$this->user->username}}</button> -->

                                                 
                                                <!--
                                                <a target="_blank" class="d-flex align-items-center text-decoration-none bg-primary text-white rounded-10 call-info
                                        whatapp-bg" href="https://wa.me/254712345678?text=Hey, I’d like to book {{$this->user->username}}. When is she available?"
                                                    aria-label="Click Here to chat/bookonline">
                                                    <span class="fa-whatsapp fs-5"></span>
                                                    <span class="mx-auto">Claim this profile</span>
                                                </a> -->
                                                <!-- <p>
                                                To claim this profile, you need to pay Ksh 1,000. Once the payment is completed, you'll have full access to manage and update your profile details, including your password, photos, and other personal information.
                                                </p> -->
                                                <span class="write-review-btn ">
                                            <a href="https://store.pesapal.com/rosecococlaimprofile?description='profile claim'"
                                                class="btn text-md-small f500 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2"
                                               >Claim this profile</a>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

      


        <div class="modal fade" id="reviewpop" aria-hidden="true" tabindex="-1" >
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
                                    src="/storage/{{$this->user->avatar}}"
                                    loading="lazy" width="76" height="76" alt="Abbie">
                            </span>
                            <iframe width="200" height="40" src="https://store.pesapal.com/embed-code?pageUrl=https://store.pesapal.com/rosecococlaimprofile" frameborder="0" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





    @endvolt
</x-dynamic-component>