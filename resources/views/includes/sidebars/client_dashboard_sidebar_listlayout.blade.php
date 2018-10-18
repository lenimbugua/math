
<div class="shadow-sm rounded bg-sidebar long-card" >
  
  <ul class="list-group list-group-flush bg-sidebar">
  	<li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-plus mr-2"></i> <a href="{{'/orders/create'}}">New Order</a> 
    </li>
    
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-list mr-2"></i> <a href="{{ route('client.dashboard') }}">All orders</a>  
    </li>
    
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-check mr-2"></i> <a href="{{ route('client.settled.orders.list') }}"> Settled orders</a> 
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-spinner mr-2"> </i><a href="{{ route('client.inprogress.orders.list') }}"> In progress</a> 
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
      <i class="fas fa-hand-holding-usd mr-2"></i> <a href="{{ route('client.payed.orders.list') }}">Paid orders</a>  
    </li>
    <li class="list-group-item client-side-menu-hover bg-sidebar">
     <i class="fas fa-question mr-2"></i> <a href="{{ route('client.unpayed.orders.list') }}">Unpaid orders</a>  
    </li>
    
  </ul>
</div>
