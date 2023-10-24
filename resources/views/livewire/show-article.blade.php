
    <section class="product-details-wrapper pt-50 pb-100 mt-5 bg-custom-articleDetail">
        <div class="container">
            <div class="product-details-style-1">
                <div class="row flex-lg-row-reverse align-items-center">
                    <div class="col-lg-6">
                        <div class="product-details-image mt-50">
                            <div class="product-image">
                                <div class="product-image-active tab-content" id="v-pills-tabContent">
                                    @foreach ($article->images as $key => $image)
                                        <div class="single-image tab-pane fade bigImg @if ($key == 0) active show @endif"
                                            id="v-pills-{{ $key }}" role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">
                                            <img src="{{ $image->getUrl(600, 600) }}" alt="" class="rounded-5">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-thumb-image">
                                <div class=" product-thumb-image-activ nav flex-column nav-pills me-3 " id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach ($article->images as $key => $image)
                                        <div class="single-thumb smallImg" id="v-pills-{{ $key }}-tab" data-bs-toggle="pill"
                                            href="#v-pills-{{ $key }}" role="tab" aria-controls="v-pills-{{ $key }}"
                                            aria-selected="false">
                                            <img src="{{ $image->getUrl(600, 600) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="product-details-content mt-45 mt-5">
                            <p class="sub-title">{{ __('ui.dettagliprodotto') }}</p>
                            <h2 class="title">{{ $article->title }}</h2>

                            <div class="product-price">
                                <h6 class="price-title">{{ __('ui.prezzo') }}:</h6>
                                <p class="sale-price">$ {{ $article->price }}</p>
                            </div>
                            <div class="product-price">
                                <h6 class="fw-bold fs-5">{{ __('ui.venditore') }}:</h6>
                                
                                    <p class="fs-4">{{ $article->user->name}}</p>
                                @if ($reviewsSeller->count() > 0)
                                    {{ $this->createStar($reviewsSeller->sum('stars') / $reviewsSeller->count()) }}
                                @else
                                    {{ $this->createStar(0) }}
                                @endif
                                
                            </div>

                            <div>
                                <h6 class="fw-bold fs-5 my-4">{{ __('ui.descrizione') }}</h6>
                                <p>{{ $article->description }}</p>
                            </div>
                            <a href="{{route('showSelleProfile',['article'=>$article->user->id])}}"><button class="btn bg-main text-whitecus btn-custom-acc mt-3">{{ __('ui.profilovenditore') }}</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
