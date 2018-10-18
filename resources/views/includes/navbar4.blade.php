
  <div class="row">
    <div class="col-4">
      <a href="/home">
        <div class="logo-wrapper">
          <h2 class="text-light"><i class="fas fa-layer-group"></i></h2>        
        </div> 
      </a>
               
    </div>
      <div class="col-8 d-flex justify-content-end">
        <nav class="navbar navbar-expand-lg " >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li>
                    <a class="nav-link" href="{{ route('client.griddashboard') }}">
                       <i class="fas fa-th"></i>
                      
                  </a>
              </li>
              
              <li>
                    <a class="nav-link" href="{{ route('client.dashboard') }}">
                     <i class="fas fa-list-ol"></i>
                  </a>
                </li>
                
               
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    
                  </div>
                </li>        
                    
                
                
            </ul>
        </div>
   </nav>
  </div>  
</div>   
