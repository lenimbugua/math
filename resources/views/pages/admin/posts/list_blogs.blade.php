

@extends('layouts.app')

@section('content')      
<div class="container">
  <div class="client-login-card-header">
          <div class="d-flex justify-content-between">
                  <a  class="btn btn-link text-light" href="{{ route('home') }}">
                      {{ __('Home') }}                
                  </a>
                  <a  class="btn btn-link text-light" href="{{ route('admin.dashboard') }}">
                    <strong><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</strong>
                </a>
          </div> 
      </div>
  <div class="card mt-3 mb-5">
    <div id="table_div"></div>
  </div>
  <div style="margin-bottom: 50rem"></div>
</div>


          
        @include('includes.footer')
        <script type="text/javascript">
          var chartData = [];
      function getData (){

       
                      for(let value of posts.data){
                        let aOpen='<a class="text-dark" href="/blogposts/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([value.id, aOpen+value.title+aClose,value.created_at]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.list_blogs')
         @include('includes.js.element_visibility')
@endsection
    
        

 