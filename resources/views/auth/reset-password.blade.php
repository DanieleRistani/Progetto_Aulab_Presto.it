<x-layouts.app title="{{__('ui.reimpostapasstitle')}}">
    
    
    <section class="container mt-4 p-5 rounded-5" >
        <div class="row justify-content-center align-items-center ms-auto me-auto bg-custom-login-register" >

            <div class="col-12 col-md-6 my-auto">
                <img class="img-fluid "  src="/image/login.svg" alt="">
            </div>
            <div class="col-12 col-md-4 login-wrapper mt-5 d-flex flex-column justify-content-center align-items-center ms-4">
                <h2 class="fw-bold mb-5">{{__('ui.reimpostapass')}}!</h2>
                <form action="{{ route('password.update') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div class="input-group mb-3 ms-3">
                        <span class="input-group-text bg-transparent"><i class="fas fa-user fs-5"></i></span>
                        <input type="email" name='email'
                            class="form-control-lg login_input border-start-0 @error('email') is-invalid @enderror" placeholder="Email"
                            aria-label="Amount (to the nearest dollar)">
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

                    <div class="input-group mb-3 ms-3">
                        <span class="input-group-text bg-transparent"><i class="fas fa-key fs-5"></i></span>
                        <input type="password" name='password_confirmation'
                            class="form-control-lg login_input border-start-0 @error('password_confirmation') is-invalid @enderror" placeholder="{{__('ui.confermapass')}}"
                            aria-label="Amount (to the nearest dollar)">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-center me-2">
                        <button class="btn bg-sec btn-lg px-5 text-white text-uppercase fw-bold mt-5 btn-custom-sec" type="submit">{{__('ui.resettapass')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </section>



</x-layouts.app>
