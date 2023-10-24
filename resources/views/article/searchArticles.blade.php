<x-layouts.app title="{{__('ui.searchedarticles')}}">

    <div class="container-fluid d-flex justify-content-center ">

        <div class="row  w-75 justify-content-center bg-custom-articlesIndex">


            <h2 class="text-center display-1 fw-bold mb-5">{{ __('ui.risultatiricerca') }}</h2>
            <p class="text-center display-4">"{{ $request->searched }}"</p>



            <div class="col-12">
                <div class="row bg-custom-showCategory justify-content-center ">


                    @forelse ($articles as $article)
                        <a href="{{ route('article.show', $article) }}" class="col-12 col-md-4 col-sm-6 d-flex justify-content-center nav-link">
                            <div class="article-card mb-5" style="width: 18rem;">
                                <img src="{{ $article->images()->first()->getUrl(600, 600) }}" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="opacity-50">{{ $article->category->name }}</span>
                                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                                        
                                        
                                       
                                        <p class="text-gray fw-medium mt-2">${{ $article->price }}</p>
                                    </div>
                                </div>
                            </div>
                       
                    </a>
                    
                    @empty


                        <div class="text-center ">
                            <h2 class="fw-bold display-2 my-5 ">{{ __('ui.noarticolitrovati') }}</h2>
                            @auth
                                <a href="{{ route('article.create') }}"><button
                                        class="btn btn-custom-sec bg-sec fs-2 text-whitecus">{{ __('ui.inserisciannuncio') }}</button></a>
                            @endauth

                            @guest
                                <p class="">{{ __('ui.loginannuncio') }}</p>
                                <a href="{{ route('login') }}">
                                    <button
                                        class="btn bg-sec btn-lg text-whitecus btn-custom-sec mb-sm-5 login-sm-media ">{{ __('ui.loginbtn') }}</button>
                                </a>
                            @endguest
                        </div>
                    @endforelse

                </div>
            </div>







        </div>

    </div>





</x-layouts.app>
