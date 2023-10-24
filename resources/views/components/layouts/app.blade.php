<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/image/logo2.png" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Page Title' }}</title>

    {{-- SWIPER JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    {{-- ANIMATION ON SCROLL --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

   

</head>

<body>

    <livewire:navbar />

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5 d-flex flex-column justify-content-center align-items-center">
                @if (session()->has('revisorDone'))
                    <div id="richiestaRevisore" class="bg-success mt-5 notifica">{{ session('revisorDone') }}</div>
                @endif

                @if (session('status'))
                    <div class="bg-success text-center notifica">{{ session('status') }}</div>
                @endif

                @if (session('reviewLogin'))
                    <div id="reviewLogin" class="bg-warning text-center notifica mt-5">{{ session('reviewLogin') }}</div>
                @endif

                @if (session()->has('revisorRequest'))
                    <div id="lavoraConNoi" class="bg-success mt-5 text-center notifica">{{ session('revisorRequest') }}</div>
                @endif

                @if (session()->has('updatedReview'))
                    <div id="reviewSended" class="bg-success mt-5 notifica">{{ session('updatedReview') }}</div>
                @endif

                @if (session()->has('profileUpdated'))
                    <div id="profileUpdated" class="bg-success mt-5 notifica">{{ session('profileUpdated') }}</div>
                @endif

                @if (session()->has('passwordErrata'))
                    <div id="passwordErrata" class="bg-danger mt-5 notifica">{{ session('passwordErrata') }}</div>
                @endif

                @if (session()->has('emailAlreadyExist'))
                    <div id="emailAlreadyExist" class="bg-danger mt-5 notifica">{{ session('emailAlreadyExist') }}</div>
                @endif
                @if (session()->has('updatedDescription'))
                    <div id="updatedDescription" class="bg-success mt-5 notifica">{{ session('updatedDescription') }}</div>
                @endif

                @if (session()->has('updatedProfileImage'))
                    <div id="updatedProfileImage" class="bg-success mt-5 notifica">{{ session('updatedProfileImage') }}</div>
                @endif

                @if (session()->has('articleCreated'))
                    <div id="articleCreated" class="bg-success mt-5 text-center text-white notifica">{{ session('articleCreated') }}</div>
                @endif

                @if (session()->has('noRevisor'))
                    <div id="noRevisor" class="bg-danger mt-5 text-center text-white notifica">{{ session('noRevisor') }}</div>
                @endif

                @if (session()->has('articleAccepted'))
                    <div id="articleAccepted" class="bg-success mt-5 text-center text-white notifica">{{ session('articleAccepted') }}</div>
                @endif

                @if (session()->has('articleRefused'))
                    <div id="articleRefused" class="bg-success mt-5 text-center text-white notifica">{{ session('articleRefused') }}</div>
                @endif

                @if (session()->has('articleRevision'))
                    <div id="articleRevision" class="bg-success mt-5 text-center text-white notifica">{{ session('articleRevision') }}</div>
                @endif
            </div>
        </div>
    </div>


    <li class="nav-item dropdown icon-lang ">
        <a class="nav-link dropdown-toggle bg-transparent fs-5 language-drop-icon" href="#" id="navbarDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">



            @if (Config::get('app.locale') == 'it')
                <img src="/flag-img/ita.png" alt="" class="language-drop-icon ">
            @elseif(Config::get('app.locale') == 'en')
                <img src="/flag-img/eng.png" alt="" class="language-drop-icon">
            @elseif(Config::get('app.locale') == 'de')
                <img src="/flag-img/de.png" alt="" class="language-drop-icon">
            @endif

        </a>
        <ul class="bg-transparent border-0 dropdown-menu   ">

            <li><x-_locale lang='it' nation='it' /></li>

            <li><x-_locale lang='de' nation='de' /></li>

            <li><x-_locale lang='en' nation='en' /></li>

        </ul>
    </li>


    {{ $slot }}


    
    
    
    
    
    
    
    
    
    
    
    
    <livewire:footer />
    
    
    {{-- SCRIPT fONTAWESOME --}}
    <script src="https://kit.fontawesome.com/35b7a9f278.js" crossorigin="anonymous"></script>



    {{-- ANIMATION ON SCROLL --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- Initialize Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    {{-- INIZIALIZZAZIONE ANIMATION ON SCROLL --}}
    <script>
        AOS.init();
    </script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                900: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1224: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },

        });
    </script>


</body>

</html>
