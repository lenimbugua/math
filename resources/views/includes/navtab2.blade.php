<ul class="nav nav-tabs card-header-tabs d-flex justify-content-between"">
  <li class="nav-item">
        <a class="nav-link text-primary" href="/home">
           <i class="fas fa-layer-group"></i>Home
          
      </a>
  </li>

   


<div class="nav nav-tabs card-header-tabs">
  <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.griddashboard') }}">
           <i class="fas fa-th"></i>
          
      </a>
  </li>
  
  <li class="nav-item">
        <a class="nav-link active" href="{{ route('client.dashboard') }}">
         <i class="fas fa-list-ol"></i>
      </a>
    </li>
    
   
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-primary" href="{{ url('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        
      </div>
    </li>
  
</div>
          
        
    
    
</ul>
       
  
  
   
