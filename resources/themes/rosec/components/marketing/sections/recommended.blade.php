<?php

use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    name('wave.recommended_escorts');
   

    new class extends Component
    {
       // public $escorts;


        #[Computed]
        public function escorts()
        {
            return config('wave.user_model')::query()->get();
        }
    }
?>

<div class="container">
    @volt('wave.recommended_escorts')
   

    <div class="similar-staff container-medium mx-auto">
        <h2 class="mb-3 fonts-sub fs-4 f300 text-black-2 mb-3 f500">Similar profiles</h2>
        <div class="row">
            @foreach($this->escorts as $escort)

            @if(!$escort->hasRole('admin'))
            <div class="col-md-6 col-lg-2 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
                <div class="d-block position-relative">
                    <a href="/profile/{{$escort->username}}">
                        <div class=" staff-gallery">
                            <img class="fw fh" src="/storage/{{$escort->avatar}}"
                                loading="lazy" alt="Staff Image">
                        </div>
                    </a>
                </div>
                <span class="d-block mt-2 position-relative">
                    <span class="d-block f400 mb-1"><a class="h5 text-primary f300 text-uppercase"
                            href="/profile/{{$escort->username}}">{{$escort->username}}</a></span>
                    <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline">{{ $escort->city ? $escort->city->name : '' }}</span>
                    <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">@if($escort->incall)Incall
                    @endif / @if($escort->outcall)Outcall @else <span class="line-through text-red-500">Outcall</span>
                    @endif</span>
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
            @endif

            @endforeach

        </div>
    </div>
    @endvolt
</div>