@extends('layouts.app')

@section('content')
  <div class="card bg-black">
    <div class=" fixed-header fixed-top">
       <div class="card-header">
      @include('includes.navtab')
    </div>
    </div>
   
    <div class="card-body bg-greey">
      <div class="row no-gutter">
        <div class="col-2 bg-sidebar">
          @include('includes.sidebars.client_dashboard_sidebar')
        </div>
        <div class="col-10 pl-3">
          <div class="dashboard-data">
            <div class="row p-0 m-1">
            <div class="col-md-6"> {{$orders->links()}}</div>              
              <div class="col-md-6 d-flex justify-content-end">
                <form method="POST" action="{{ route('client.searchbyidgrid') }}" class="form-inline">
                    @csrf
                    <div class="form-group">
                    <input type="number" name="searchById" class="form-control" placeholder="Search By Id" required>
                  
                    <button type="submit" class="buttons btn btn-primary" style="height: 38px">Search</button>
                    </div>
                </form>
              </div>
              
            </div>
          @php 
            $numOfCols= 3;                                            
            $rowCount = 0;                          
            $count = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            
          @endphp
          
            @if ($orders->isEmpty()) 
               <div class="card">
                  <div class="card-body">
                    <h6 class="text-danger"> There are no Orders in this catgory <a href="{{ route('orders.create') }}">Create new order?</a></h6>
                  </div>
                </div>       
            @endif
            
            
            <div class="row">
              @foreach($orders as $order)
                                             
                            @php
                              $count++;
                                $deficit = $order->cost-$order->amount_paid;
                              session(['cost' => $order->cost]);
                              session(['id' => $order->id]);
                            @endphp

                           
                            <div class="card m-3" style="width:20rem">
                              
                                
                                <div class="card-body">
                                  <h5 class="card-title">
                                    <a href="{{ url('dashboard') }}/{{$order->id}}">Order #{{$order->id}}  </a>
                                    <a href="/orders/{{$order->id}}" class="float-right">
                                      <i class="fas fa-pen"></i>
                                    </a></h5>
                                  
                                    <div class="show-order-item mb-3">
                                      <div class="row">
                                        <div class="col-4">
                                         <small class="item-title">Subject</small>
                                      </div>
                                      <div class="col-8">{{$order->subject}}<br></div>
                                      </div>                                      
                                    </div>
                                    <div class="show-order-item mb-3">
                                      <div class="row">
                                        <div class="col-4">
                                         <small class="item-title">Created On</small>
                                      </div>
                                      <div class="col-8">{{$order->created_at}}<br></div>
                                      </div>
                                    </div>
                                    <div class="show-order-item mb-3">
                                      <div class="row">
                                        <div class="col-4">
                                         <small class="item-title">Deadline</small>
                                      </div>
                                      <div class="col-8">{{$order->deadline}}<br></div>
                                      </div>
                                    </div>
                                    <div class="show-order-item mb-3">
                                      <div class="row">
                                        <div class="col-4">
                                         <small class="item-title">Price</small>
                                      </div>
                                      <div class="col-8">{{$order->cost}}<br></div>
                                      </div>
                                    </div>
                                    <div class=" show-order-item mb-3">
                                      <div class="row">
                                          <div class="col-4">
                                           <small class="item-title">Pages</small>
                                        </div>
                                        <div class="col-8">
                                          {{$order->number_of_pages}}
                                        </div>
                                      </div>
                                    </div>
                                    <div class="show-order-item mb-3">
                                      <div class="row">
                                        <div class="col-4">
                                         <small class="item-title">Academic Level</small>
                                      </div>
                                      <div class="col-8">{{$order->academic_level}}<br></div>
                                      </div>
                                    </div>
                                    
                                  
                                  @if($order->progress==100)
                                    <div class="show-order-item mb-3">
                                        <small class="item-title">Progress</small>
                                        <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{!!$order->progress!!}" aria-valuemin="0" aria-valuemax="100" style="width: {!!$order->progress!!}%">
                                          {!!$order->progress!!}%
                                        </div>
                                    </div>
                                    Complete please download files below
                                    </div>
                                    
                                  
                                  @else
                                  <div class="show-order-item mb-3">
                                      <small class="item-title">Progress</small><br>
                                      <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{!!$order->progress!!}" aria-valuemin="0" aria-valuemax="100" style="width: {!!$order->progress!!}%">
                                      {!!$order->progress!!}%
                                    </div>

                                  </div>
                                      In progress
                                  </div>
                                  
                                  @endif
                                  
                                </div>
                                <div class="card-footer">
                                  <div class="row">
                                    <div class="col">
                                    @if($order->progress == 100)
                                        <a class="nav-link text-primary" href="{{ route('client.showfiles') }}/{{$order->id}}">Download Files</a>
                                         
                                    @endif
                                 </div>
                                 <div class="col">
                                    @if($order->amount_paid < $order->cost)
                                    @include('includes.modals.client_dashboard_payment_modal')
                                  @endif
                                 </div>
                                  </div>
                                 
                               </div>
                               
                               
                                   
                                  
                                   
                                 
                              </div>
                            
                         
                         @php
                           $rowCount++
                         @endphp                         
                            
                            @if($rowCount % $numOfCols == 0)
                                </div><div class="row">
                            @endif
                        @endforeach 
                        </div> {{-- {{$orders->links()}}  --}}
          </div>
          
             
          
        </div>
        
      </div>
    </div>
  </div>      
         
        
    @include('includes.footer')
    @include('includes.js.payment')
        

@endsection
