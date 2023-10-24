<div class="row  w-75 justify-content-center margin-top-category">


    <div class="col-12">
        <h2 class="text-center display-1 fw-bold">{{ __('ui.articolititolo') }}</h2>
    </div>



    <div class="col-11 d-flex justify-content-end align-items-end mb-5 border-bottom border-3 border-black ">
        <ul class="navbar-nav">
            <li class="nav-item dropdown mt-5">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if ($checkFilterPriceUp)
                    {{__('ui.ordinaper')}} | <strong>{{__('ui.prezzofiltro')}} <i class="fa-solid fa-arrow-up"></i></strong>
                    @elseif($checkFilterPriceDown)
                    {{__('ui.ordinaper')}} | <strong>{{__('ui.prezzofiltro')}} <i class="fa-solid fa-arrow-down"></i></strong>
                    @elseif($checkFilterRecent)
                    {{__('ui.ordinaper')}} | <strong>{{__('ui.piurecenti')}}</i></strong>
                    @elseif($checkFilterLatest)
                    {{__('ui.ordinaper')}} | <strong>{{__('ui.menorecenti')}}</i></strong>
                    @else
                    {{__('ui.ordinaper')}}
                    @endif
                </a>
                <ul class="dropdown-menu">
                    <li><button wire:click="filterPriceUp" class="dropdown-item">{{ __('ui.prezzo') }} <i
                                class="fa-solid fa-arrow-up ms-3"></i></button></li>
                    <li><button wire:click="filterPriceDown" class="dropdown-item">{{ __('ui.prezzo') }} <i
                                class="fa-solid fa-arrow-down ms-3"></i></button></li>
                    <li><button wire:click="filterRecent" class="dropdown-item">{{ __('ui.piurecenti') }}</button></li>
                    <li><button wire:click="filterLatest" class="dropdown-item">{{ __('ui.menorecenti') }}</button></li>
                </ul>
            </li>
        </ul>
    </div>

    @if ($articles->count() > 0)


        <div class="col-12">
            <div class="row bg-custom-showCategory">


                @foreach ($articles as $article)
                    <a href="{{ route('article.show', $article) }}" class="col-12 col-md-4 col-sm-6 d-flex justify-content-center nav-link">

                        <div class="article-card mb-5" style="width: 18rem;">
                            <img src="{{ $article->images()->first()->getUrl(600, 600) }}" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="opacity-50">{{ __('ui.' . $article->category->name) }}</span>
                                    <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                                   
                                    <p class="text-gray fw-medium mt-2">${{ $article->price }}</p>
                                </div>
                            </div>
                        </div>

                    </a>
                @endforeach

                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <p class="text-gray">{{ __('ui.pagina') }} <span class="fw-bold">{{ $articles->currentPage() }}</span>
                        {{ __('ui.con') }} <span class="fw-bold">{{ $articles->count() }}</span>
                        {{ __('ui.di') }} <span class="fw-bold">{{ $articles->total() }}</span> {{ __('ui.articolipag') }}
                    </p>
                    @if ($articles->hasPages())
                        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex align-items-center justify-content-center ">
                            <span class="mx-2">
                                @if ($articles->onFirstPage())
                                    <span class="px-1 py-1 bg-acc text-whitecus rounded-2">
                                        « {{ __('ui.indietro') }}
                                    </span>
                                @else
                                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                                        class="px-1 py-1 bg-main btn-custom-sec text-whitecus rounded-2 btn">
                                        « {{ __('ui.indietro') }}
                                    </button>
                                @endif
                            </span>

                            <span class="mx-2">
                                @if ($articles->hasMorePages())
                                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                                        class="px-1 py-1 bg-main btn-custom-sec text-whitecus rounded-2 btn">
                                        {{ __('ui.avanti') }} »
                                    </button>
                                @else
                                    <span class="px-1 py-1 bg-acc text-whitecus rounded-2">
                                        {{ __('ui.avanti') }} »
                                    </span>
                                @endif
                            </span>
                        </nav>
                    @endif
                </div>


            </div>
        </div>


</div>
@else
<div class="text-center bg-custom-articlesIndex">
    <h2 class="fw-bold display-2 my-5 ">{{ __('ui.noarticolitrovati') }}</h2>
    @auth
        <a href="{{ route('article.create') }}"><button
                class="btn btn-custom-sec bg-sec fs-2 text-whitecus">{{ __('ui.inserisciannuncio') }}</button></a>
    @endauth

    @guest
        <p class="">{{ __('ui.loginannuncio') }}</p>
        <a href="{{ route('login') }}">
            <button class="btn bg-sec btn-lg text-whitecus btn-custom-sec mb-sm-5 login-sm-media ">{{ __('ui.loginbtn') }}</button>
        </a>
    @endguest
</div>
@endif
</div>
