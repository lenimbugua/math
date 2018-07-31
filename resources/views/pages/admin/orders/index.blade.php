@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div>
            <div class="dashboard-container">
                <div class="dashboard-header">Dashboard</div>

                <div class="dashboard-body">                    
                    <div class="dashboard-contents">
                      <div class="dashboard-heading">
                        <div class="row justify-content-center">
                          <div class="col-sm-0.4">
                            <div class="data-cell"></div>
                          </div>
                          <div class="col-sm-2">
                            <div class="data-cell"><div class="buttons">Category</div></div>
                          </div>
                          <div class="col-sm-3">
                            <div class="data-cell">
                              <div class="buttons">Academic Level</div>
                            </div>                            
                          </div>
                          <div class="col-sm-1.6">
                            <div class="data-cell">
                              <div class="buttons">Deadline</div>
                            </div>                            
                          </div>
                          <div class="col-sm-3">
                            <div class="data-cell">
                              <div class="buttons">Instructions</div>
                            </div>                            
                          </div>
                          <div class="col-sm-2">
                            <div class="data-cell">
                              <div class="buttons">Date Created</div>
                            </div>                            
                          </div>                     
                        </div>
                      </div>
                      <div class="dashboard-data">
                        <?php
                          $count = 0;
                        ?>
                        @foreach($orders as $order)
                            <?php
                              $count++;
                            ?>
                            <div id="data-row" class="row justify-content-center">
                                <div class="col-sm-0.4">{{$count}}</div>
                                <div class="col-sm-2">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{{$order->category}}</a>
                                  </div>
                                </div>
                                
                                
                                <div class="col-sm-3">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{{$order->academic_level}}</a>
                                  </div>
                                </div>
                                
                                 <div class="col-sm-1.6">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{{$order->urgency}}</a>
                                  </div>
                                </div>
                                    
                                <div class="col-sm-3">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{!!$order->instructions!!}</a>
                                  </div>
                                </div>
                                    
                                <div class="col-sm-2">
                                  <div class="data-cell">
                                   <a href="orders/{{$order->id}}">{{$order->created_at}}</a>
                                  </div>
                                </div>                    
                                                       
                            </div>                                                          
                        @endforeach 
                        {{$orders->links()}}                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
