<!--<div style="background:lightblue; ">
    <center>
        <img src="<?php // base_url('assets/images/connect.png')?>" style="margin-top:2em;  background: #004e7a;width: 1000px;" />
    </center>
</div>-->
<!--Hero-->
            

    <!-- Contact Section -->
    <section class="page-section" id="contact" style="background: lightblue;">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mt-10 mb-10 mb-sm-40">
                        <b>Contact Us</b>
                    </h2>
                    
                    <div class="row mb-60 mb-xs-40">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <!--Contact Form-->
                     <div class="row">
                        <div class="col-md-8 col-md-offset-2">
            
            
                            <form  name="connect_form"  class="form"   novalidate>
            
            
                            <!--Displaying Response-->
                            <div class="{{connect_response_type}} mb-10" style="text-align:center; font-weight: 800">{{connect_response_message}}</div>
                            
                            <!--********Angular Asynchronous responses********-->
                            <!--<div class="error mb-10" style="text-align:center;  font-weight: 800" ng-show="connect_form.connect_name.$dirty && connect_form.connect_name.$invalid"></div>-->
                            <div class="error mb-10" style="text-align:center; font-weight: 800" ng-show=" connect_form.connect_name.$touched &&  connect_form.connect_name.$error.required">Name is required.</div>
                            
                            
                            <!--<div class="error mb-10"  style="text-align:center; font-weight: 800" ng-show="connect_form.connect_email.$dirty && connect_form.connect_email.$invalid"></div>-->
                            <div class="error mb-10"  style="text-align:center; font-weight: 800"  ng-show="connect_form.connect_email.$touched && connect_form.connect_email.$error.required">Email is required.</div>
                            <div class="error mb-10"  style="text-align:center; font-weight: 800" ng-show="connect_form.connect_email.$error.email">Invalid email address.</div>


                            <!--<div class="error mb-10" style="text-align:center;  font-weight: 800" ng-show="connect_form.connect_message.$dirty && connect_form.connect_message.$invalid"></div>-->
                            <div class="error mb-10" style="text-align:center;  font-weight: 800" ng-show=" connect_form.connect_message.$touched &&  connect_form.connect_message.$error.required">Message is required.</div>
                            
                            <!--********Angular Asynchronous responses********-->

                                        <div class="clearfix">
                                                    <div class="cf-left-col">
                                                    <!--Name--> 
                                                            <div class="form-group">
                                                                <input type="text" class="input-md round form-control" placeholder="Name" pattern='.{3,100}' name="connect_name" ng-model="connect_name" required/> 
                                                            </div>
                                                    
                                                        <!--Email-->
                                                            <div class="form-group">
                                                                        <input type="email" class="input-md round form-control" placeholder="Email" pattern='.{5,100}' name="connect_email" ng-model="connect_email" required /> 
                                                                </div>
                                                    
                                                    </div>
                                                    
                                                    <div class="cf-right-col">
                                                        
                                                        <!--Message--> 
                                                            <div class="form-group">
                                                                        <input type="text" style="height:84px;" class="input-md round form-control" placeholder="Message" pattern='.{5,100}' name="connect_message" ng-model="connect_message" required/> 
                                                            </div>
                                                    
                                                    </div>
                                                    
                                            </div>
                                                
                                                <div class="clearfix">
                                                    <div class="cf-left-col">
                                                        <!--Inform Tip-->                                         
                                                        <div class="form-tip pt-20">
                                                            <i class="fa fa-info-circle"></i> All the fields are required
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="cf-right-col">
                                                            <!--Send Button--> 
                                                            <div class="align-right pt-10">
                                                                <!--<input type="submit" class="submit_btn btn btn-mod btn-medium btn-round" value="Submit Message" ng-click="submit_message()" />-->
                                                                <input type="submit" class="submit_btn btn btn-mod btn-medium btn-round" value="Submit Message" ng-click="submit_message()" ng-disabled="
                                                                    connect_form.connect_email.$invalid || connect_form.connect_name.$invalid || connect_form.connect_message.$invalid ||   
                                                                    connect_form.connect_name.$dirty && connect_form.connect_name.$invalid ||  
                                                        connect_form.connect_email.$dirty && connect_form.connect_email.$invalid || connect_form.connect_message.$dirty && connect_form.connect_message.$invalid">

                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    <!--End Contact Form--> 
                    
                </div>
            </section>
            <!-- End Contact Section -->
            


                  
                  
                  
                  <!----------------*************FOOTER START*************------------->



                  <footer class="page-section footer">
                <div class="container">
                    
                    <!--UPPER PART-->
                    
                           <div class="section-text" style="color: black;">
                                    <div class="row">

                                        <div class="col-md-4" >
                                            <h2 class="hs-line-8 no-transp font-alt ">About EatPrayRead</h2>
                                            
                                            EatPrayRead.com is an information portal which aims to keep its viewers updated with the hottest technologies and trends in the market. This goes with our motto
                                            <p>"Stay Updated. Stay Enlightened."</p>
                                        </div>

                                        <div class="col-md-4 col-sm-6 ">
                                            <h2 class="hs-line-8 no-transp font-alt ">Other Links</h2>
                                            <ul>
                                                <a href="<?= base_url('digitalMedia') ?>"><li class="font-alt">Digital Media</li></a>
                                                <a href="<?= base_url('technology') ?>"><li class="font-alt">Technology</li></a>
                                                <a href="<?= base_url('lifestyle') ?>"><li class="font-alt">Lifestyle</li></a>
                                                <a href="<?= base_url('datascience') ?>"><li class="font-alt">Data Science</li></a>
                                            </ul>
                                        </div>
                                        
                                
                                        <div class="col-md-4 col-sm-6 ">
                                                <div class="widget punica-social-widget">

                                                    <h2 class="hs-line-8  font-alt"><span>Newsletter</span></h2>


                                                                        <p>By subscribing to our mailing list you will always be update with the latest news from us. We never spam.</p>
                                                                
                                                                        <p class="input-email clearfix">
                                                                
                                                                        </p>
                                                    <form  name="subscribe_form" class="form" novalidate>

                                                                                <!--******Angular Asynchronous response*******-->
                                                                        
                                                                        <div class="{{subscribe_response_type}} mb-10">{{subscribe_message}}</div>


                                                                               <div class="error mb-10"  style="text-align:center;  font-weight: 800"  ng-show="subscribe_form.subEmail.$touched && subscribe_form.subEmail.$error.required">Email is required.</div>
                                                                                <div class="error mb-10"  style="text-align:center; font-weight: 800" ng-show="subscribe_form.subEmail.$error.email">Invalid email address.</div>
                                                                                <!--******Angular Asynchronous response*******-->
        
                                                                        <div class="form-group">
        
                                                                                <!--<input type="text" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" name="subEmail" ng-model='subEmail' />-->
                                                                                <input type="email" class="input-md round form-control" placeholder="Email" pattern='.{5,100}' name="subEmail" ng-model="subEmail" required /> 

                                                                        </div>
                                                                
                                                                        <div class="align-left pt-10">
                                                                        
                                                                                <!--<input type='button' class="submit_btn btn btn-mod btn-medium btn-round" value="Subscribe" ng-click="subscribe()" >-->
                                                                                <input type="submit" class="submit_btn btn btn-mod btn-medium btn-round" value="Subscribe" ng-click="subscribe()" 
                                                                                    ng-disabled="subscribe_form.subEmail.$invalid || subscribe_form.subEmail.$dirty && subscribe_form.subEmail.$invalid">

                                                                        </div>
                                                             
                                                            </form>

                               


                                                 </div>                    
                                        </div>
                                    </div>
                           </div>

                    <!--UPPER PART-->                
                    
                    <!--BREAK LINE-->
                    
                    <hr style="border: 2px solid black;" />
                    
                    <!--BREAK LINE-->
                    
                    <!--LOWER PART-->
                    
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30"> <!---class="wow fadeInUp" data-wow-duration="1.2s"-->
                        <a href="#top"><img src="<?php echo base_url();?>assets/images/logo-dark.png"  alt="Logo" /></a>
                        <p>Stay Updated. Stay Enlightened.</p>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links">
                        <a href="https://www.facebook.com/Eat-Pray-Read-1648177492113582/?fref=ts" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <!-- End Social Links -->  
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
<!--
                        <div class="footer-copy font-alt pt-50">
                            Website maintained by : <a href="https://www.facebook.com/?_rdr=p">Rahul Shenoy</a>
                        </div>-->

                        <!-- End Copyright -->                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            
        
        <!--LOWER PART-->
                         <!----------------*************FOOTER END*************------------->
 
        
        
           
        </div>
        <!-- End Page Wrap -->
        

    
<!--*********************************JAVASCRIPT*********************************-->    
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/article-bottom.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
        <!--<script type="text/javascript" src="<?php // echo base_url();?>assets/<?php // echo base_url();?>assets/http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>-->
       
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/all.js"></script>
        <!--<script type="text/javascript" src="<?php // echo base_url('assets/js/contact-form.js')?>"></script>-->
        <!--<script type="text/javascript" src="<?php //echo base_url();?>assets/js/jquery.ajaxchimp.min.js"></script>        -->
        <!--<script type="text/javascript" src="<?php // echo base_url();?>assets/js/jquery-comments.min.js"></script>-->        
        <!--[if lt IE 10]><script type="text/javascript" src="<?php // echo base_url();?>assets/<?php // echo base_url();?>assets/js/placeholder.js"></script><![endif]-->
<!--*********************************JAVASCRIPT*********************************-->


<script>
//  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
//
//  ga('create', 'UA-75650660-1', 'auto');
//  ga('send', 'pageview');
</script>




</body>



</html>