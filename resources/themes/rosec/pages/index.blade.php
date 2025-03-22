<?php
    use function Laravel\Folio\{name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
  
    name('home');

    new class extends Component
    {
        public $escorts;
     

        #[Computed]
        public function escorts()
        {
            return config('wave.user_model')->get();
        }

      


    }
?>

<x-layouts.marketing
    :seo="[
        'title'         => setting('site.title', 'Rosecoco'),
        'description'   => setting('site.description', 'Escort Listing Directory'),
        'image'         => url('/og_image.png'),
        'type'          => 'website'
    ]"
>
        
        <x-marketing.sections.banner />
        <x-marketing.sections.escort_list />
        <!-- <x-marketing.sections.home_content /> -->
      

</x-layouts.marketing>
