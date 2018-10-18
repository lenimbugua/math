@extends('layouts.app')

@section('content')
<div class="client-login-card-header">
            <div class="d-flex justify-content-between">
                <a  class="btn btn-link text-light" href="{{ route('home') }}">
                    {{ __('Home') }}                
                </a>
                
            </div>           
        </div>
         
    <div class="container">
      
       <div class="row">
          <div class="col-md-4">
            <div class="price-calculator">
              <div class="calculator-header"> 
                <h4>
                  Calculate cost
                </h4>             
              </div>
              <div class="total-cost">
                <h3 id="totalcost">$ 00.00</h3>
              </div>
               <div class="calculator-options">
                <div class="academic-level d-flex justify-content-center">
                  <form>
                    Number of Questions
                    <div class="row">
                      
                      <div class="btn round-buttons" onclick="addQuestion()">+</div>
                      <input id="numberofquestions" type="number" name="" min="1" value="1"style="width: 5rem; color: #9C27B0" class="m-2 form-control font-weight-bold">
                      {{-- <div class="round-buttons">0</div> --}}
                      <div class="btn round-buttons" onclick="minusQuestion()">-</div>
                    </div>                                       
                                 
                  </form>
                </div>
              </div>
              <div class="calculator-options">
                <div class="academic-level">
                  <form>                                       
                    <select class="form-control" id="academiclevel" onchange="calculateCost()">
                      <option value="0">Select Academic Level</option>
                      <option value="1">High School</option>                      
                      <option value="2" selected="selected">Undergraduate</option>
                      <option value="3">Master</option>
                      <option value="4">PhD</option>
                    </select>              
                  </form>
                </div>
              </div>
             
              <div class="calculator-options">
                <div class="academic-level">
                  <form>                                       
                    <select class="form-control" >
                      <option value="0">Select Deadline</option>
                      <option value="1">12 Hours</option>
                      <option value="2">24 Hours </option>
                      <option value="3">2 days</option>
                      <option value="4">3 days </option>
                      <option value="5">4 days </option>
                      <option value="7">5 days </option>
                      <option value="8">6 days </option> 
                    </select>              
                  </form>
                </div>
              </div>
              <a class="buttons btn btn-lg btn-block" href="{{'/orders/create'}}" role="button" style="background: #02A9F3">
                Continue          
              </a>
              {{-- <button type="button" class="btn btn-success btn-lg btn-block" onclick="calculateCost()">Continue</button> --}}
            </div>
          </div>
          <div class="col-md-8">
            <div class="contacts">
                <div class="row mb-2">
                  <h1><strong><i class="fas fa-phone-volume rotate" style="color: #02A9F3"></i></strong></h1><h5 class="m-3"><strong>Give Us A Ring</strong></h5>
                </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              +40 762 321 762<br> 
              24/7 Expert Support<br>
            </div>

            <div class="row mb-2">
                  <h1><strong><i class="fas fa-envelope" style="color: #02A9F3"></i></strong></h1><h5 class="m-3"><strong>Mail Us</strong></h5>
                </div>
                
                
            <div class="pl-4 mb-4">
              Pronto Labs<br> 
              info@prontolabs.io<br> 
              24/7 Expert Support<br>
            </div>

            <div class="mb-4">
              <a href="{{ route('orders.create') }}" class="buttons btn btn-primary btn-lg btn-block" role="button" style="background: #02A9F3" aria-pressed="true">Make an Order Now</a>
            </div>
            
              </div>
          </div>
        </div> 
    </div>
    
       

    <div class="blog-footer">
      @include('includes.js.cost_calculator')
      @include('includes.footer')
    </div>

@endsection


 