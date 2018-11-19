


@extends('layouts.app')

@section('content')      
          <div class="dashboard-container"> 
            <div class="dashboard-body">
             
              @include('includes.navbar3')
                           
              <div class="row no-gutter">
                
                <div class="col-sm-12" >                                    
                  <div class="dashboard-contents">
                   
                      <div class="dashboard-data">
                        <div class="row p-2">
                          <div class="col">{{$contacts->links()}}</div>
                          <div class="col d-flex justify-content-end">
                             <form method="POST" action="{{ route('contacts.searchByEmail') }}" class="form-inline">
                              @csrf
                              <div class="form-group">
                              <input type="email" name="searchByEmail" class="form-control" placeholder="Search By Email" required>
                            
                              <button type="submit" class="buttons btn btn-primary" style="height: 38px">Search</button>
                              </div>
                          </form>
                          </div>
                        </div>
                         
                        
                        
                          <div class="card">
                       

                            
                              
                              <div id="table_div"></div>
                            
                            
                        
                                          
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

       
                      for(let value of contacts.data){
                        let aOpen='<a class="text-dark" href="/contactmessages/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([value.id, aOpen+value.email+aClose,value.phone, value.created_at]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.list_contact_messages')
         @include('includes.js.element_visibility')
         
@endsection
    
        

 












