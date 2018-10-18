@extends('layouts.app')

@section('content')      
          <div class="dashboard-container"> 
            <div class="dashboard-body">
              @include('includes.navbar3')               
              <div class="row no-gutter">
                <div class="col-2" >
                  <div class="card long-card" >
                    
                    <ul class="list-group list-group-flush">
                      
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-luggage-cart"></i> <a href="{{route('admin.orders.all.gridlayout')}}">All orders</a>  
                      </li>
                      
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-check-square"></i> <a href="{{route('admin.orders.settled.gridlayout')}}"> Settled orders</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-spinner"> </i><a href="{{route('admin.orders.inprogress.gridlayout')}}"> Orders in progress</a> 
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                        <i class="fas fa-hand-holding-usd"></i> <a href="{{route('admin.orders.payed.gridlayout')}}">Payed orders</a>  
                      </li>
                      <li class="list-group-item client-side-menu-hover">
                       <i class="fas fa-money-check-alt"></i> <a href="{{route('admin.orders.unpayed.gridlayout')}}">Unpayed orders</a>  
                      </li>
                      
                    </ul>
                  </div>
                </div>
                <div class="col-10" >                                    
                    <div class="dashboard-contents">
                     
                        <div class="dashboard-data">                        
                        @php 
                          $numOfCols= 3;                                            
                          $rowCount = 0;                          
                          $count = 0;
                          $bootstrapColWidth = 12 / $numOfCols;
                        @endphp
                        <div class="row no-gutter">                   
                             @if ($orders->isEmpty()) 
                             <div class="card">
                                <div class="card-body">
                                  <h6 class="text-danger"> There are no Orders in this catgory</h6>
                                </div>
                              </div>
                               
                         
                          @endif 
                          
                        @foreach($orders as $order)
                                             
                            @php
                              $count++;

                              session(['cost' => $order->cost]);
                              session(['id' => $order->id]);
                            @endphp
                          <div class="col-md-4"> 
                            <div class="card mb-3" style="width: 18rem;">
                              <div class="pl-card-header">
                                
                              </div>
                                
                                <div class="card-body">
                                  @include('includes.modals.admin_edit_progress')
                                  <p class="card-text">
                                    <small><strong>created</strong> {{$order->created_at}}</small><br>
                                    <small><strong>cost</strong> {{$order->cost}}</small><br> 
                                    <small><strong>No. of Questions</strong> {{$order->number_of_questions}}</small><br>   <small><strong>Eduction Level</strong> {{$order->academic_level}}</small><br>                   
                                                      
                                  </p>
                                  <hr>
                                  
                                  <small> 
                                    <i class="fas fa-user-graduate" style="color: blue "></i> <strong>{{$order->user->name}}</strong> Email:<strong>{{$order->user->email}}</strong>
                                  </small>

                                  <small><strong>Progress</strong></small>
                                    <div class="progress">
                                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{!!$order->progress!!}" aria-valuemin="0" aria-valuemax="100" style="width: {!!$order->progress!!}%">
                                    {!!$order->progress!!}%
                                  </div>
                                    </div>
                                    
                                  
                                </div>

                               <hr>
                               <div class="row">
                                 <div class="col">
                                   
                                 </div>
                                 <div class="col">
                                    
                                    @include('includes.modals.admin_download_modal')
                                   
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
                        {{-- {{$orders->links()}}  --}}                       
                      </div> 
                    </div>
                  </div>
                </div>
              </div>             
            </div>
          </div>
    @include('includes.js.element_visibility')  
    @include('includes.footer')
    @include('includes.js.payment')
        

@endsection
