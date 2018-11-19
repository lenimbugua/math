@extends('layouts.app')
@section('content')
<div class="card text-center  ">
  <div class=" fixed-header fixed-top">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
    <div >
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{route('client.dashboard')}}">Back</a>
      </li>
     
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link text-whiten" href="/dashboard/{{$id}}">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-whiten" href="{{ route('client.showfiles') }}/{{$id}}">Files</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('client.ordermessages') }}/{{$id}}">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('chat',['id'=>$id]) }}">Chat</a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link active bg-active-grey" href="#">Revisions</a>
      </li>
      
    </div>
    <div class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        
      </li>
      
    </div>
  </ul>
  </div>
</div>
  <div class="card-body bg-greey message-body">
    <div class="container">
      <div class="revision-form-wrapper p-4">
        
         
        <h6>Revisions</h6>
        <div class="card mb-4">
          @if($revisions!=null)
            <div id="table_div"></div>
            @if($revision_count<=2)
              <div> <a href="{{ route('revisions.create',['id'=>$id]) }}"> Submit another Revision Request</a></div>
            @else
              <div class="text-danger"> You have exhausted revision requests</div>
              <div> <a href="{{ route('orders.create') }}">Create a new order?</a></div>
            @endif
          @else
          <div class="text-danger"> You have 0 revision request</div>
          <div> <a href="{{ route('revisions.create',['id'=>$id]) }}"> Submit a Revision Request</a></div>
          @endif
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

                        let aOpen='<a class="text-dark" href="/revision/'+value.id+'">';
                        let aClose='</a>';
                        
                        chartData.push([aOpen+value.revision_count+aClose, aOpen+value.created_at+aClose]);
                        
                      }
                      
                  }
        </script>
        
          @include('includes.js.revision')
@endsection


 