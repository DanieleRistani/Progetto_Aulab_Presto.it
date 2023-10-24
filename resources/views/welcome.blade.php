<x-layouts.app title='Homapage'>
    <header class="bg-custom-header2 z-1 ">
        <div class="container-fluid ">
            <div class="row flex-column bg-custom-header">
                <div class="col-12 d-flex justify-content-center flex-column  align-items-center me-5 mt-5">
                    <h1 class="text-blackcus custom-h1-header" data-aos="fade-down" data-aos-duration="1500">PRESTO.IT</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="1500">{{__('ui.ovunque')}}</h2>
                </div>
            </div>
        </div>

        <div class="my-0 px-0 py-0 bg-sphere" id="wrapper" data-aos="zoom-in-right" data-aos-duration="2000"></div>


        <div class="container-fluid  mt-0">
            <div class="row ">
                <div class="col-12 d-flex justify-content-center align-items-center  mt-5 mt-sm-0 flex-column mb-5" data-aos="fade-up"
                    data-aos-duration="1500">
                  <!--  <h3 class="mt-sm-5">Inizia a vendere anche tu!</h3> -->
                  <h3 class="mt-sm-5">{{__('ui.vendianchetu')}}</h3>


                    <a href="{{ route('article.create') }}">
                        <button class="btn bg-main btn-lg text-whitecus btn-custom-acc">{{__('ui.inserisciannuncio')}}</button>
                    </a>



                </div>
            </div>
        </div>
        </div>
    </header>
    
    
    <div class="container-fluid">
        <div class="row bg-home2 justify-content-center align-items-center ">

            <div class="text-center my-5">
                <h2 class="fw-bold display-4">{{__('ui.sceglicat')}}</h2>
            </div>
            @foreach ($categories as $category)
                <div class="col-5 col-md-3 col-lg-2 d-flex d-flex justify-content-center align-items-center  flex-column my-2 mx-2 ">

                    <a href="{{ route('article.category.show', $category) }}" class=' nav-link bg-category d-flex flex-column align-items-center'>

                        <img src="/imgCategory/{{ $category->name }}.png" alt="" class="mt-2 bg-img">
                        <p class="mt-2 fs-5 fw-bold text-center">{{__("ui.$category->name")}}</p>

                    </a>



                </div>
            @endforeach


        </div>
    </div>

    <div class="container-fluid bg-home3">
        <div class="row justify-content-center ">
            <h2 class="display-1 text-center fw-bold mt-5">{{__('ui.nuoviart')}}</h2>
            <div class="col-10 mt-5 ">
              
                <livewire:home-swiper />


            </div>
        </div>
    </div>


</x-layouts.app>
