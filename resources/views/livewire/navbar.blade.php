<nav class="navbar navbar-expand-lg navbar-dark p-3 bg-blackcus fixed-top px-0" id="headerNav">
    <div class="container-fluid d-flex px-0 me-1">
        <a class="navbar-brand  d-lg-none px-0 ms-2" href="{{ route('home') }}">
            <img src="/image/logo-nav.png" height="80" data-aos="fade-right" />
        </a>
        <div class=" ms-auto me-1 mb-4">


            @if (Auth::user())
           <li class="navbar-brandnav-item dropdown nav-user-dropdownAfter  me-2 btn-nav-custom">
               @if (Auth::user()->is_revisor)
               <span class="badge bg-danger rounded-pill ms-4">
                {{ App\Models\Article::where('is_accepted',null)->where('user_id','!=',Auth::user()->id)->count() }}
               </span>
               <a class="nav-link mx-2 mt-2 dropdown-toggle "href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="fa-solid fa-user custom-user-icon "></i>
               </a>
               <ul class="dropdown-menu bg-main">
       
                   <li class="nav-item nav-user  rounded-1 my-1 li-hover-custom">
                       <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus d-flex justify-content-center align-items-center " href="{{ route('revisor.home') }}"
                           data-aos="fade-left">{{__('ui.dashboardnav')}}<span class="badge bg-danger rounded-pill counter-badge ms-2">
                            {{ App\Models\Article::where('is_accepted',null)->where('user_id','!=',Auth::user()->id)->count() }}
                        </span></a>
                   </li>
                   <li class="nav-item nav-user  rounded-1 my-1 li-hover-custom">
                    <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus" href="{{ route('profilo') }}"
                        data-aos="fade-left">{{__('ui.profilonav')}}</a>
                   </li>
                   <li class="nav-item nav-user  rounded-1 my-1 li-hover-custom">
                       <a class="nav-link btn-nav-custom  fs-6 mx-2  text-center text-whitecus" href="{{ route('article.create') }}"
                           data-aos="fade-left">{{__('ui.inserisciarticolonav')}}</a>
                   </li>
                 
                   <li class="nav-item nav-user  rounded-1 my-1 li-hover-custom">
                       <a class="nav-link  btn-nav-custom  fs-6  mx-2  text-center text-whitecus" data-aos="fade-left"
                           href="{{ route('home') }}">{{__('ui.homenav')}}</a>
                   </li>
                   <li  class="nav-item nav-user  rounded-1 d-flex justify-content-end my-1 li-hover-custom">  
                    <form action="{{ route('logout') }}" method="post" class="w-100 li-hover-custom">
                    @csrf
                        <a class="nav-livnk fs-6 " href="">
                                <button type="submit " class="btn  text-whitecus btn-nav-custom w-100 text-center">Logout
                                    <i class="fa-solid fa-right-from-bracket fa-1x text-whitecus "></i>
                                    
                                </button>
                        </a>
                    </form>
                </li>
       
                </ul>
              
               @elseif(Auth::user()->is_revisor==false)
                  
                  
               <a class="nav-link  dropdown-toggle user-margin btn-nav-custom me-2"
                   href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="fa-solid fa-user custom-user-icon "></i>
               </a>
               <ul class="dropdown-menu">
       
                  
                   <li class="nav-item nav-user  rounded-1 my-1">
                       <a class="nav-link btn-nav-custom  fs-6 mx-2  text-center text-whitecus li-hover-custom" href="{{ route('article.create') }}"
                           data-aos="fade-left">{{__('ui.inserisciarticolonav')}}</a>
                   </li>
                   <li class="nav-item nav-user  rounded-1 my-1 ">
                    <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus li-hover-custom" href="{{ route('profilo') }}"
                        data-aos="fade-left">{{__('ui.profilonav')}}</a>
                   </li>
                 
                   <li class="nav-item nav-user  rounded-1 my-1 ">
                       <a class="nav-link  btn-nav-custom  fs-6  mx-2  text-center text-whitecus li-hover-custom" data-aos="fade-left"
                           href="{{ route('home') }}">{{__('ui.homenav')}}</a>
                   </li>
                   <li  class="nav-item nav-user  rounded-1 d-flex justify-content-end my-1 ">  
                    <form action="{{ route('logout') }}" method="post" class="w-100 li-hover-custom">
                    @csrf
                        <a class="nav-livnk fs-6" href="">
                                <button type="submit " class="btn  text-whitecus btn-nav-custom w-100 text-center ">Logout
                                    <i class="fa-solid fa-right-from-bracket fa-1x text-whitecus "></i>
                                    
                                </button>
                        </a>
                    </form>
                   </li>
       
               </ul>
            
                @endif
       
                  
            </li>
           @endif
           @guest
           <ul class="navbar-nav ms-auto nav-user-dropdownAfter mt-3" data-aos="fade-down" >
            
                <li class="nav-item d-flex">
                    <a class="nav-link  btn-nav-custom custom-p-navbar @if (Route::currentRouteName() == 'register') text-sec fw-bold @endif" href="{{ route('register') }}"
                        data-aos="fade-left">{{__('ui.registratinav')}}</a>
                    <a class="nav-link mx-2 btn-nav-custom  custom-p-navbar @if (Route::currentRouteName() == 'login') text-sec fw-bold @endif" href="{{ route('login') }}"
                            data-aos="fade-left">{{__('ui.accedinav')}}</a>
                </li>

            </ul>

           @endguest

        </div>
        <li class="nav-item dropdown  language-drop-icon-nav">
            <a class="nav-link dropdown-toggle bg-transparent fs-5 language-drop-icon-nav"
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                
               
               
                @if(Config::get('app.locale') == 'it')
                <img src="/flag-img/ita.png" alt="" class="language-drop-icon-nav">
                @elseif(Config::get('app.locale') == 'en')
                <img src="/flag-img/eng.png" alt="" class="language-drop-icon-nav">
                @elseif(Config::get('app.locale') == 'de')
                <img src="/flag-img/de.png" alt="" class="language-drop-icon-nav">
                @endif
        
            </a>
            <ul class="bg-transparent border-0 dropdown-menu   ">
                
                        <li><x-_locale lang='it' nation='it'/></li>
    
                        <li><x-_locale lang='de' nation='de'/></li>
    
                        <li><x-_locale lang='en' nation='en'/></li>
                
            </ul>
        </li>
        
        
        <span class="navbar-toggler border-0  me-2 ms-4 navbar-toggler-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation"></span>
        

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            {{-- immagine --}}
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link mx-2" href="{{ route('home') }}">
                    <img src="/image/logo-nav.png" height="80" data-aos="fade-right" />
                </a>
            </li>
            <ul class="navbar-nav" data-aos="fade-down">
                <li class="nav-item">
                    <a class="nav-link mx-2 btn-nav-custom fs-5  @if (Route::currentRouteName() == 'home') text-sec fw-bold @endif " aria-current="page"
                        href="{{ route('home') }}">{{__('ui.homenav')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 btn-nav-custom fs-5 @if (Route::currentRouteName() == 'articoli') text-sec fw-bold @endif"
                        href="{{ route('articles.Index') }}">{{__('ui.articolinav')}}</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle btn-nav-custom fs-5 @if (Route::currentRouteName() == 'article.category.show') text-sec fw-bold @endif"
                        href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.categorienav')}}
                    </a>
                    <ul class="dropdown-menu bg-main">
                        @foreach ($categories as $category)
                            <li class="my-2 mx-2"><a class="dropdown-item text-whitecus li-hover-custom" href="{{ route('article.category.show', $category) }}">{{__("ui.$category->name")}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-2 btn-nav-custom fs-5 @if (Route::currentRouteName() == 'articoli') text-sec fw-bold @endif"
                        href="{{ route('lavoraConNoi') }}">{{__('ui.lavoraconnoinav')}}</a>
                </li>
             </ul>    
                {{-- REGISTER, LOGIN  --}}
            <ul class="navbar-nav ms-auto nav-user-dropdown " data-aos="fade-down" >
                @guest()
                    <li class="nav-item d-flex">
                        <a class="nav-link mx-2 btn-nav-custom fs-5 @if (Route::currentRouteName() == 'register') text-sec fw-bold @endif" href="{{ route('register') }}"
                            data-aos="fade-left">{{__('ui.registratinav')}}</a>
                        <a class="nav-link mx-2 btn-nav-custom  fs-5 @if (Route::currentRouteName() == 'login') text-sec fw-bold @endif" href="{{ route('login') }}"
                                data-aos="fade-left">{{__('ui.accedinav')}}</a>
                    </li>
    
                   
                @endguest
                
              
            </ul>

           {{-- USER NAVIGATION --}}
           <div class=" mb-3 me-5">


               @if (Auth::user())
              <li class="navbar-brandnav-item dropdown nav-user-dropdown btn-nav-custom">
                  @if (Auth::user()->is_revisor)
                      <span class="badge bg-danger rounded-pill ms-4">
                          {{ App\Models\Article::where('is_accepted',null)->where('user_id','!=',Auth::user()->id)->count() }}
                      </span>
                  <a class="nav-link dropdown-toggle "
                      href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user fa-2x"></i>
                  </a>
                  <ul class="dropdown-menu bg-main">
          
                      <li class="nav-item nav-user rounded-1 my-1 ">
                          <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus d-flex justify-content-center align-items-center li-hover-custom" href="{{ route('revisor.home') }}"
                              data-aos="fade-left">{{__('ui.dashboardnav')}} <span class="badge bg-danger rounded-pill counter-badge ms-2">
                                {{ App\Models\Article::where('is_accepted',null)->where('user_id','!=',Auth::user()->id)->count() }}
                            </span></a>
                      </li>
                      <li class="nav-item nav-user rounded-1 my-1">
                        <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus li-hover-custom" href="{{ route('profilo') }}"
                            data-aos="fade-left">{{__('ui.profilonav')}}</a>
                       </li>
                      <li class="nav-item nav-user rounded-1 my-1 ">
                          <a class="nav-link btn-nav-custom  fs-6 mx-2  text-center text-whitecus li-hover-custom" href="{{ route('article.create') }}"
                              data-aos="fade-left">{{__('ui.inserisciarticolonav')}}</a>
                      </li>
                    
                      <li class="nav-item nav-user  rounded-1 my-1 ">
                          <a class="nav-link  btn-nav-custom  fs-6  mx-2  text-center text-whitecus li-hover-custom" data-aos="fade-left"
                              href="{{ route('home') }}">{{__('ui.homenav')}}</a>
                      </li>
                      <li  class="nav-item nav-user rounded-1 d-flex justify-content-end my-1">  
                          <form action="{{ route('logout') }}" method="post" class="w-100 li-hover-custom">
                          @csrf
                              <a class="nav-livnk fs-6" href="">
                                      <button type="submit " class="btn  text-whitecus btn-nav-custom w-100 text-center">{{__('ui.logoutnav')}}
                                          <i class="fa-solid fa-right-from-bracket fa-1x text-whitecus "></i>
                                          
                                      </button>
                              </a>
                          </form>
                      </li>
          
                  </ul>
                 
                  @elseif(Auth::user()->is_revisor==false)
                     
                     
                  <a class="nav-link  dropdown-toggle mt-4 btn-nav-custom "
                      href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user fa-2x"></i>
                  </a>
                  <ul class="dropdown-menu bg-main">
          
                     
                      <li class="nav-item nav-user  rounded-1 my-1">
                          <a class="nav-link btn-nav-custom  fs-6 mx-2  text-center text-whitecus li-hover-custom" href="{{ route('article.create') }}"
                              data-aos="fade-left">{{__('ui.inserisciarticolonav')}}</a>
                      </li>
                      <li class="nav-item nav-user  rounded-1 my-1">
                        <a class="nav-link btn-nav-custom   fs-6 mx-2 text-center text-whitecus li-hover-custom" href="{{ route('profilo') }}"
                            data-aos="fade-left">{{__('ui.profilonav')}}</a>
                       </li>
                    
                      <li class="nav-item nav-user  rounded-1 my-1">
                          <a class="nav-link  btn-nav-custom  fs-6  mx-2  text-center text-whitecus li-hover-custom" data-aos="fade-left"
                              href="{{ route('home') }}">{{__('ui.homenav')}}</a>
                      </li>
                      <li  class="nav-item nav-user  rounded-1 d-flex justify-content-end my-1">  
                        <form action="{{ route('logout') }}" method="post" class="w-100 li-hover-custom">
                        @csrf
                            <a class="nav-livnk fs-6" href="">
                                    <button type="submit li-hover-custom" class="btn  text-whitecus btn-nav-custom w-100 text-center">{{__('ui.logoutnav')}}
                                        <i class="fa-solid fa-right-from-bracket fa-1x text-whitecus "></i>
                                        
                                    </button>
                            </a>
                        </form>
                    </li>
          
                  </ul>
               
                   @endif
          
                     
              </li>
              @endif

           </div>
            
           
            
           {{-- SEARCHBAR --}}
            <form action="{{ route('articles.search') }}" method="get" class="d-flex search-bar position-relative imput-seach" role="search">
                @csrf
                <input type="search" name='searched' placeholder="{{__('ui.cerca')}}" class="form-control position-relative w-75 " aria-label="search" />
                <button type="submit" class=" btn bg-acc btn-custom-acc mx-2 text-white position-absolute btn-search h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
           
        
            
        </div>
    </div>
</nav>
