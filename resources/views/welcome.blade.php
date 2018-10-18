@extends('layouts.app')

@section('content')



    <div class="banner-section">    
       @include('includes.navbar')
         
        <div class="banner" >


      <div class="typing">
        <div class="container">
          <div class="row">
            <p><h1 class="text-light">Welcome to Pronto Labs</h1><br></p>
            
          </div>
          <div class="row">
            <p><h1 class="text-light">Assignment Services</h1></p>
          </div>
        <div class="row">
          <h3 class="text-light">We Help  &nbsp; &nbsp; </h3>
          <h3>
            <div id="typed" class="text-light">
              
            </div>
            <div id="typed-strings" hidden>
                <p>Students do their <strong>Math</strong> Assignment.</p>
                <p>Students do their <strong>Math</strong> Assignment.</p>
                <p>Anyone With <strong>Accounting or Statistics </strong>homework.</p>
            </div>

            <h3 class="text-success">|</h3>
          </h3>
          
            
            
          </div> 
          <a class="btn btn-success btn-lg" href="{{'/orders/create'}}" role="button">
              Order Now
            </a>
        </div>
        </div>
        
               
      </div> 
       </div>
      
    
    </div>
        
      <!--  -->
    <div class="banner-bottom-ribbon">
      <h3>
        Providing Non-plagiarised assignment services 
        <a class="btn btn-success btn-lg" href="{{'/orders/create'}}" role="button">
          Get Started Now
        </a>
      </h3>
    </div>
    <div class="services"> 
      <div class="row no-gutter">        
        <div class="col-sm">          
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
                <div class="academic-level">
                  <form>
                    Number of Questions
                    <div class="row">
                      
                      <div class="btn round-buttons" onclick="addQuestion();calculateCost()">+</div>
                      <input id="numberofpages" type="number" name="numberofpages" min="1" value="1"oninput="calculateCost()" style="width: 5rem; color: #9C27B0" class="m-2 form-control font-weight-bold">
                      {{-- <div class="round-buttons">0</div> --}}
                      <div class="btn round-buttons" onclick="minusQuestion();calculateCost()">-</div>
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
              <a class="btn btn-lg btn-block buttons" style="background: #02A9F3" href="{{'/orders/create'}}" role="button">
                Continue          
              </a>
              
            </div>
        </div>
        <div class="col-sm">
          <div class="punch-line">
            <div class="punch-line-body">
              <div class="punch-line-header">
              <div class="math" id="math2">
                  
                </div>              
              </div>
              <div class="punch-line-sub-header"> 
                <h4>
                  Math
                </h4>             
              </div>
              <div class="punch-line-content">
                <p>
                  Mist enveloped the ship three hours out from port.
                  My two natures had memory in common.
                  Silver mist suffused the deck of the ship.
                  She stared through the window at the stars.
                </p>
              </div>
              <div class="punch-line-footer">              
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-sm">
          <div class="punch-line">
            <div class="punch-line-body">
              <div class="punch-line-header">
                <div class="math" id="math3">                
                </div>            
              </div>
              <div class="punch-line-sub-header">
                <h4>Accounting</h4>              
              </div>
              <div class="punch-line-content">
                <p>
                  The sky was cloudless and of a deep dark blue.
                  Then came the night of the first falling star.
                  Waves flung themselves at the blue evening.
                  The spectacle before us was indeed sublime
                </p>
              </div>
              <div class="punch-line-footer">              
              </div>
            </div>
            
          </div>
        </div> 
        <div class="col-sm">
          <div class="punch-line">
            <div class="punch-line-body">
              <div class="punch-line-header">
                <div class="math" id="math4">
                  
                </div>              
              </div>
              <div class="punch-line-sub-header">
              <h4>Statistics</h4>              
              </div>
              <div class="punch-line-content">
                <p>
                  It was going to be a lonely trip back.
                  Silver mist suffused the deck of the ship.
                  The recorded voice scratched in the speaker.
                  The face of the moon was in shadow again.
                </p>
              </div>
              <div class="punch-line-footer">              
              </div>
            </div>
            
          </div>
        </div>                       
      </div>     
    </div>
    <div class="testimonials">
    <div class="row no-gutter">
      <div class="col-sm">
        <div class="testimonial-punchline">
          <div class="testimonial-punch-line-header">
            <h1>Introducing Math online Help Site</h1>
          </div>
          <div class="testimonial-punch-line-content">
            <p>
              Our revolutionary Cloud solution is powerful, simple, and
              surprisingly affordable. Harnessing the web has never been easier.
            </p>            
          </div>
          <div class="testimonial-punch-line-footer"> 
              <a class="btn btn-success btn-lg" href="#" role="button">
                Get Quote Now
              </a>   
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="allmath">
          
        </div>
      </div>
    </div>      
    </div>
    <div class="support">
      <div class="row no-gutter">
        <div class="col-sm"> 
          <div class="support-image">        
          </div>          
        </div>
        <div class="col-sm">
          <div class="support-punch-line">
            <div class="support-punch-line-header">
              <h3>24/7 Expert Support</h3>
            </div>
            <div class="support-punch-line-content">
              <p>
                Our in-house, expert team is always on hand to help answer your questions, get you started, and grow your presence online. You can call, chat or email us any time!
              </p>              
            </div>
            <div class="support-punch-line-footer">              
            </div>
          </div>
        </div>
      </div>
      <div class="row no-gutter">
        <div class="support-base">
          
        </div>
      </div>           
    </div>
    @include('includes.footer')
   
</div>
    @include('includes.js.cost_calculator') 
    @include('includes.js.typed')
@endsection


    
    
 