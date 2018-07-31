@extends('layouts.app')

@section('content')	
      <div class="cell example example1">
        <form action="{{route('charge')}}" method="POST" id="payment-form">
        	{{ csrf_field() }}
          <fieldset>
            <div class="row">
              <label for="example1-name" data-tid="elements_examples.form.name_label">Name</label>
              <input id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Jane Doe" required="" autocomplete="name">
            </div>
            <div class="row">
              <label for="example1-email" data-tid="elements_examples.form.email_label">Email</label>
              <input id="example1-email" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="janedoe@gmail.com" required="" autocomplete="email">
            </div>
            <div class="row">
              <label for="example1-phone" data-tid="elements_examples.form.phone_label">Phone</label>
              <input id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">
            </div>
          </fieldset>
          <fieldset>
            <div class="row">
              <div id="example1-card"></div>
            </div>
          </fieldset>

          @if(session('cost'))
           <input type="hidden" name="cost" value="{{session('cost')}}">
           <input type="hidden" name="last_insert_id" value="{{session('last_insert_id')}}">
          
            <button type="submit" data-tid="elements_examples.form.pay_button">Pay $ {{session('cost')}}</button> 
      
        @endif          
        </form>	
@endsection