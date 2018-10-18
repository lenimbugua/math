<a class="buttons" data-toggle="modal" data-target="#downloadModal{{$count}}" href="">
  <i class="fas fa-download"></i>Download
</a> 

<div class="modal fade" id="downloadModal{{$count}}" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="downloadModalLabel">Download Files</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <div class="modal-body">
        <?php
          $count2 = 0;
        ?>
        @foreach($files as $file)
            
            @if($file->order_id==$order->id and $file->question_or_answer=='question')


              <?php
                $count2++;
              ?>
              <div class="row">
                <div class="col-1">
                  {{$count2}}
                </div>
                <div class="col-10">
                  <a class="buttons file-downloads" href="{{route('downloadfiles',$file->id)}}"><i class="fas fa-file-download"></i>Download</a>
                </div>                   
              </div>
              
            @endif
        @endforeach                 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                 
      </div>                            
    </div>
  </div>
</div> 
