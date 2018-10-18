

@extends('layouts.app')

@section('content')      
          <div class="dashboard-container"> 
            <div class="dashboard-body">
             
              @include('includes.navbar3')
                           
              <div class="row">
                <div class="col-sm-2" >
                  <div class="card" ">
                    
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-list"></i>&nbsp;&nbsp;<a href="{{route('admin.orders.all')}}">All</a>  
                      </li>
                      
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-check-square"></i>&nbsp;&nbsp;<a href="{{route('admin.orders.settled')}}"> Settled orders</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-spinner"> </i>&nbsp;&nbsp;<a href="{{route('admin.orders.inprogress')}}">In progress</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-hand-holding-usd"></i>&nbsp;&nbsp;<a href="{{route('admin.orders.payed')}}">Payed</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                       <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;<a href="{{route('admin.orders.unpayed')}}">Unpayed</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                       <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;<a href="{{route('post.dashboard')}}">Admin Functions</a>  
                      </li>  
                      
                    </ul>
                  </div>
                </div>
                <div class="col-sm-10" >                                    
                  <div class="dashboard-contents">
                   
                      <div class="dashboard-data">

                        <?php
                          $count = 0;
                        ?>
                        Go to page {{$orders->links()}}
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
                        
                        chartData.push([aOpen+value.category+aClose, aOpen+value.academic_level+aClose, aOpen+value.urgency+aClose, value.created_at, parseFloat(value.cost)]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.table_view')
         @include('includes.js.element_visibility')
@endsection
    
        

 