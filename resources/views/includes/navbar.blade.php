<div class="navbar-wrapper fixed-top" id="scrolled">
  <div class="row">
    <div class="col-4">
      <div class="logo-wrapper">
        <h2 class="text-light"><i class="fas fa-layer-group"></i></h2>        
      </div>          
    </div>
      <div class="col-8 d-flex justify-content-end">
        <nav class="navbar navbar-expand-lg " >
        <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li>
                    <a class="nav-link" href="{{ route('about') }}">
                      <i class="fas fa-info-circle"></i> About
                  </a>
                </li>
                <li class="nav-item dropdown">
                    
                  <a class="nav-link nav-links-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fab fa-stripe-s"></i>ervices 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('math.blog')}}">Math</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('statistics.blog')}}">Statistics</a>                   
                      <a class="dropdown-item" href="{{route('accounting.blog')}}">Accounting</a>
                    </div>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('all.blogs') }}">
                      <i class="fas fa-th"></i> Blog
                  </a>
                </li>
                
                @guest
                 <li class="nav-item dropdown">
                    <a class="nav-link nav-links-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user-graduate"></i> Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                     @include('includes.nav-login')
                    </div>
                 </li>
                <li>
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-edit"></i> Register</a>
                </li>
                @else
                <a class="nav-link" href="{{route('client.dashboard') }}">
                      <i class="fas fa-tachometer-alt"></i> My Orders
                  </a>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    
                  </div>
                </li>        
                    
                @endguest
                <li>
                    <a class="nav-link" href="{{ route('contacts') }}">
                      <i class="fas fa-phone-volume rotate">&nbsp;&nbsp;</i>Contact Us
                  </a>
                </li>
                
            </ul>
        </div>
   </nav>
  </div>  
</div>   
</div>