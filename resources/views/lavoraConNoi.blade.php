<x-layouts.app title="{{__('ui.lavoraconnoititle')}}">
    
    
    <section class="container mt-4 p-5 rounded-5" >
        <div class="row justify-content-center align-items-center ms-auto me-auto bg-custom-login-register" >

            <div class="col-12 col-md-5 my-auto">
                <img class="img-fluid "  src="/image/lavoraconnoi.png" alt="">
            </div>
            <div class="col-12 col-md-7 login-wrapper mt-5 ">
                    <div class="mb-3 ms-3 text-center">
                        <h2 class="fw-bold display-1">{{__('ui.lavoraconnoi')}}</h2>
                        <p>{{__('ui.lavoraconnoitesto1')}}<span class="text-sec fw-bold"> Presto.it </span>{{__('ui.lavoraconnoitesto2')}}</p>
                    </div>

                    <div class="mb-3 ms-3 d-flex justify-content-center ">
                        <a href="{{route('richiesta.revisore')}}">
                            <button class="btn bg-sec btn-lg text-white text-uppercase fw-bold mt-5 btn-custom-sec" type="submit">{{__('ui.inviarichiestarevisore')}}</button>
                        </a>
                    </div>
            </div>

        </div>
    </section>



</x-layouts.app>
