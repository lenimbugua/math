@extends('layouts.app')

@section('content')

<div class="container" id="chat-app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
              <div class="card-header">
                Chats               
              </div>
              <div class="card-body panel-body" id="chat-scroll-bar">
                <chat-messages :messages="messages"></chat-messages>
              </div>
              <div class="card-footer">
                  <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
              </div>
            </div>
            
        </div>
    </div>
</div>
@endsection