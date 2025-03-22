
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
                        <!-- <h5 class="pt-5">Mon-Fri 10am-10pm, Sat-Sun 12pm-12am<br/> <a href="/cdn-cgi/l/email-protection#3c55525a537c5f4e494f54594f5f534e484f125f5351" aria-label="Click Here to email us"><span class="__cf_email__" data-cfemail="20494e464f6043525553484553434f5254530e434f4d">[email&#160;protected]</span></a><br/> <a href="tel:07478770704" aria-label="Click Here to call us">07478770704</a></h5> -->
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
                                                <!-- <div class="colm-list colm-xl-7 colm-lg-4">
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>B</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/baker-street-escorts"
                                                                    aria-label="Baker Street "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Baker
                                                                    Street </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/bayswater-escorts"
                                                                    aria-label="Bayswater "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Bayswater
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/bond-street-escorts"
                                                                    aria-label="Bond Street "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Bond
                                                                    Street </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>C</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/charing-cross-escorts"
                                                                    aria-label="Charing Cross "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Charing
                                                                    Cross </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/chelsea-escorts"
                                                                    aria-label="Chelsea "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Chelsea
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/covent-garden-escorts"
                                                                    aria-label="Covent Garden "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Covent
                                                                    Garden </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>E</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/earls-court-escorts"
                                                                    aria-label="Earls Court "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Earls
                                                                    Court </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/edgware-road-escorts"
                                                                    aria-label="Edgware Road "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Edgware
                                                                    Road </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>F</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/fulham-escorts"
                                                                    aria-label="Fulham "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Fulham
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>G</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/gloucester-road-escorts"
                                                                    aria-label="Gloucester Road "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Gloucester
                                                                    Road </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/green-park-escorts"
                                                                    aria-label="Green Park "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Green
                                                                    Park </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>H</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/high-street-kensington"
                                                                    aria-label="High Street Kensington"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">High
                                                                    Street Kensington</a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/holland-park-escorts"
                                                                    aria-label="Holland Park "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Holland
                                                                    Park </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/hyde-park-corner-escorts"
                                                                    aria-label="Hyde Park Corner "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Hyde
                                                                    Park Corner </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>K</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/kensington-olympia-escorts"
                                                                    aria-label="Kensington Olympia "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Kensington
                                                                    Olympia </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/kings-cross-escorts"
                                                                    aria-label="Kings Cross "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Kings
                                                                    Cross </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/knightsbridge-escorts"
                                                                    aria-label="Knightsbridge "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Knightsbridge
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>L</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/lancaster-gate-escorts"
                                                                    aria-label="Lancaster Gate "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Lancaster
                                                                    Gate </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/leicester-square-escorts"
                                                                    aria-label="Leicester Square "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Leicester
                                                                    Square </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>M</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/maida-vale-escorts"
                                                                    aria-label="Maida Vale "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Maida
                                                                    Vale </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/marble-arch-escorts"
                                                                    aria-label="Marble Arch "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Marble
                                                                    Arch </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/marylebone-escorts"
                                                                    aria-label="Marylebone "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Marylebone
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/mayfair-escorts"
                                                                    aria-label="Mayfair "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Mayfair
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>N</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/notting-hill-escorts"
                                                                    aria-label="Notting Hill "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Notting
                                                                    Hill </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>O</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/oxford-street-escorts"
                                                                    aria-label="Oxford Street "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Oxford
                                                                    Street </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>P</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/paddington-escorts"
                                                                    aria-label="Paddington "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Paddington
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/park-lane-escorts"
                                                                    aria-label="Park Lane "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Park
                                                                    Lane </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/piccadilly-circus-escorts"
                                                                    aria-label="Piccadilly Circus "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Piccadilly
                                                                    Circus </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/portman-square-escorts"
                                                                    aria-label="Portman Square "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Portman
                                                                    Square </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>Q</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/queensway-escorts"
                                                                    aria-label="Queensway "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Queensway
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>R</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/royal-oak-escorts"
                                                                    aria-label="Royal Oak "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Royal
                                                                    Oak </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>S</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/shepherds-bush-escorts"
                                                                    aria-label="Shepherds Bush "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Shepherds
                                                                    Bush </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/sloane-avenue-escorts"
                                                                    aria-label="Sloane Avenue "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Sloane
                                                                    Avenue </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/south-kensington-escorts"
                                                                    aria-label="South Kensington "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">South
                                                                    Kensington </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/st-johns-wood-escorts"
                                                                    aria-label="St Johns Wood "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">St
                                                                    Johns Wood </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>T</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/tottenham-court-road-escorts"
                                                                    aria-label="Tottenham Court Road "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Tottenham
                                                                    Court Road </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/tower-hill-escorts"
                                                                    aria-label="Tower Hill "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Tower
                                                                    Hill </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>V</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/victoria-escorts"
                                                                    aria-label="Victoria "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Victoria
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>W</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/warren-street-escorts"
                                                                    aria-label="Warren Street "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Warren
                                                                    Street </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/locations/westminster-escorts"
                                                                    aria-label="Westminster "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Westminster
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                @php
    // Determine the number of columns you want
    $numColumns = 2;

    // Split the groups into chunks for each column
    $columns = $this->cities->chunk(ceil(count($this->cities) / $numColumns));
@endphp

<div class="row">
    @foreach($columns as $column)
        <div class="colm-list colm-xl-7 colm-lg-4">
            @foreach($column as $letter => $group)
                <div class="colm-list-item mb-2">
                    <h5 class="text-uppercase d-flex fs-5 text-primary"><b>{{ $letter }}</b></h5>
                    <ul class="locations">
                        @foreach($group as $location)
                            <li class="mb-3 mb-lg-1">
                                <a href="{{ url('/locations/' . $location->id) }}" aria-label="{{ $location->name }}" class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $location->name }}</a>
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
                                                <!-- <div class="colm-list colm-xl-7 colm-lg-4">
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>B</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/blonde-escorts"
                                                                    aria-label="Blonde "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Blonde
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/brazilian-escorts"
                                                                    aria-label="Brazilian "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Brazilian
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/brunette-escorts"
                                                                    aria-label="Brunette "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Brunette
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/busty-escorts"
                                                                    aria-label="Busty "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Busty
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>C</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/couple-escorts"
                                                                    aria-label="Couple "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Couple
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/curvy-escorts"
                                                                    aria-label="Curvy "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Curvy
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>D</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/dominatrix-escorts"
                                                                    aria-label="Dominatrix "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Dominatrix
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>E</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/english-escorts"
                                                                    aria-label="English "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">English
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/european-escorts"
                                                                    aria-label="European "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">European
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>H</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/high-class-escorts"
                                                                    aria-label="High Class "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">High
                                                                    Class </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>M</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/mature-escorts"
                                                                    aria-label="Mature "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Mature
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>P</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/party-escorts"
                                                                    aria-label="Party "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Party
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/petite-escorts"
                                                                    aria-label="Petite "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Petite
                                                                </a>
                                                            </li>
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/pornstar-escorts"
                                                                    aria-label="Pornstar "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Pornstar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>R</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/russian-escorts"
                                                                    aria-label="Russian "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Russian
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>S</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/slim-escorts"
                                                                    aria-label="Slim "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Slim
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>V</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/video-escorts"
                                                                    aria-label="Video "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Video
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>Y</b>
                                                        </h5>
                                                        <ul class="locations">
                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/categories/young-escorts"
                                                                    aria-label="Young "
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Young
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                @php
    // Determine the number of columns you want
    $numColumns = 3;

    // Split the groups into chunks for each column
    $columns = $this->categories->chunk(ceil(count($this->categories) / $numColumns));
