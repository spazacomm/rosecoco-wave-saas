
<?php

    use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    use App\Models\City;
    use App\Models\Category;
    name('category_banner');
   

    new class extends Component
    {
       // public $cities;

        public  $banner_title;
        public  $banner_description;

        public function mount($title = 'Rosecoco Escorts', $description = 'Looking for escorts near you? We have a wide range of local escorts available 24/7 for incall and outcall escort services. Browse our full selection to find the perfect escort. Each escort offers a selection of services they specialise in and enjoy providing, including kinks, fetishes, dates and experiences. To book, simply find an escort who matches your desires, then give them a call.')
        {
            $this->banner_title = $title;
            $this->banner_description = $description;
        }


       #[Computed]
       public function categories()
       {
           return Category::all();
       }
    }
?>
@volt('category_banner')
<div class="container-fluid px-0 mb-5 media-holder media-holder-overlay">


    <div class="banner banner-home position-relative">
        <link rel="preload" href="https://www.crushescorts.com/frontend/images/banner-m.webp" as="image">
        <picture class="hero hero-main position-absolute w-100 h-100 start-0">
            <source media="(min-width: 768px)" srcset="https://www.crushescorts.com/frontend/images/banner-d.webp">
            <img src="https://www.crushescorts.com/frontend/images/banner-m.webp" loading="eager" alt="Banner Image">
        </picture>
        <div class="banner-bottom mb-b-bottom z-2 position-relative pb-3">

        </div>
        <div class="pt-lg-3 position-relative z-2 hero-text  ">
            <div class="container pt-lg-5">
                <div class="row m-0 pt-lg-5">
                    <div class="col-lg-12 col-md-12 px-0 mt-5">
                        <h1>{{$banner_title}}</h1>
                        <div class="cms pt-3">
                            <p>Discover the best <strong>{{$banner_title}}</strong> tailored to your preferences. We offer a curated selection of verified listings to ensure quality, safety, and discretion. Whether you're seeking companionship, professional services, or a unique experience, our platform makes it easy to find exactly what you need. Browse through our listings by country, city, or region and connect with trusted providers today. Your perfect experience is just a click away</p>
                            <!-- <p>Explore the finest {{$banner_title}} available near you. Our verified listings ensure quality, discretion, and a seamless experience. Browse now and find exactly what you’re looking for!</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-3 mt-lg-2 mb-lg-3">
                <div class="d-flex  gallery-story-wrap position-relative align-items-center d-none">
                    <h5>Latest Stories</h5>

                    <div id="stories" class="pb-0"></div>
                </div>
            </div>
        </div>
        <div class="tag-menu box-shadow d-flex mb-3 pb-2 z-1 position-relative align-items-center mb-view">
            <div class="container">
                <div class="row m-0 mb-1">
                    <span class="d-flex gap gap-2 sub-menu-wrap position-relative align-items-center">
                        @foreach($this->categories as $category)
                        <a class="py-2 px-3 text-white text-small text-nowrap border border-dark-gray-5 rounded-pill"
                            href="/categories/{{$category->id}}">{{$category->name}} </a>
                        @endforeach
                       
                    </span>
                    <!-- <a href="/locations"
                        class="position-absolute sm-fixed d-flex align-items-center text-center border border-dark-gray-5 rounded-circle top-0 text-lg-small">+14
                        more</a> -->
                </div>
            </div>
        </div>


    </div>

    <!-- <div class="banner-bottom desktop-view z-2 position-relative pb-3 mb-1 mb-lg-4">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between position-relative z-1">
                        <p class="text-white mb-0 totalProfileCount">67 Live Profiles</p>
                        <div class="filter-menu desk-view">
                            <button class="text-white rounded-3" data-bs-toggle="modal" data-bs-target="#filtermodal"
                                aria-label="Filter">
                                <span class="f500">Filters</span> <i class="fa-filter"></i>
                            </button>
                        </div>
                        <div class="filter-menu d-lg-none">
                            <button class="text-white btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#filtermodal" aria-label="Filter">
                                <i class="fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal -->
    <div class="modal fade filter-caoffcanvas offcanvas-filter" id="filtermodal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-main-bg">
                <div class="modal-header justify-content-center border-dark-gray-2">
                    <button type="button" class="position-absolute start-0 border-0 bg-main-bg px-3"
                        data-bs-dismiss="modal" aria-label="Close"><span
                            class="fa-close-small text-white"></span></button>
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">Filters</h3>
                </div>
                <div class="modal-body offcanvas-body">
                    <div class="filter-col mb-4 pb-4 border-bottom border-dark-gray-1">
                        <div class="fonts-sub fs-6 f300 text-black-2 mb-3">Sort</div>
                        <ul class="sort-filter-list filter-list">














                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="newest" class="">Newest</label>
                                <span>
                                    <input id="newest" class="custom-check" type="radio" name="sortby" value="newest">
                                    <label for="newest" class="custom-radio__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="price_lowHigh" class="">Price: Low-High</label>
                                <span>
                                    <input id="price_lowHigh" class="custom-check" type="radio" name="sortby"
                                        value="price_lowHigh">
                                    <label for="price_lowHigh" class="custom-radio__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="price_highLow" class="">Price: High-Low</label>
                                <span>
                                    <input id="price_highLow" class="custom-check" type="radio" name="sortby"
                                        value="price_highLow">
                                    <label for="price_highLow" class="custom-radio__label block"></label>
                                </span>
                            </li>
                        </ul>
                    </div>








                    <div class="filter-col mb-4 pb-4 border-bottom border-dark-gray-2">
                        <div class="fonts-sub fs-6 f300 text-black-2 mb-3">Price</div>
                        <div class="d-flex flex-wrap align-content-start grid gap-2">
                            <button type="button" data-price="200-250"
                                class="bg-dark-gray-1 border border-dark-gray-2 rounded py-2 px-3 text-white filter-rate">£200-250</button>
                            <button type="button" data-price="250-300"
                                class="bg-dark-gray-1 border border-dark-gray-2 rounded py-2 px-3 text-white filter-rate">£250-300</button>
                            <button type="button" data-price="300+"
                                class="bg-dark-gray-1 border border-dark-gray-2 rounded py-2 px-3 text-white filter-rate">£300+</button>

                        </div>
                    </div>
                    <div class="filter-col mb-4 pb-4 border-bottom border-dark-gray-2">
                        <div class="fonts-sub fs-6 f300 text-black-2 mb-3">Hair Colour</div>
                        <ul class="sort-filter-list filter-list">
                            <li class="filterhaircolor d-flex justify-content-between mb-2">
                                <label for="Blonde" class="">Blonde</label>
                                <span>
                                    <input id="Blonde" class="custom-check" type="checkbox" name="colour[]"
                                        value="Blonde">
                                    <label for="Blonde" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filterhaircolor d-flex justify-content-between mb-2">
                                <label for="Brunette" class="">Brunette</label>
                                <span>
                                    <input id="Brunette" class="custom-check" type="checkbox" name="colour[]"
                                        value="Brunette">
                                    <label for="Brunette" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filterhaircolor d-flex justify-content-between mb-2">
                                <label for="Redhead" class="">Redhead</label>
                                <span>
                                    <input id="Redhead" class="custom-check" type="checkbox" name="colour[]"
                                        value="Redhead">
                                    <label for="Redhead" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filterhaircolor d-flex justify-content-between mb-2">
                                <label for="Black" class="">Black</label>
                                <span>
                                    <input id="Black" class="custom-check" type="checkbox" name="colour[]"
                                        value="Black">
                                    <label for="Black" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filterhaircolor d-flex justify-content-between mb-2">
                                <label for="Others" class="">Others</label>
                                <span>
                                    <input id="Others" class="custom-check" type="checkbox" name="colour[]"
                                        value="Others">
                                    <label for="Others" class="custom-check__label block"></label>
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div class="filter-col">
                        <div class="fonts-sub fs-6 f300 text-black-2 mb-3">Nationality</div>
                        <ul class="sort-filter-list filter-list">
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="British" class="">British</label>
                                <span>
                                    <input id="British" class="custom-check" type="checkbox" name="nationality[]"
                                        value="British">
                                    <label for="British" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="European" class="">European</label>
                                <span>
                                    <input id="European" class="custom-check" type="checkbox" name="nationality[]"
                                        value="European">
                                    <label for="European" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="Asian" class="">Asian</label>
                                <span>
                                    <input id="Asian" class="custom-check" type="checkbox" name="nationality[]"
                                        value="Asian">
                                    <label for="Asian" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="African" class="">African</label>
                                <span>
                                    <input id="African" class="custom-check" type="checkbox" name="nationality[]"
                                        value="African">
                                    <label for="African" class="custom-check__label block"></label>
                                </span>
                            </li>
                            <li class="filternationality d-flex justify-content-between mb-2">
                                <label for="Other" class="">Other</label>
                                <span>
                                    <input id="Other" class="custom-check" type="checkbox" name="nationality[]"
                                        value="Other">
                                    <label for="Other" class="custom-check__label block"></label>
                                </span>
                            </li>

                        </ul>


                    </div>
                </div>
                <div class="modal-footer border-top border-dark-gray-2 justify-content-between">
                    <button type="reset"
                        class="btn bg-main-bg text-md-small text-white f400 d-flex align-items-center px-0 clear_filter border-0">Clear
                        all</button>
                    <span class="bg-primary rounded text-white text-center fonts-sub f400 py-3 px-4">Show
                        profiles</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endvolt