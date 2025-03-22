<?php
    use function Laravel\Folio\{name};
    use Livewire\Volt\Component;
    use Livewire\Attributes\Computed;
    use App\Models\Service;
    name('services');

    new class extends Component
    {
        //public $escorts;
     

        #[Computed]
        public function services()
        {
            return Service::all();
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
        
        <x-marketing.sections.banner title="Featured"/>
        <x-marketing.sections.escort_list />
        <!-- <x-marketing.sections.home_content /> -->
      

</x-layouts.marketing>
