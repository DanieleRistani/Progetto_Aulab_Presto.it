<div class="container  ">

    <div class="row mt-5 ">


        <div class="row justify-content-between ms-3 mt-5">

            <div class="col-12 col-md-5 mt-5 d-flex flex-column justify-content-center align-items-center  bg-transparent  align-items-start">
                <img src="{{ Storage::url($seller->image) }}" class="img-custom-profile" alt="">
            </div>

            <div
                class="col-12 col-md-6 mt-5 d-flex flex-column justify-content-center align-items-start profile-container-bg rounded-3 align-items-start">
                <div class="col-12"></div>
                <p class="fs-5">{{ __('ui.nomeprof') }}: <span class="fw-bold">{{ $seller->name }}</span>
                </p>
                <p class="fs-5">Email: <span class="fw-bold">{{ $seller->email }}</span>
                </p>
                <p class="fs-5">{{ __('ui.creatoilprof') }} <span class="fw-bold">{{ date('d-m-Y', strtotime($seller->created_at)) }}</span>
                </p>

                <div class=" star-font d-flex justify-content-between align-items-center  w-100 mt-2 ">
                    <div class="d-flex justify-content-center">
                        <p class="fs-5 me-2">{{ __('ui.recensionevenditore') }}: </p>

                        @if ($totalReviewsSeller->count() > 0)
                            {{ $this->createStar($totalReviewsSeller->sum('stars') / $totalReviewsSeller->count()) }}
                        @else
                            {{ $this->createStar(0) }}
                        @endif




                    </div>

                    @if(Auth::user() && Auth::user()->id !== $seller->id)
                    <button class="btn bg-sec btn-custom-acc" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('ui.recensionebtn') }}</button>
                    @elseif((Auth::user() && Auth::user()->id == $seller->id))
                    
                    @else
                    <a class="btn bg-sec btn-custom-acc"  href="{{route('login')}}">{{ __('ui.recensionebtn') }}</a>

                    @endif
                </div>


            </div>

            <div class="col-12 col-md-5 mt-5 profile-container-bg rounded-3">

                <h3 class="mt-2">{{ __('ui.articolivenditore') }}</h3>


                <div class="tbl-header-p col-12 col-md-8 ">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>

                                <th scope="col" class="pt-3">
                                    <p class="text-center">{{ __('ui.titolodashboard') }}</p>
                                </th>
                                <th scope="col" class="pt-3">
                                    <p class="text-center">{{ __('ui.prezzodashboard') }}</p>
                                </th>
                                <th scope="col" class="pt-3">
                                    <p class="text-center">{{ __('ui.categoria') }} </p>
                                </th>
                                <th scope="col" class="pt-3">
                                    <p class="text-center">{{ __('ui.dettaglioprof') }}</p>
                                </th>



                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content-p col-12 col-md-8">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>

                                    <td class="" scope="row">
                                        <p class="text-center">{{ $article->title }}</p>
                                    </td>
                                    <th class="" scope="row">
                                        <p class="text-center">${{ $article->price }}</p>
                                    </th>
                                    <th class="" scope="row">
                                        <p class="text-center">{{ $article->category->name }}</p>
                                    </th>
                                    <th class=" " scope="row ">
                                        <a href="{{ route('article.show', $article) }}"
                                            class="btn btn-sm bg-sec btn-custom-acc ">{{ __('ui.vediarticolo') }}</a>
                                    </th>


                                </tr>
                            @empty
                                <p class="text-center">{{ __('ui.nodashboard') }}</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-12 col-md-6 mt-5 profile-container-bg rounded-3 text-center">
                <h3 class=" text-center">{{ __('ui.descrizioneform') }}</h3>
                <p class="fs-6">{{ $seller->description }}</p>
            </div>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content border-5 border-acc shadow-lg  ">
                        
                        
                        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
                            <p class="fs-5 me-2 mt-2">{{ __('ui.recensione') }} </p>
                            
                            <div class="d-flex flex-row-reverse">
                
                                <button class="fa-solid fa-2x fa-star p-star border-0 bg-transparent star-review s5 messageReview"
                                    wire:click="setReviewSeller('{{ $n = 5 }}')" ></button>
                
                                <button class="fa-solid fa-2x fa-star p-star border-0 bg-transparent star-review s4 messageReview"
                                    wire:click="setReviewSeller('{{ $n = 4 }}')"></button>
                                <button class="fa-solid fa-2x fa-star p-star border-0 bg-transparent star-review s3 messageReview"
                                    wire:click="setReviewSeller('{{ $n = 3 }}')"></button>
                                <button class="fa-solid fa-2x fa-star p-star border-0 bg-transparent star-review s2 messageReview"
                                    wire:click="setReviewSeller('{{ $n = 2 }}')"></button>
                                <button class="fa-solid fa-2x fa-star p-star border-0 bg-transparent star-review s1 messageReview"
                                    wire:click="setReviewSeller('{{ $n = 1 }}')" ></button>
                            </div>

                        </div>




                        <div class="modal-footer d-flex justify-content-start ">
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 row-custom-seller">

            </div>



        </div>

    </div>

</div>
