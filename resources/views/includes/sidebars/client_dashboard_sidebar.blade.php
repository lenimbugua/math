
<div class="shadow-sm rounded bg-sidebar" >
  
  <ul class="list-group list-group-flush bg-sidebar">
    <li class="nav-item dropdown list-group-item client-side-menu-hover bg-sidebar bg-sidebar-first">
      <a class="nav-link dropdown-toggle text-dark font1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-list mr-2"></i> <a class="text-whiten font1" href="{{ route('client.dashboard') }}">All orders</a>  
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar ">
      <i class="fas fa-plus mr-2"></i> <a class="text-whiten font1" href="{{'/orders/create'}}">New Order</a> 
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-check mr-2"></i> <a class="text-whiten font1" href="{{'/settled'}}"> Settled orders</a> 
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-spinner mr-2"> </i><a class="text-whiten font1" href="{{'/inprogress'}}"> In progress</a> 
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-hand-holding-usd mr-2"></i> <a class="text-whiten font1" href="{{'/paid'}}">Paid orders</a>  
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
     <i class="fas fa-question mr-2"></i> <a class="text-whiten font1" href="{{'/unpaid'}}">Unpaid orders</a>  
    </li>
    
  </ul>
</div>
