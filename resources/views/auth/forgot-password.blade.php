<x-layouts.app title="{{__('ui.forgotpassword')}}">


    <section class="container mt-4 p-5 rounded-5">
        <div class="row justify-content-center align-items-center ms-auto me-auto bg-custom-login-register">
            @if (session('status'))
                <div class=" alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-12 col-md-5 my-auto">
                <img class="img-fluid " src="/image/login.svg" alt="">
            </div>

            <div class="col-12 col-md-7 login-wrapper mt-5 ">
                <div class="mb-3 ms-3 text-center">
                    <h2 class="fw-bold fs-1">{{__('ui.passdimenticata')}}?</h2>
                    <p>{{__('ui.passdimenticatatesto')}}</p>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <label for="email" class="form-label fw-bold">{{__('ui.passdimenticataemail')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button class="btn bg-sec text-white text-uppercase fw-bold btn-custom-sec mt-3" type="submit">{{__('ui.invia')}}</button>
                    </form>
                </div>
            </div>

        </div>
    </section>



</x-layouts.app>
