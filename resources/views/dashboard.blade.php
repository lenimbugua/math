@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="row no-gutter">
      <div class="col-sm-2">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header">Header</div>         
            <ul class="list-group list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
          
        </div>
      </div>
      <div class="col-sm-10">
            <div class="dashboard-container">   
                @component('components.who')
                    
                @endcomponent
                <div class="dashboard-body">                    
                    <div class="dashboard-contents">
                      <div class="dashboard-heading">
                        <div class="row no-gutter">
                          <div class="col-sm-1">
                            <div class="data-cell"></div>
                          </div>
                          <div class="col-sm-2">
                            <div class="data-cell"><div class="buttons">Category</div></div>
                          </div>
                          <div class="col-sm-2">
                            <div class="data-cell">
                              <div class="buttons">Academic Level</div>
                            </div>                            
                          </div>
                          <div class="col-sm-2">
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
                            <div id="data-row" class="row no-gutter">
                                <div class="col-sm-1">{{$count}}</div>
                                <div class="col-sm-2">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{{$order->category}}</a>
                                  </div>
                                </div>
                                
                                
                                <div class="col-sm-2">
                                  <div class="data-cell">
                                    <a href="orders/{{$order->id}}">{{$order->academic_level}}</a>
                                  </div>
                                </div>
                                
                                 <div class="col-sm-2">
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
                        {{-- {{$orders->links()}}  --}}                       
                      </div>
                    </div>
                </div>
            </div>
        </div>
   
      
    </div>
    
        

@endsection
