<div>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark container-fluid">
        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Presto S.P.A</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto fHr" />
                        <div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, aliquam blanditiis odit, ad quas voluptatibus
                                cumque, optio soluta?</p>
                        </div>
                        <section class="mb-4 text-center text-lg-start">
                            <a class="btn btn-floating m-1 btn-custom-acc" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-floating m-1 btn-custom-acc" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-floating m-1 btn-custom-acc" href="#!"><i class="fab fa-tiktok"></i></a>
                            <a class="btn btn-floating m-1 btn-custom-acc" href="#!"><i class="fab fa-instagram"></i></a>
                        </section>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.categoriepop') }}</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto fHr" />
                        <p>
                            <a href="{{ route('article.category.show', $veicoli) }}" class="text-dark fNodec">{{ __('ui.Veicoli') }}</a>
                        </p>
                        <p>
                            <a href="{{ route('article.category.show', $mobiles) }}" class="text-dark fNodec">{{ __('ui.Mobiles') }}</a>
                        </p>
                        <p>
                            <a href="{{ route('article.category.show', $elettronica) }}" class="text-dark fNodec">{{ __('ui.Elettronica') }}</a>
                        </p>
                        <p>
                            <a href="{{ route('article.category.show', $moda) }}" class="text-dark fNodec">{{ __('ui.Moda') }}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.linkutili') }}</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto fHr" />
                        <p>
                            <a href="{{ route('profilo') }}" class="text-dark fNodec">{{ __('ui.profilo') }}</a>
                        </p>
                        <p>
                            <a href="{{ route('lavoraConNoi') }}" class="text-dark fNodec">{{ __('ui.lavconnoi') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-dark fNodec">{{ __('ui.tec') }}</a>
                        </p>

                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.contatti') }}</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto fHr" />
                        <p><i class="fas fa-home mr-3"></i> Strada S. Giorgio Martire, 2D, 70124 Bari BA
                            <span>
                                <a target="_blank" class="nav-link text-primary d-inline fMarked"
                                    href="https://www.google.com/maps/dir/45.0704362,7.6681022/aulab/@43.1828182,6.9818106,6z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x1347e8bcca130e17:0x47ce9d5124576e73!2m2!1d16.8501748!2d41.1168417?entry=ttu">{{ __('ui.trovaci') }}
                                </a>
                            </span>
                        </p>
                        <p><i class="fas fa-envelope mr-3"></i> info@aulab.it</p>
                        <p><i class="fas fa-phone mr-3"></i>
                            <span>
                                <a target="_blank" class="nav-link text-primary d-inline fMarked"
                                    href="https://api.whatsapp.com/send/?phone=393339513967&text=Ciao%21+Vorrei+avere+maggiori+informazioni&type=phone_number&app_absent=0">+39
                                    392 602 4621
                                </a>
                            </span>
                        </p>
                        <p><i class="fas fa-phone mr-3"></i> 800 128 626</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center mb-3">© 2023 Copyright: <info class="fMarked">Presto S.P.A. - P.Iva 123456789</info>
        </div>
    </footer>
    <!-- Footer -->

</div>
