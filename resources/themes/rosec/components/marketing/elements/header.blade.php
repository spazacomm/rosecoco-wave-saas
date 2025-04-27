<?php

use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    use App\Models\City;
    use App\Models\Category;
    use App\Models\Service;
    name('header');
   

    new class extends Component
    {
       // public $cities;

       #[Computed]
       public function cities()
       {
           return City::all()->groupBy(function($city) {
            return strtoupper($city->name[0]);
        });
       }

       #[Computed]
       public function categories()
       {
           return Category::all()->groupBy(function($city) {
            return strtoupper($city->name[0]);
        });
       }

       #[Computed]
       public function services()
       {
           return Service::all()->groupBy(function($city) {
            return strtoupper($city->name[0]);
        });
       }
    }
?>
@volt('header')
<header class="header header-min">
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
            <div class="header-min-innr position-relative w-100">
                <a class="brand" title="" href="/" aria-label="Rosecoco Escorts Home">
                    <x-logo class=""></x-logo>
                </a>
                <div class="offcanvas offcanvas-start bg-main-bg" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header d-lg-none d-flex justify-content-center flex-column text-center p-3">
                        <button type="button"
                            class="btn-close position-absolute start-0 top-0 mt-3 border-0 bg-main-bg px-3 opacity-100"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <span class="fa-close-small text-white"></span>
                        </button>

                    

                        <a class="brand" title="" href="https://www.rosecoco.co.ke" aria-label="Crush Escorts Home">
                            <x-logo class=""></x-logo>

                        </a>
                        <p class="pt-5">
                            <a href="/auth/login" class="m-3 btn text-md-small f400 text-white bg-dark-primary-7 bg-hover-primary-dark rounded-2">Login </a>  <a href="/auth/register" class="m-3 btn text-md-small f400 text-white bg-dark-primary-7 bg-hover-primary-dark review-btn rounded-2">Create Account </a> 
                        </p>
                        <!-- <h5 class="pt-5"> <a href="/cdn-cgi/l/email-protection#3c55525a537c5f4e494f54594f5f534e484f125f5351" aria-label="Click Here to email us"><span class="__cf_email__" data-cfemail="20494e464f6043525553484553434f5254530e434f4d">[email&#160;protected]</span></a><br/> <a href="tel:07478770704" aria-label="Click Here to call us">07478770704</a></h5> -->
                    </div>
                    <div class="offcanvas-body">
                        <nav class="nav nav-min">
                            <ul class="nav-min-menu">
                                <li>
                                    <a href="/">Featured Escorts</a>
                                </li>
                                <!-- <li><a href="https://www.crushescorts.com/duo-gallery">Duo Gallery</a></li> -->
                                <li class="have-child">
                                    <a href="#">Locations</a>
                                    <div class="child-menu">
                                        <div class="container">
                                            <span class="have-child-Loc d-block d-lg-none">Locations</span>
                                            <div class="row">
                                          
                                                @php
                                                // Determine the number of columns you want
                                                $numColumns = 2;

                                                // Split the groups into chunks for each column
                                                $columns = $this->cities->chunk(ceil(count($this->cities) /
                                                $numColumns));
                                                @endphp

                                                <div class="row">
                                                    @foreach($columns as $column)
                                                    <div class="colm-list colm-xl-7 colm-lg-4">
                                                        @foreach($column as $letter => $group)
                                                        <div class="colm-list-item mb-2">
                                                            <h5 class="text-uppercase d-flex fs-5 text-primary">
                                                                <b>{{ $letter }}</b></h5>
                                                            <ul class="locations">
                                                                @foreach($group as $location)
                                                                <li class="mb-3 mb-lg-1">
                                                                    <a href="{{ url('/locations/' . $location->id) }}"
                                                                        aria-label="{{ $location->name }}"
                                                                        class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $location->name }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="have-child">
                                    <a href="#">Categories</a>
                                    <div class="child-menu">
                                        <div class="container">
                                            <span class="have-child-Loc d-block d-lg-none">Categories</span>
                                            <div class="row">
                                               
                                                @php
                                                // Determine the number of columns you want
                                                $numColumns = 3;

                                                // Split the groups into chunks for each column
                                                $columns = $this->categories->chunk(ceil(count($this->categories) /
                                                $numColumns));
                                                @endphp

                                                <div class="row">
                                                    @foreach($columns as $column)
                                                    <div class="colm-list colm-xl-7 colm-lg-4">
                                                        @foreach($column as $letter => $group)
                                                        <div class="colm-list-item mb-2">
                                                            <h5 class="text-uppercase d-flex fs-5 text-primary">
                                                                <b>{{ $letter }}</b></h5>
                                                            <ul class="locations">
                                                                @foreach($group as $category)
                                                                <li class="mb-3 mb-lg-1">
                                                                    <a href="{{ url('/categories/' . $category->slug) }}"
                                                                        aria-label="{{ $category->name }}"
                                                                        class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $category->name }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="have-child">
                                    <a href="#">Services</a>
                                    <div class="child-menu">
                                        <div class="container">
                                            <span class="have-child-Loc d-block d-lg-none">Services</span>
                                            <div class="row">
                                                

                                                @php
                                                // Determine the number of columns you want
                                                $numColumns = 3;

                                                // Split the groups into chunks for each column
                                                $columns = $this->services->chunk(ceil(count($this->services) /
                                                $numColumns));
                                                @endphp

                                                <div class="row">
                                                    @foreach($columns as $column)
                                                    <div class="colm-list colm-xl-7 colm-lg-4">
                                                        @foreach($column as $letter => $group)
                                                        <div class="colm-list-item mb-2">
                                                            <h5 class="text-uppercase d-flex fs-5 text-primary">
                                                                <b>{{ $letter }}</b></h5>
                                                            <ul class="locations">
                                                                @foreach($group as $service)
                                                                <li class="mb-3 mb-lg-1">
                                                                    <a href="{{ url('/services/' . $service->slug) }}"
                                                                        aria-label="{{ $service->name }}"
                                                                        class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $service->name }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="/recruitment">Work with us</a></li>
                                <li><a href="/faqs">FAQS</a></li>
                                <li><a href="/blog">News</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="d-flex align-items-end flex-column desk-view">
                    <a class="header-min-phone d-flex align-items-center lh-lg btn text-md-small f400 text-white bg-dark-primary-7 bg-hover-dark-primary-7 review-btn rounded-2" href="/dashboard">
                        Login
                    </a>
                    <!-- <a class="header-min-phone d-flex align-items-center lh-lg" href="tel:07478770704">
        <i class="fa-phone-black"></i>
        <span class="f400">07478770704</span>
    </a> -->
                </div>

                

                <button
                    class="text-white text-hover-primary py-3 mx-auto border-0 flex-column d-flex d-lg-none justify-content-center align-items-center text-md-small f400 position-absolute end-0 bg-transparent"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="fa-menu-toggle fs-4 mb-1"></span>
                    <span>Menu</span>
                </button>
            </div>
        </div>
    </nav>
</header> <!-- header End -->
@endvolt