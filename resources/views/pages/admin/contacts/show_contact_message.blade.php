

@extends('layouts.app')

@section('content')      
          <div class="dashboard-container"> 
            <div class="dashboard-body">
             
              @include('includes.navbar3')
                           
              <div class="row no-gutter">
                
                <div class="col-sm-12" >                                    
                  <div class="dashboard-contents">
                   
                      <div class="dashboard-data">
                               
                              
                              <div class="card mr-3 p-3 bg-white rounded text-left ">
                                <div class="show-order-item mb-3">
                                  <small class="item-title font-weight-light">Contact Id</small><br>
                                  <span class="font2">{{$contact->id}}</span>
                                </div>
                                <div class="show-order-item mb-3">
                                  <small class="item-title">Sender Name</small><br>
                                  <span class="font2">{{$contact->name}}</span>
                                </div>
                                <div class="show-order-item mb-3">
                                  <small class="item-title"> Email</small><br>
                                  <span class="font2">{{$contact->email}}</span>
                                </div>
                                <div class="show-order-item mb-3">
                                  <small class="item-title font-weight-light">Created at</small><br>
                                  <span class="font2">{{$contact->created_at}}</span>
                                </div>
                                <div class="show-order-item mb-3">
                                  <small class="item-title font-weight-light">Updated at</small><br>
                                  <span class="font2">{{$contact->updated_at}}</span>
                                </div>
                                
                                                   
                              </div>      
                      
                  </div>
               </div>
              </div>             
          </div>      
        </div>
        </div>
        @include('includes.footer')
      
         
@endsection
    
        

 