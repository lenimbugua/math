

@extends('layouts.app')

@section('content')      
          <div class="dashboard-container"> 
            <div class="dashboard-body">
             
              @include('includes.navbar3')
                           
              <div class="row no-gutter">
                <div class="col-2 bg-sidebar p-3" >

                  <div class="shadow-sm rounded bg-sidebar " ">
                    
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
                        <i class="fas fa-list"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('admin.orders.all')}}">All</a>  
                      </li>
                      
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                        <i class="fas fa-check-square"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('admin.orders.settled')}}"> Settled orders</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                        <i class="fas fa-spinner"> </i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('admin.orders.inprogress')}}">In progress</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                        <i class="fas fa-hand-holding-usd"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('admin.orders.paid')}}">Paid</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                       <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('admin.orders.unpaid')}}">Unpaid</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                       <i class="fas fa-wrench"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('post.dashboard')}}">Admin Functions</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                       <i class="fas fa-users-cog"></i>&nbsp;&nbsp;<a class="text-whiten font1" href="{{route('users.index')}}">Users</a>  
                      </li> 
                      <li class="list-group-item client-side-menu-hover bg-sidebar">
                       <i class="fas fa-comments"></i> <a class="text-whiten font1" href="{{route('contactmessages.index')}}">Contact Messages</a>  
                      </li> 
                      
                    </ul>
                  </div>
                </div>
                <div class="col-sm-10" >                                    
                  <div class="dashboard-contents">
                   
                      <div class="dashboard-data">
                        <div class="row p-2">
                          <div class="col">{{$orders->links()}}</div>
                          <div class="col d-flex justify-content-end">
                             <form method="POST" action="{{ route('admin.searchbyidlist') }}" class="form-inline">
                              @csrf
                              <div class="form-group">
                              <input type="number" name="searchById" class="form-control" placeholder="Search By Id" required>
                            
                              <button type="submit" class="buttons btn btn-primary" style="height: 38px">Search</button>
                              </div>
                          </form>
                          </div>
                        </div>
                         
                        <?php
                          $count = 0;
                        ?>
                        
                          <div class="card">
                        @foreach($orders as $order)

                            <?php
                              $count++;

                              session(['cost' => $order->cost]);
                              session(['id' => $order->id]);
                            ?>

                            
                              
                              <div id="table_div"></div>
                            
                            
                        @endforeach 
                                          
                      </div>
                      <div class="pt-3">
                         
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>             
          </div>      
        </div>
        
        @include('includes.footer')
        <script type="text/javascript">
          var chartData = [];

      function getData (){

       
                      for(let value of orders.data){
                        let aOpen='<a class="text-dark" href="/adminfunctions/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([aOpen+value.subject+aClose, aOpen+value.academic_level+aClose, aOpen+value.deadline+aClose, value.created_at, parseFloat(value.cost)]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.table_view')
         @include('includes.js.element_visibility')
@endsection
    
        

 