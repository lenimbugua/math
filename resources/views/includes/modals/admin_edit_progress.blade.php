<h5 class="card-title">
  <a data-toggle="modal" data-target="#progressModal{{$count}}" href="" class="float-right">
    <i class="fas fa-pen"></i>
  </a>
</h5>

<div class="modal fade" id="progressModal{{$count}}" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="progressModalLabel">Edit progress</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' =>['AdminController@update',$order->id], 'method' => 'POST','files' => true]) !!}
      
      <div class="modal-body">
        
        <div class="form-group row">
           {{Form::label('progress', 'Progress', ['class'=>'col-sm-4 col-form-label'])}} 
         <div class="col-sm-8">
            {{Form::select(
              'progress',           
              ['0' => '0%',
               '25' => '25%',
               '50' => '50%',
               '75' => '75%',
               '100' => '100%'             
              ], 
               '25',
               ['class'=>'form-control',
               'onchange'=>'setVisibility(this.dataset.count)',
               '                         id'=>'progressvisibility'.$count,
               'data-count'=>$count]
            )}}           
          </div>
      </div>
      <div class="form-group row" id="visibilityhidden{{$count}}" hidden>
          {{Form::label('files', 'Upload Files', ['class'=>'col-sm-4 col-form-label'])}} 
          <div class="col-sm-8">
            {{Form::file('files[]', ['id'=>'file','class'=>'form-control buttons','multiple'])}}   
          </div>
      </div>  
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{Form::hidden('_method', 'PUT')}} 
        
        {{Form::submit('Save Changes',['class'=>'btn btn-primary'])}}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>