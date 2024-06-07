<x-app-layout>


        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="best_text">Best</div>
                                    <div class="image_1"><img src="images/drone1.png"></div>
                                </div>
                                <div class="col-md-5">
                                    <h1 class="banner_taital">Rapid Delivery</h1>
                                    <p class="banner_text">Rapid delivery time with uninterrupted by traffic!</p>
                                    <div class="contact_bt"><a href="#cycle_scroll">Learn More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="best_text">Best</div>
                                    <div class="image_1"><img src="images/dron3.png"></div>
                                </div>
                                <div class="col-md-5">
                                    <h1 class="banner_taital">Real-Time tracking</h1>
                                    <p class="banner_text">Track your order from anywhere, anytime! </p>
                                    <div class="contact_bt"><a href="">Learn More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="best_text">Best</div>
                                    <div class="image_1"><img src="images/drone4.png"></div>
                                </div>
                                <div class="col-md-5">
                                    <h1 class="banner_taital">Multi-Location Delivery</h1>
                                    <p class="banner_text">Get deliveries to more than one location at once</p>
                                    <div class="contact_bt"><a href="">Learn More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!-- banner section end -->

        <!-- cycle section start -->
   <div class="cycle_section layout_padding" id="cycle_scroll">
    <div class="container">
       <h1 class="cycle_taital">Unique Features</h1>
       <p class="cycle_text">Unique features offered by DropMe that you cant find anywhere else!</p>
       <div class="cycle_section_2 layout_padding">
          <div class="row">
             <div class="col-md-6">
                <div class="box_main">
                   <h6 class="number_text">01</h6>
                   <div class="image_2"><img src="images/drone5.png"></div>
                </div>
             </div>
             <div class="col-md-6">
                <h1 class="cycles_text">In-built Weather Forecast</h1>
                <p class="lorem_text">Uses weather forecasting to determine the best time to deploy drones and creates
                   data reports.</p>
                <h1 class="cycles_text">AI Powered Navigation</h1>
                <p class="lorem_text">Using Artificial Intelligence drones will be able to adapt to navigation after
                   each delivery in finding the best and the safest route.</p>

             </div>
          </div>
       </div>
       <div class="cycle_section_3 layout_padding">
          <div class="row">
             <div class="col-md-6">
                <h1 class="cycles_text">Customizable Delivery Preferences</h1>
                <p class="lorem_text">Customers have the option to rate their package's priority on a scale from 1 to
                   5, influencing the speed of deliver (higher ratings indicating faster delivery time) with 5
                   denoting high priority and 1 indicating low priority. To maintain authenticity, an authentication
                   test is conducted to review the ratings before processing, ensuring that customers do not
                   consistently rate items as high priority solely to expedite their deliveries.</p>

             </div>
             <div class="col-md-6">
                <div class="box_main_3">
                   <h6 class="number_text_2">02</h6>
                   <div class="image_2"><img src="images/drone6.png"></div>
                </div>
             </div>
          </div>
       </div>
       <div class="cycle_section_2 layout_padding">
          <div class="row">
             <div class="col-md-6">
                <div class="box_main_3">
                   <h6 class="number_text_2">03</h6>
                   <div class="image_2"><img src="images/drone7.png"></div>
                </div>
             </div>
             <div class="col-md-6">
                <h1 class="cycles_text">Multi-Location Delivery</h1>
                <p class="lorem_text">Customers can order multiple products and get them delivered to more than one
                   location. This feature allows the users to send gifts while ordering personal items for themselves
                   and its also useful for our package delivering mail service where you can send important documents
                   to multiple people simultaneously carefully.</p>

             </div>
          </div>
       </div>
       <div class="read_btn_main">
          <div class="read_bt"><a href="{{ route('register') }}">Buyer</a></div>
          <div class="read_bt"><a href="{{ route('register') }}">Seller</a></div>
       </div>
    </div>
 </div>
 <!-- cycle section end -->

        </div>

</x-app-layout>
