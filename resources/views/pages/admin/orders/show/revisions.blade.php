@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div>
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{route('admin.dashboard')}}">Back</a>
          </li>
         
          
        </div>
        <div class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link text-whiten" href="/adminfunctions/{{$id}}">Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-whiten" href="{{ route('admin.showfiles') }}/{{$id}}">Files</a>
          </li>
          <li class="nav-item">
               <a class="nav-link active bg-active-grey" href="#">Revisions</a>
           </li>
        </div>
        <div class="nav nav-tabs card-header-tabs">
           
        </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
      <div class="revision-form-wrapper p-4">
        
         
        <h6>Revisions</h6>
        <div class="card mb-4">
         
            <div id="table_div"></div>
           
        </div>
        
      </div>
    </div>
  </div>
</div>

        
        
@include('includes.footer')
        <script type="text/javascript">
          var chartData = [];
      function getData (){

                      console.log(revisions);
                      for(let value of revisions){

                        let aOpen='<a class="text-dark" href="/adminrevision/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([aOpen+value.revision_count+aClose, aOpen+value.created_at+aClose]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.revision')
@endsection


 