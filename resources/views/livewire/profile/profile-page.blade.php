<div>
    <div class="container  ">

        <div class="row mt-5">

            <div class="row justify-content-between ms-3">

                <div class="col-12 col-md-5 mt-5 d-flex flex-column justify-content-center align-items-center  bg-transparent  align-items-start">
                    <img src="{{ Storage::url(auth()->user()->image) }}" class="img-custom-profile" alt="">
                    @if ($showModificaProfilo)
                        <button wire:click="renderModificaProfilo" class="btn btn-custom-acc mt-5">{{__('ui.nascondimodificadati')}}</button>
                    @else
                        <button wire:click="renderModificaProfilo" class="btn btn-custom-acc mt-5">
                            <a href="#modificaDati" class="nav-link">
                                {{__('ui.modificadati')}}
                            </a>
                        </button>
                    @endif
                </div>

                <div
                    class="col-12 col-md-6 mt-5 d-flex flex-column justify-content-center align-items-start profile-container-bg rounded-3 align-items-start">
                    <div class="col-12"></div>
                    <p class="fs-5">{{ __('ui.nomeprof') }}: <span class="fw-bold">{{ auth()->user()->name }}</span></p>
                    <p class="fs-5">{{__('ui.emailprof')}}: <span class="fw-bold">{{ auth()->user()->email }}</span></p>
                    <p class="fs-5">{{ __('ui.creatoilprof') }} <span
                            class="fw-bold">{{ date('d-m-Y', strtotime(Auth::user()->created_at)) }}</span>
                    </p>
                    @if (auth()->user()->email_verified_at)
                        <p class="fs-5">{{ __('ui.emailverificataprof') }} <span
                                class="fw-bold">{{ date('d-m-Y', strtotime(Auth::user()->email_verified_at)) }}</span></p>
                    @else
                        <p class="fs-5">{{ __('ui.emailverificataprof') }} <span class="fw-bold text-danger">
                                {{ __('ui.emailnonverificataprof') }}
                            </span></p>
                    @endif

                    @if (auth()->user()->is_revisor)
                        <p class="fs-5">{{ __('ui.revisoreprof') }} <i class="fa-solid fa-person-circle-check"></i> </p>
                    @endif
                    <div class=" star-font d-flex justify-content-center mt-2 ">
                        <p class="fs-5 me-2">{{ __('ui.recensioneutenteprof') }}:</p>

                        @if ($totalReviewsSeller->count() > 0)
                        {{ $this->createStar($totalReviewsSeller->sum('stars') / $totalReviewsSeller->count()) }}
                       @else
                        {{ $this->createStar(0) }}
                       @endif


                    </div>

                </div>

                
                <div class="col-12 col-md-5 mt-5 profile-container-bg  rounded-3">
                    
                    <h3 class="mt-2">{{ __('ui.ituoiarticoliprof') }}</h3>
                    
                    
                    <div class="tbl-header-p col-12 col-md-8">
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
                                        <p class="text-center">{{ __('ui.categoria') }}</p>
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
                                @forelse (auth()->user()->articles as $article)
                                    <tr>

                                        <td class="" scope="row">
                                            <p class="text-center">{{ $article->title }}</p>
                                        </td>
                                        <th class="" scope="row">
                                            <p class="text-center">{{ $article->price }}</p>
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
                                <p class="text-center">{{ __('ui.noarticolitrovati') }}</p>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
                <div class="col-12 col-md-6 mt-5 profile-container-bg rounded-3 text-center">
                    <h3>{{ __('ui.descrizioneform') }}</h3>
                    <p class="fs-6">{{ auth()->user()->description }}</p>
                </div>
                
                {{-- SEZIONE MODIFICA DATI PROFILIO --}}
                @if ($showModificaProfilo)
                    <div id="modificaDati" wire:transition class="container mb-5 mt-5">
                        <div class="row justify-content-between ms-3">
                            <div class="col-12 text-center">
                                <h2 class="fw-bold">{{ __('ui.modificadatiprof') }}</h2>
                            </div>


                            <div
                                class="col-12 col-md-5 mt-3 d-flex flex-column justify-content-end align-items-center pb-5 profile-container-bg rounded-3 ">
                                <h3 class="mt-2">{{ __('ui.immagineprof') }}</h3>

                                <form wire:submit="uploadProfileImageAndDesc" class="d-flex flex-column justify-content-between align-items-center">

                                    @if (!empty($image))
                                        <div class="img-preview-profile col-12  mb-5 d-flex flex-row justify-content-center align-items-center   "
                                            style="background-image: url({{ $image->temporaryUrl() }});">
                                        </div>
                                    @endif

                                    <div class=" w-100 mt-5 mt-md-0 ">
                                        <input wire:model="temporary_image" type="file" name="images"
                                            class="form-control  @error('temporary_image') is-invalid @enderror @error('temporary_image') is-invalid @enderror" />
                                    </div>

                                    <div class="d-flex justify-content-center mt-4">

                                        <button type="submit" class="btn bg-acc btn-custom-acc text-white">{{__('ui.salvaprof')}}</button>
                                    </div>

                                </form>
                            </div>


                            <div
                                class="col-12 col-md-5 mt-3 d-flex flex-column justify-content-center align-items-center pb-5 profile-container-bg rounded-3 ">
                                <h3 class="mt-2">{{ __('ui.descrizioneform') }}</h3>
                                <form wire:submit="uploadProfileDescription" class="d-flex flex-column justify-content-end align-items-center">

                                    <textarea wire:model="userDescription" class=" form-control form-control-sm @error('description') is-invalid @enderror " cols="70"
                                        rows="10"></textarea>


                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn bg-acc btn-custom-acc text-white">{{__('ui.salvaprof')}}</button>
                                    </div>

                                </form>
                            </div>

                            <div
                                class="col-12 col-md-5 mt-3 d-flex flex-column justify-content-center align-items-center pb-5 pt-3 profile-container-bg rounded-3 ">
                                <h3>{{ __('ui.infoprofilomodifica') }}</h3>
                                <livewire:profile.update-email-name-form />
                            </div>

                            <div
                                class="col-12 col-md-5  mt-3 d-flex flex-column justify-content-center align-items-center pb-5 pt-3 profile-container-bg rounded-3 ">
                                <h3>{{ __('ui.cambiapassprof') }}</h3>
                                <livewire:profile.update-password-form />
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="col-12 row-custom-profile">



                </div>


            </div>
        </div>

    </div>
</div>
