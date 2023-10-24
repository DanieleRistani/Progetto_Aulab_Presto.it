<div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @if (isset($article1))
                <div class="swiper-slide rounded-2  ">
                    <div class="card ">
                        <img class=' mx-auto mt-2 rounded-3' src="{{ $article1->images()->first()->getUrl(600, 600) }}" alt="Card image cap"
                            width='95%' height="80%">
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title text-start text-truncate" title='{{ $article1->title }}'>{{ $article1->title }}</h5>
                                <span>{{ __('ui.categoria') }}
                                    <span class="bg-acc text-whitecus rounded-2 text-start px-1">
                                        {{ __('ui.' . $article1->category->name) }}</span>
                                </span>
                                <p class="card-text text-truncate mt-1">{{ $article1->description }}</p>
                            </div>
                            <div class="fw-bold star-font d-flex justify-content-start mt-3 ">
                                <a href="{{ route('showSelleProfile', ['article' => $article1->user->id]) }}" class="nav-link">
                                    <p class="me-1 p-star nav-item fs-5"> {{ $article1->user->name }}:</p>
                                </a>


                                @if ($totalReviewsSeller1->count() > 0)
                                    {{ $this->createStar($totalReviewsSeller1->sum('stars') / $totalReviewsSeller1->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif


                            </div>
                            <div class="d-flex justify-content-start  align-items-center ">
                                <a href="{{ route('article.show', $article1) }}" class="btn bg-sec btn-custom-acc">{{ __('ui.vediarticolo') }}</a>
                                <p class="ms-auto pt-3">{{ $article1->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if (isset($article2))
                <div class="swiper-slide rounded-2  ">
                    <div class="card ">
                        <img class=' mx-auto mt-2 rounded-3' src="{{ $article2->images()->first()->getUrl(600, 600) }}" alt="Card image cap"
                            width='95%' height="80%">
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title text-start text-truncate" title='{{ $article2->title }}'>{{ $article2->title }}</h5>
                                <span>{{ __('ui.categoria') }}
                                    <span class="bg-acc text-whitecus rounded-2 text-start px-1">
                                        {{ __('ui.' . $article2->category->name) }}</span>
                                </span>
                                <p class="card-text text-truncate mt-1">{{ $article2->description }}</p>
                            </div>
                            <div class="fw-bold star-font d-flex justify-content-start mt-3 ">
                                <a href="{{ route('showSelleProfile', ['article' => $article2->user->id]) }}" class="nav-link">
                                    <p class="me-1 p-star nav-item fs-5"> {{ $article2->user->name }}:</p>
                                </a>


                                @if ($totalReviewsSeller2->count() > 0)
                                    {{ $this->createStar($totalReviewsSeller2->sum('stars') / $totalReviewsSeller2->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif


                            </div>
                            <div class="d-flex justify-content-start  align-items-center ">
                                <a href="{{ route('article.show', $article2) }}" class="btn bg-sec btn-custom-acc">{{ __('ui.vediarticolo') }}</a>
                                <p class="ms-auto pt-3">{{ $article2->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if (isset($article3))
                <div class="swiper-slide rounded-2  ">
                    <div class="card ">
                        <img class=' mx-auto mt-2 rounded-3' src="{{ $article3->images()->first()->getUrl(600, 600) }}" alt="Card image cap"
                            width='95%' height="80%">
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title text-start text-truncate" title='{{ $article3->title }}'>{{ $article3->title }}</h5>
                                <span>{{ __('ui.categoria') }}
                                    <span class="bg-acc text-whitecus rounded-2 text-start px-1">
                                        {{ __('ui.' . $article3->category->name) }}</span>
                                </span>
                                <p class="card-text text-truncate mt-1">{{ $article3->description }}</p>
                            </div>
                            <div class="fw-bold star-font d-flex justify-content-start mt-3 ">
                                <a href="{{ route('showSelleProfile', ['article' => $article3->user->id]) }}" class="nav-link">
                                    <p class="me-1 p-star nav-item fs-5"> {{ $article3->user->name }}:</p>
                                </a>


                                @if ($totalReviewsSeller3->count() > 0)
                                    {{ $this->createStar($totalReviewsSeller3->sum('stars') / $totalReviewsSeller3->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif


                            </div>
                            <div class="d-flex justify-content-start  align-items-center ">
                                <a href="{{ route('article.show', $article3) }}" class="btn bg-sec btn-custom-acc">{{ __('ui.vediarticolo') }}</a>
                                <p class="ms-auto pt-3">{{ $article3->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if (isset($article4))
                <div class="swiper-slide rounded-2  ">
                    <div class="card ">
                        <img class=' mx-auto mt-2 rounded-3' src="{{ $article4->images()->first()->getUrl(600, 600) }}" alt="Card image cap"
                            width='95%' height="80%">
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title text-start text-truncate" title='{{ $article4->title }}'>{{ $article4->title }}</h5>
                                <span>{{ __('ui.categoria') }}
                                    <span class="bg-acc text-whitecus rounded-2 text-start px-1">
                                        {{ __('ui.' . $article4->category->name) }}</span>
                                </span>
                                <p class="card-text text-truncate mt-1">{{ $article4->description }}</p>
                            </div>
                            <div class="fw-bold star-font d-flex justify-content-start mt-3 ">
                                <a href="{{ route('showSelleProfile', ['article' => $article4->user->id]) }}" class="nav-link">
                                    <p class="me-1 p-star nav-item fs-5"> {{ $article4->user->name }}:</p>
                                </a>


                                @if ($totalReviewsSeller4->count() > 0)
                                    {{ $this->createStar($totalReviewsSeller4->sum('stars') / $totalReviewsSeller4->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif


                            </div>
                            <div class="d-flex justify-content-start  align-items-center ">
                                <a href="{{ route('article.show', $article4) }}" class="btn bg-sec btn-custom-acc">{{ __('ui.vediarticolo') }}</a>
                                <p class="ms-auto pt-3">{{ $article4->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if (isset($article5))
                <div class="swiper-slide rounded-2  ">
                    <div class="card ">
                        <img class=' mx-auto mt-2 rounded-3' src="{{ $article5->images()->first()->getUrl(600, 600) }}" alt="Card image cap"
                            width='95%' height="80%">
                        <div class="card-body">
                            <div class="text-start">
                                <h5 class="card-title text-start text-truncate" title='{{ $article5->title }}'>{{ $article5->title }}</h5>
                                <span>{{ __('ui.categoria') }}
                                    <span class="bg-acc text-whitecus rounded-2 text-start px-1">
                                        {{ __('ui.' . $article5->category->name) }}</span>
                                </span>
                                <p class="card-text text-truncate mt-1">{{ $article5->description }}</p>
                            </div>
                            <div class="fw-bold star-font d-flex justify-content-start mt-3 ">
                                <a href="{{ route('showSelleProfile', ['article' => $article5->user->id]) }}" class="nav-link">
                                    <p class="me-1 p-star nav-item fs-5"> {{ $article5->user->name }}:</p>
                                </a>


                                @if ($totalReviewsSeller5->count() > 0)
                                    {{ $this->createStar($totalReviewsSeller5->sum('stars') / $totalReviewsSeller5->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif


                            </div>
                            <div class="d-flex justify-content-start  align-items-center ">
                                <a href="{{ route('article.show', $article5) }}" class="btn bg-sec btn-custom-acc">{{ __('ui.vediarticolo') }}</a>
                                <p class="ms-auto pt-3">{{ $article5->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            
            @if (!isset($article1))
             <h3 class="display-1  text-center mx-auto"> Non ci sono articoli al momento</h2>
            @endif

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