@endphp

<div class="row">
    @foreach($columns as $column)
        <div class="colm-list colm-xl-7 colm-lg-4">
            @foreach($column as $letter => $group)
                <div class="colm-list-item mb-2">
                    <h5 class="text-uppercase d-flex fs-5 text-primary"><b>{{ $letter }}</b></h5>
                    <ul class="locations">
                        @foreach($group as $category)
                            <li class="mb-3 mb-lg-1">
                                <a href="{{ url('/categories/' . $category->id) }}" aria-label="{{ $category->name }}" class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $location->name }}</a>
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
                                                <!-- <div class="colm-list colm-xl-7 colm-lg-4">

                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>#</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/69-escorts"
                                                                    aria-label="69 Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">69
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>A</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/a-level-escorts"
                                                                    aria-label="A Level Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">A
                                                                    Level </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>B</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/bdsm-escorts"
                                                                    aria-label="BDSM Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">BDSM
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>C</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/cif-escorts"
                                                                    aria-label="CIF Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">CIF
                                                                </a>
                                                            </li>

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/cim-escorts"
                                                                    aria-label="CIM Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">CIM
                                                                </a>
                                                            </li>

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/cob-escorts"
                                                                    aria-label="COB Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">COB
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>D</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/deep-throat-escorts"
                                                                    aria-label="Deep Throat Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Deep
                                                                    Throat </a>
                                                            </li>

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/dfk-escorts"
                                                                    aria-label="DFK Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">DFK
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>F</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/fetish-escorts"
                                                                    aria-label="Fetish Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Fetish
                                                                </a>
                                                            </li>

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/fisting-escorts"
                                                                    aria-label="Fisting Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Fisting
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>G</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/gfe-escorts"
                                                                    aria-label="GFE Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">GFE
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>M</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/massage-escorts"
                                                                    aria-label="Massage Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Massage
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>O</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/owo-escorts"
                                                                    aria-label="OWO Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">OWO
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>R</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/rimming-escorts"
                                                                    aria-label="Rimming Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Rimming
                                                                </a>
                                                            </li>

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/role-play-escorts"
                                                                    aria-label="Role Play Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Role
                                                                    Play </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>S</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/striptease-escorts"
                                                                    aria-label="Striptease Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Striptease
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="colm-list-item mb-2">
                                                        <h5 class="text-uppercase d-flex fs-5 text-primary"><b>W</b>
                                                        </h5>
                                                        <ul class="locations">

                                                            <li class="mb-3 mb-lg-1">
                                                                <a href="https://www.crushescorts.com/services/watersports-escorts"
                                                                    aria-label="Watersports Escorts"
                                                                    class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">Watersports
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->

                                                @php
    // Determine the number of columns you want
    $numColumns = 3;

    // Split the groups into chunks for each column
    $columns = $this->services->chunk(ceil(count($this->services) / $numColumns));
@endphp

<div class="row">
    @foreach($columns as $column)
        <div class="colm-list colm-xl-7 colm-lg-4">
            @foreach($column as $letter => $group)
                <div class="colm-list-item mb-2">
                    <h5 class="text-uppercase d-flex fs-5 text-primary"><b>{{ $letter }}</b></h5>
                    <ul class="locations">
                        @foreach($group as $service)
                            <li class="mb-3 mb-lg-1">
                                <a href="{{ url('/services/' . $service->id) }}" aria-label="{{ $service->name }}" class="text-white text-hover-primary fs-5 fs-md-down-6 d-block fonts-secondary">{{ $location->name }}</a>
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
                                <li><a href="/news">News</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="d-flex align-items-end flex-column desk-view">
                    <a class="header-min-phone d-flex align-items-center lh-lg" href="/dashboard">
                        <i class="fa-whatsapp"></i>
                        <span class="f400">Dashboard</span>
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