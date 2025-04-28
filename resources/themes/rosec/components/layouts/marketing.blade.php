<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P7W5YK22Q5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P7W5YK22Q5');
</script>

<script defer data-domain="rosecoco.co.ke" src="https://plausible.spazacloud.com/js/script.js"></script>

    @include('theme::partials.head', ['seo' => ($seo ?? null) ])
</head>
<body x-data class="bg-main-bg @if($bodyClass ?? false){{ $bodyClass }}@endif" x-cloak>

    <x-marketing.elements.header />

    <main class="flex-grow overflow-x-hidden">
        {{ $slot }}
    </main>

    @livewire('notifications')
    @include('theme::partials.footer')
    @include('theme::partials.footer-scripts')
    {{ $javascript ?? '' }}
    <!-- <script src="//ma.rosecoco.co.ke/focus/1.js" type="text/javascript" charset="utf-8" async="async"></script>

    <script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','http://ma.rosecoco.co.ke/mtc.js','mt');

    mt('send', 'pageview');
</script> -->

</body>
</html>
