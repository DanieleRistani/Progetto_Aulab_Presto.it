<form class="d-inline" action={{route('setLocalLanguage',$lang)}} method='get'>
    @csrf
    <button type="submit" class="border-0 bg-transparent  ms-1 d-flex ">
       <img src="{{asset('vendor/blade-flags/language-'.$lang.'.svg')}}" alt="" class="language-dropdown-icon mt-1 mt-md-0"><p class="ms-2 p-nav-lang">@if($lang=='it') ITA @elseif($lang=='de') DE @else ENG @endif</p> 
    </button>
   
</form>