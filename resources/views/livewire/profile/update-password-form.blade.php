
    <form wire:submit="updatePassword" class="w-100">
        <div class="form-group">
            <label><strong>{{__('ui.nuovapassprof')}}:</strong></label>
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('ui.nuovapassprof')}}">
            @error('nuovaPassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label><strong>{{__('ui.ripetinuovapassprof')}}:</strong></label>
            <input type="password" wire:model="repeatnuovaPassword" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{__('ui.ripetinuovapassprof')}}">
            @error('repeatnuovaPassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label><strong>{{__('ui.passattualeprof')}}:</strong></label>
            <input type="password" wire:model="actualPassword" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('ui.passattualeprof')}}">
            @error('actualPassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="d-flex justify-content-center">

            <button class="ms-2 mt-4 btn bg-acc btn-custom-acc text-whitecus">{{__('ui.salvaprof')}}</button>

        </div>
    </form>

