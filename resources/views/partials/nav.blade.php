   <!-- Left navbar links -->
   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
   <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('home')}}" class="nav-link">{{__('Home')}}</a>
    </li>
   
  </ul>

  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-globe"></i>
        
      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        @foreach (App\Language::all() as $language)
      <a href="#" onclick="changeLanguage('{{$language->locale}}')" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                {{$language->name}}
              </h3>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <hr>
        @endforeach
      </div>
    </li>

    
    <li class="nav-item">
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link"> <i class="fas fa-sign-out-alt"></i> </a>
    </li>
    
  </ul>