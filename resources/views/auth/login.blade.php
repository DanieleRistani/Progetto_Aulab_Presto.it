<x-layouts.app title="{{__('ui.logintitle')}}">


    <section class="container mt-4 p-5 rounded-5 mb-5">
        <div class="row mb-5 justify-content-center align-items-center ms-auto me-auto bg-custom-login-register">

            <div class="col-12 col-md-6 my-auto">
                <img class="img-fluid " src="/image/login.svg" alt="">
            </div>
            <div class="col-12 col-md-4 login-wrapper mt-5 ">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3 ms-3">
                        <span class="input-group-text bg-transparent"><i class="fas fa-user fs-5"></i></span>
                        <input type="email" name='email' class="form-control-lg login_input border-start-0 @error('email') is-invalid @enderror"
                            placeholder="Email" aria-label="Amount (to the nearest dollar)">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3 ms-3">
                        <span class="input-group-text bg-transparent"><i class="fas fa-key fs-5"></i></span>
                        <input type="password" name='password'
                            class="form-control-lg login_input border-start-0 @error('password') is-invalid @enderror" placeholder="password"
                            aria-label="Amount (to the nearest dollar)">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="ms-3">
                        <p class="mb-0 font_custom text-sec ">{{ __('ui.noaccount') }}?
                            <a href="{{ route('register') }}"class="text-blackcus fw-bold font_custom ">{{ __('ui.registrati') }}</a>
                        </p>

                        <p class="mb-0 font_custom text-sec ">{{ __('ui.noricordipass') }}
                            <a href="{{ route('password.request') }}"class="text-blackcus fw-bold font_custom ">{{ __('ui.recuperapass') }}</a>
                        </p>
                    </div>


                    <div class="d-flex justify-content-center me-2">
                        <button class="btn bg-sec btn-lg px-5 text-white text-uppercase fw-bold mt-5 btn-custom-sec"
                            type="submit">{{ __('ui.loginbtn') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </section>



</x-layouts.app>
