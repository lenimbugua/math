@extends('layouts.app')

@section('content')
    
    <div class="banner">
      <div class="top-bar"> <!-- start top bar -->        
        <div class="row no-gutter">      <!-- start row -->
          <div class="col-sm-4">
            <div class="logo-wrapper">
              <a href="">
                <div class="logo">          
                </div>
              </a>
            </div>                        
          </div> 
          
          <div class="col-sm-8">
            <div class="navigating-bar">
              <ul>
                <li><a href="#home">0704241274</a></li>
                <li><a href="#news">chat</a></li>
                <li class="drpdown">
                  <a href="#" class="dropbtn">Services</a>
                  <div class="dropdown-content">                    
                      <a href="#">Math</a>
                      <a href="#">Stat</a>
                      <a href="#">Accounting</a>                    
                  </div>
                </li>
                <li><a href="#home">Support</a></li>
                <li><a href="#news">About</a></li>
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <div id="drpdown-wrapper">
                        <li class="drpdown">
                        <a href="javascript:void(0)" class="dropbtn">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-content">
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    </div>
                    
                @endguest
            </ul>
            </div>
            
          </div>
                    
        </div>              
    </div>
      <div class="banner-puch-line">
        <div class="row no-gutter">
          <div class="col-sm">
            <div id="table">
              <div id="centeralign">
                <h1 class="anim-title">Welcome To Pronto Essays </h1>
                @component('components.who')
                    
                @endcomponent
              </div>
              <h1>
              <a href="" class="typewrite" data-period="2000" data-type='[ "Hi, Im Math Holic.", "Math Help.", "Statistics Master.", "Accounting Pro." ]'>
                <span class="wrap"></span>
              </a>
            </h1>
            </div>
            
          </div>
          <div class="col-sm">
            
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
                      
                      <option selected="selected">1 pages || Aprox 275 Words</option>
                      <option>2 pages || Aprox 550 Words</option>
                      <option>3 pages || Aprox 275 Words</option>
                      <option>4 pages || Aprox 825 Words</option>
                      <option>5 pages || Aprox 1100 Words</option>
                      <option>6 pages || Aprox 1375 Words</option>
                      <option>7 pages || Aprox 1650 Words</option>
                      <option>8 pages || Aprox 1925 Words</option>
                      <option>9 pages || Aprox 2200 Words</option>
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
              <a class="btn btn-success btn-lg btn-block" href="{{'/orders/create'}}" role="button">
                Continue          
              </a>
              {{-- <button type="button" class="btn btn-success btn-lg btn-block" onclick="calculateCost()">Continue</button> --}}
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
    <div class="end">
        <div class="row no-gutter">
          <div class="col-sm">
            <div class="end-punchline">
              
            </div>
          </div>
          <div class="col-sm">
            <div class="end-punchline">
              <div class="punch-line-header">
                <h4> Services</h4>
              </div>
              <div class="punch-line-content">
                <p>
                  Math<br/>
                  Statistics<br/>
                  Finance<br/>
                  Economics<br/>
                </p>            
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="end-punchline">
              <div class="punch-line-header">
                <h4> Company</h4>
              </div>
              <div class="punch-line-content">
                <p>
                  About<br/>
                  Contact<br/>
                  Terms of service<br/>
                  privacy policy<br/>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="end-punchline">
              <div class="punch-line-header">
                <h4> Support</h4>
              </div>
              <div class="punch-line-content">
                <p>
                  Chat<br/>
                  Email<br/>
                  Price Calculator<br/>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="end-punchline">
              <div class="punch-line-header">
                <h4> Join Us</h4>
              </div>
              <div class="punch-line-content">
                <p>
                  Register<br/>
                  Login<br/>
                  Get Your Quote<br>
                </p>
              </div>              
            </div>
          </div>
          <div class="col-sm">
            <div class="end-punchline">
              
            </div>
          </div>
        </div>
        <div class="row no-gutter">
          <div class="end-footer">
            <div class="row">
              <div class="col-sm">
              <div class="end-footer-content">
                <p>
                  
                </p>
              </div>
            </div>
            <div class="col-sm">
              <div class="end-footer-content">
                <p>
                  © 2018 Onwards Mathholic Inc. All rights reserved.
                  *Promotional pricing is for the first term only and regular rates apply upon renewal. 30-Day Money-Back Guarantee.
                </p>
              </div>
            </div>
            </div>            
          </div>
        </div> 
          
    </div>

    
@endsection


    
    
 