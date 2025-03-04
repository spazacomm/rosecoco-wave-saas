<?php
    use function Laravel\Folio\{name};
    name('home');
?>

<x-layouts.marketing
    :seo="[
        'title'         => setting('site.title', 'Laravel Wave'),
        'description'   => setting('site.description', 'Software as a Service Starter Kit'),
        'image'         => url('/og_image.png'),
        'type'          => 'website'
    ]"
>
        
        <x-marketing.sections.banner />
        <x-marketing.sections.escort_list />
        <x-marketing.sections.home_content />
      

</x-layouts.marketing>
