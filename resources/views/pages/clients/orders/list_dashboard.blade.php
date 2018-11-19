@extends('layouts.app')

@section('content')  

  <div class="card bg-black ">
    <div class=" fixed-header fixed-top">
      <div class="card-header">
        @include('includes.navtab2')
      </div>
  </div>
    <div class="card-body bg-greey">
      <div class="row ">
        <div class="col-md-2">
          @include('includes.sidebars.client_dashboard_sidebar_listlayout')
        </div>
        <div class="col-md-10">
          <div class="dashboard-data">
              <div class="row ">
                  <div class="col">{{$orders->links()}}</div>
                  <div class="col d-flex justify-content-end">
                     <form method="POST" action="{{ route('client.searchbyidlist') }}" class="form-inline">
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
                  
                    <div class="card mt-3">
                      @if ($orders->isEmpty()) 
                        <div class="card">
                          <div class="card-body">
                            <h6 class="text-danger"> There are no Orders in this catgory <a href="{{ route('orders.create') }}">Create new order?</a></h6>
                          </div>
                        </div>       
                      @endif
                      @foreach($orders as $order)
      
                          <?php
                            $count++;
      
                            session(['cost' => $order->cost]);
                            session(['id' => $order->id]);
                          ?>                   
                            
                            <div id="table_div"></div>                    
                          
                      @endforeach 
                                    
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
                let aOpen='<a class="text-dark" href="/dashboard/'+value.id+'">';
                let aClose='</a>';
                
                chartData.push([aOpen+value.subject+aClose, aOpen+value.academic_level+aClose, aOpen+value.deadline+aClose, aOpen+value.created_at+aClose, parseFloat(value.cost)]);
                
              }
              
    }
  </script>        
  @include('includes.js.table_view')
  @include('includes.js.element_visibility')
@endsection
    
        

 