<div class="col-12 col-md-10 col-lg-6 mx-auto mt-5">
    <form class="card-body p-5 text-center" wire:submit="store">
        <div class="mb-md-5 mt-md-4 pb-5">

            <h2 class="fw-bold mb-5 text-uppercase font_custom">{{ __('ui.inserisciannuncioform') }}</h2>

            

            <div class="row ">
                <div class="col-12 col-md-6">
                    <div class="form-outline form-white mb-4">
                        <input type="text" wire:model="title" class="form-control form-control-lg @error('title') is-invalid @enderror"
                            placeholder="{{ __('ui.titoloarticoloplace') }}" />
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text fs-5">$</span>
                        <input type="number" wire:model="price" class="form-control form-control-lg @error('price') is-invalid @enderror"
                            placeholder="{{ __('ui.prezzoarticoloplace') }}" />
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                </div>

                <div class="col-12 col-md-6">
                    <div class="form-outline form-white mb-4">
                        <select wire:model="category_id" class="form-select form-select-lg @error('category_id') is-invalid @enderror">
                            <option value="">{{ __('ui.selezionacat') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 ">
                        <div class="form-outline form-white mb-4">
                            <input multiple type="file" wire:model="temporary_images" name="images"
                                class="form-control form-control-lg @error('temporary_images.*') is-invalid @enderror @error('temporary_images') is-invalid @enderror" />
                            @error('temporary_images.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('temporary_images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>





                    </div>




                </div>
                @if (!empty($images))
                    <div class="col-12 d-flex justify-content-center  ">

                        <div class="row custom-preview-row form-control ">
                            <p class="fs-5 ">{{ __('ui.previewimmagini') }}</p>
                            <div class="col-12 mb-4">

                                <div class="row">
                                    @foreach ($images as $key => $image)
                                        <div class="col">
                                            <div class="img-preview mx-auto shadow rounded mt-3"
                                                style="background-image: url({{ $image->temporaryUrl() }});"> <button type="button"
                                                    class="  button-preview" wire:click="removeImage({{ $key }})">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button></div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                <div class="col-12 ">
                    
                    <div class="form-outline form-white my-4 "  >
                        <span class="fs-5">{{ __('ui.descrizioneform') }}</span>
                        <textarea wire:model="description"  class=" form-control form-control-lg @error('description') is-invalid @enderror " cols="30"
                        rows="10"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                </div>
               



            </div>
        </div>

        <button class="btn bg-sec text-whitecus btn-custom-sec btn-lg px-5" type="submit">{{ __('ui.inserisciannuncioform') }}</button>

    </form>
    
  

</div>
