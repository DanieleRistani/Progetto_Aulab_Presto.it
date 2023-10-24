<div class="conteiner-fluid bg-custom-dash">

    <div class="row  justify-content-center  ">

        <h2 class=" text-center  mt-5  display-1 h2-dashbord ">{{ __('ui.gestionearticoli') }}</h2>

        <div class="radio-button-container col-10 col-md-8  d-flex justify-content-center mb-5 align-items-center">
            <div class="radio-button ">
                <input type="radio" class="radio-button__input" id="radio1" name="radio-group" checked="checked" wire:click='showArticlesInPending'>
                <label class="radio-button__label" for="radio1">
                    <span class="radio-button__custom"></span>
                    <p class="text-blackcus mx-0 p-custom-dash">{{ __('ui.artdarevisionare') }}</p>
                </label>
            </div>
            <div class="radio-button ">
                <input type="radio" class="radio-button__input" id="radio2" name="radio-group" wire:click='showArticlesAccepted'>
                <label class="radio-button__label " for="radio2">
                    <span class="radio-button__custom"></span>
                    <p class="text-blackcus mx-0 p-custom-dash">{{ __('ui.artaccettati') }}</p>
                </label>
            </div>
            <div class="radio-button  ">
                <input type="radio" class="radio-button__input" id="radio3" name="radio-group" wire:click='showArticlesRefused'>
                <label class="radio-button__label" for="radio3">
                    <span class="radio-button__custom"></span>
                    <p class="text-blackcus px-0 p-custom-dash">{{ __('ui.artrifiutati') }}</p>
                </label>
            </div>
        </div>

        <div class="tbl-header col-12 col-md-8 ">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th scope="col ">
                            <p class="text-center">{{ __('ui.creatodashboard') }}</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">{{ __('ui.inseritodashboard') }}</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">{{ __('ui.titolodashboard') }}</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">{{ __('ui.prezzodashboard') }}</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">{{ __('ui.azionidashboard') }}</p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content col-12 col-md-8">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <td class="" scope="row">
                                <p class="text-center">{{ $article->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="" scope="row">
                                <p class="text-center">{{ $article->user->name }}</p>
                            </td>
                            <th class="" scope="row">
                                <p class="text-center">{{ $article->title }}</p>
                            </th>
                            <td class="" scope="row">
                                <p class="text-center"><span class="fw-bold">$</span>{{ $article->price }}</p>
                            </td>

                            <td>
                                <div class=" ">
                                    @if ($article->is_accepted === null)
                                        <div class='d-flex justify-content-center mx-auto '>


                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>



                                        </div>
                                    @elseif ($article->is_accepted == false)
                                        <div class='d-flex justify-content-center mx-auto '>

                                            <form action="{{ route('revisor.revision.article', ['article' => $article]) }}" method="post"
                                                class="mx-auto">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning mx-1"><i class="fa-solid fa-pen fa-2xs"></i></button>
                                            </form>

                                        </div>
                                    @elseif ($article->is_accepted == true)
                                        <div class='d-flex justify-content-center mx-auto '>

                                            <form action="{{ route('revisor.revision.article', ['article' => $article]) }}" method="post"
                                                class="mx-auto">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning mx-1"><i class="fa-solid fa-pen fa-2xs"></i></button>
                                            </form>

                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                </tbody>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content border-5 border-acc shadow-lg ">

                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($article->images as $key => $image)
                                        <div class="carousel-item position-relative  @if ($key == 0) active @endif">

                                            <img src="{{ $image->getUrl(600, 600) }}" class="d-block w-100" alt="...">

                                            <div
                                                class="  w-100 d-flex flex-column bg-acc justify-content-center align-items-center custom-carusol-absolute  ">

                                                <h5 class="text-center">{{__('ui.revisioneimmagine')}}</h5>
                                                <div class="w-100 d-flex  bg-acc justify-content-center  ">
                                                    @if ($image->labels)
                                                        <div class="mt-2">

                                                            @foreach ($image->labels as $label)
                                                                <p class="d-inline text-center bg-white  rounded-2 text-start px-1 ">
                                                                    {{ $label }}</p>
                                                            @endforeach

                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="d-flex justify-content-around mt-3 ">
                                                    <i class="{{ $image->adult }} d-flex justify-content-center mx-3">
                                                        <p class="ms-1">{{__('ui.adulti')}}</p>
                                                    </i>
                                                    <i class="{{ $image->spoof }}   d-flex justify-content-center mx-3">
                                                        <p class="ms-1">{{__('ui.satira')}}</p>
                                                    </i>
                                                    <i class="{{ $image->medical }}  d-flex justify-content-center mx-3">
                                                        <p class="ms-1">{{__('ui.medicina')}}</p>
                                                    </i>
                                                    <i class="{{ $image->violence }}  d-flex justify-content-center mx-3">
                                                        <p class="ms-1">{{__('ui.violenza')}}</p>
                                                    </i>
                                                    <i class="{{ $image->racy }}  d-flex justify-content-center mx-3">
                                                        <p class="ms-1">{{__('ui.contammiccante')}}</p>
                                                    </i>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                </div>

                                <div class="col-12 ms-2 mt-3 p-3 text-center z-n1 ">

                                    <h4 class="mt-2">{{ $article->title }}</h4>
                                    <p>{{__('ui.inseritodamodal')}} {{ $article->user->name }}</p>
                                    <p>{{__('ui.prezzomodal')}} ${{ $article->price }}</p>
                                </div>

                                <div class="col-12 mt-3 p-3 text-center">
                                    <h3 class="">{{__('ui.descrizionemodal')}}</h3>
                                    <p class="mt-2">{{ $article->description }}</p>
                                </div>






                                <div class="modal-footer d-flex justify-content-start ">

                                    <div class="me-auto">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.chiudimodal')}}</button>
                                    </div>



                                    <form action="{{ route('revisor.decline.article', ['article' => $article]) }}" method="post" class="">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger">{{__('ui.rifiutamodal')}} <i class="fa-solid fa-xmark fa-2xs"></i></button>
                                    </form>

                                    <form action="{{ route('revisor.accept.article', ['article' => $article]) }}" method="post" class="">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success mx-1">{{__('ui.accettamodal')}} <i
                                                class="fa-solid fa-check fa-2xs"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="mt-5 text-center fw-bold display-1">{{ __('ui.noarticolirevisionare') }}</h2>
                    @endforelse
            </table>
        </div>
    </div>
</div>
