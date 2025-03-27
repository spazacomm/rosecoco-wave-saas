<?php

use function Laravel\Folio\name;
use Livewire\Volt\Component;
use App\Models\Service;

name('services/{serviceId}');

new class extends Component
{
    public int $serviceId;
    public Service $service;
    public $escorts;

    public function mount($serviceId)
    {
        $this->serviceId = (int) $serviceId;
        $this->service = Service::findOrFail($this->serviceId);
        $this->escorts = $this->service->users()->get();
    }

    
};

?>
@volt('services/{serviceId}')
<div>
<x-layouts.marketing
    :seo="[
        'title'         => setting('site.title', 'Rosecoco'),
        'description'   => setting('site.description', 'Escort Listing Directory'),
        'image'         => url('/og_image.png'),
        'type'          => 'website'
    ]"
>
    <x-marketing.sections.service_banner 
        :title="$service->name" 
        :description="$service->description" 
    />

    <div class="container">

   <div class="row m-0" id="profile-gallery">
   @if($this->escorts->isNotEmpty())
    @foreach($this->escorts as $escort)
        <div class="col-md-4 col-lg-3 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
            <div class="d-block position-relative">
                <div class="staff-gallery">
                    <a class="media-holder d-block" href="/profile/{{ $escort->username }}">
                        <img src="/storage/{{ $escort->avatar }}" alt="Staff Image" style="border-radius: 7px;">
                    </a>
                </div>
            </div>

            <span class="d-block mt-3 position-relative">
                <span class="d-block f400 mb-1 pe-4 me-2">
                    <a class="h4 text-primary-light f500 text-uppercase" href="/profile/{{ $escort->username }}">
                        {{ $escort->username }}
                    </a>
                </span>

                @if($escort->city)
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline">
                        {{ $escort->city->name }}
                    </span>
                @endif

                <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">
                    @if($escort->incall)
                        Incall
                    @endif
                    @if($escort->outcall)
                        / Outcall
                    @else
                        / <span class="line-through text-red-500">Outcall</span>
                    @endif
                </span>

                <span class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
                    <i class="fa fa-star me-md-1"></i>
                    <span class="favourites-message">
                        <span class="text">{{$escort->averageRating()}}</span>
                        <span class="favourites-close"></span>
                    </span>
                </span>
            </span>
        </div>
    @endforeach
@else
    <p>There are no escorts at the moment.</p>
@endif
      
   </div>

</div>

    <!-- <x-marketing.sections.home_content /> -->
</x-layouts.marketing>
    </div>
    @endvolt
