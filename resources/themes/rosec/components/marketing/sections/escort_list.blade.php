
<?php

use function Laravel\Folio\{middleware, name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    name('wave.escorts');
   

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
@volt('wave.escorts')
   <div class="row m-0" id="profile-gallery">
        @foreach($this->escorts as $escort)
        
      <div class="col-md-4 col-lg-3 col-6 mb-4 pb-md-2 px-md-2 px-2 gallery-item">
         <div class="d-block position-relative">
            <div class="staff-gallery">
               <a class="media-holder d-block" href="/profile/{{$escort->username}}">
               <img src="/storage/{{$escort->avatar}}" alt="Staff Image"    style="border-radius: 7px;" >
               </a>
            </div>
         </div>
         <span class="d-block mt-3 position-relative">
         <span class="d-block f400 mb-1 pe-4 me-2"><a class="h4 text-primary-light f500 text-uppercase" href="/profile/{{$escort->username}}">{{$escort->username}}</a></span>
         <span class="d-block text-small text-uppercase f500 text-white lh-1 mb-1 tagline"> {{$escort->city->name}} </span>
         <span class="text-md-small text-white f500 lh-1 text-uppercase d-block location">@if($escort->incall)Incall @endif / @if($escort->outcall)Outcall @else <span class="line-through text-red-500">Outcall</span> @endif </span>
         <span class="favourites d-flex justify-content-center align-items-center top-0 end-0 position-absolute">
         <i class="fa-star me-md-1"></i>
         <span class="favourites-message">
         <span class="text">2.5</span>
         <span class="favourites-close"></span>
         </span>
         </span>
         </span>
      </div>
      @endforeach
      
   </div>
@endvolt
</div>