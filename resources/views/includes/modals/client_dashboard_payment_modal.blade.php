  
  <a id="bgblue" class="buttons float-right" data-toggle="modal" data-target="#payModal{{$count}}" href="" data-count="{{$count}}" onclick="payment(this.dataset.count)"  >
                                                        
    <i class="fas fa-money-check-alt"></i>Pay
  </a>                                          
 

  <!-- Modal -->
  <div class="modal fade" id="payModal{{$count}}" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <div class="modal-body p-3">
        <div class="p-3">
          <form action="{{route('charge')}}" method="POST" id="payment-form">
                {{ csrf_field() }}

                <div class="form-group row">
                     {{Form::label('name', 'Your Name', ['for'=>'name','class'=>'font-weight-bold'])}} 
                   
                      <input name="name" class="form-control" id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Jane Doe" required="" autocomplete="name">
                </div>
                <div class="form-group row">
                     {{Form::label('email', 'Email Address', ['for'=>'email','class'=>'font-weight-bold'])}} 
                   
                      <input name="email" class="form-control" id="example1-email" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="janedoe@gmail.com" required="" autocomplete="email"> 
                </div>
                <div class="form-group row">
                     {{Form::label('phone', 'Phone', ['for'=>'phone','class'=>'font-weight-bold'])}} 
                   
                      <input name="phone" class="form-control" id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">  
                </div>
                <div class="form-group row mb-1">
                    {{Form::label('message', 'Your Card', ['for'=>'card','class'=>'font-weight-bold'])}}                    
                </div> 
                
                     <div id="card{{$count}}" class="pay-card mb-2"></div> 
                   
             
                  <div class="form-group row">
                    <input type="hidden" name="cost" value="{{session('cost')}}">
        
            <input type="hidden" name="last_insert_id" value="{{$order->id}}">
                       
                      
                        <button type="submit" data-tid="elements_examples.form.pay_button"class="buttons btn btn-primary btn-lg btn-block" role="button" style="background: #6772E5" aria-pressed="true">Pay $ {{session('cost')}} {{session('id')}}
                        </button> 
                  
                     
                  </div>         
            
                </form> 
        </div>
        
        
      
                                               
      </div>
      <div class="modal-footer">
        
        
        
        
      </div>
      
    </div>
  </div>
</div>{{-- end modal --}}