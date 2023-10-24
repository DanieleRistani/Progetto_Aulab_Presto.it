
    <form wire:submit="updateProfile" class="w-100">
        <div class="form-group">
            <label><strong>{{__('ui.nomeprof')}}:</strong></label>
            <input type="text" wire:model="name" class="form-control  @error('name') is-invalid @enderror" placeholder="{{__('ui.nuovonomeprof')}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label><strong>{{__('ui.emailprof')}}: </strong></label>
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('ui.nuovaemailprof')}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label><strong>{{__('ui.passattualeprof')}}:</strong></label>
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('ui.passattualeprof')}}">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="d-flex justify-content-center">
             
             <button class="ms-2 mt-4 btn bg-acc btn-custom-acc text-whitecus">{{__('ui.salvaprof')}}</button>
         </div>
    </form>
