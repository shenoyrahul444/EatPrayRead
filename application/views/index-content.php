         
<!--*************************Start Slider*************************-->
    <div class="home-section fullwidth-slider bg-dark" id="home">

            <section class="home-section bg-scroll fixed-height-small bg-dark-alfa-50" data-background="<?php echo base_url();?>assets/images/blog/technology.jpg">
                
                            <div class="js-height-full">
                    
                    <!-- Hero Content -->
                    <div class="home-content">
                        <div class="home-text">
                            
                            <h1 class="hs-line-8 no-transp font-alt mb-50 mb-xs-30">
                                READ ABOUT
                            </h1>
                            
                            <h2 class="hs-line-7 mb-50 mb-xs-30">
                                <span class="text-rotate font-alt">
                                    TECHNOLOGY,
                                    DIGITAL MEDIA,
                                    DATA SCIENCE
                                </span>
                            </h2>
                            
                            <div class="local-scroll">
                                <a href="<?= base_url('technology')?>" class="btn btn-mod btn-border-w btn-medium btn-round hidden-xs">Start Reading</a>
<!--
                                <span class="hidden-xs">&nbsp;</span>
                                <a href="http://vimeo.com/50201327" class="btn btn-mod btn-border-w btn-medium btn-round lightbox mfp-iframe">Play Reel</a>
-->
                            </div>
                            
                        </div>
                    </div>
                    <!-- End Hero Content -->
                    
                    <!-- Scroll Down -->
                    <div class="local-scroll">
                        <a href="#page-section" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                    </div>
                    <!-- End Scroll Down -->
                    
                </div>
            </section>
                
                
                
                
<!--
                    <div class="js-height-parent container">
                        <div class="home-content">
                            <div class="home-text">
                                <h2 class="hs-line-8 no-transp font-alt mb-50 mb-xs-10">
                                    LATEST
                                </h2>              
                                <h1 class="hs-line-14 font-alt mb-50 mb-xs-10">
                                    TECHNOLOGY
                                </h1>
                                <div>
                                    <a href="<?// base_url('technology')?>" class="btn btn-mod btn-border-w btn-small btn-circle">Start Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                

                
                
                
                </section>
-->
<!--
            <section class="home-section bg-scroll fixed-height-small " data-background="<?php // base_url();?>assets/images/blog/e-commerce-2.jpg" >
                    <div class="js-height-parent container">
                        <div class="home-content">
                            <div class="home-text">
                                <div class="hs-line-8 no-transp font-alt mb-40 mb-xs-10 blackify">
                                    Explore and Understand
                                </div>
                                <div class="hs-line-14 font-alt mb-50 mb-xs-10 blackify" >
                                    E-commerce
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                         <section class="home-section bg-scroll fixed-height-small bg-dark-alfa-30" data-background="<?php // echo base_url();?>assets/images/blog/big-data.jpg">
                    <div class="js-height-parent container">
                        <div class="home-content">
                            <div class="home-text">
                                <h1 class="hs-line-8 no-transp font-alt mb-90 mb-xs-10">
                                    Daddy of All
                                </h1>
                                <h2 class="hs-line-14 font-alt mb-50 mb-xs-10">
                                </h2>
                                <div>
                                    <a href="<?php // base_url('technology/Big_data_understanding_the_buzzword')?>" class="btn btn-mod btn-border-w btn-small btn-circle mt-20">Start Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
-->

        </div>
<!--*************************End Slider*************************-->
       
<!--*************************Start Recent Stories*************************-->
             
<!--<section class="page-section" data-background="<?php //echp base_url()?>assets/images/background-2.jpg" >-->
<section class="page-section" id="page-section" style="background:whitesmoke;" >

                <div class="container relative">
                    <h1 class="mt-0 font-alt" align="center">Recent Stories</h1>
                    <br>
                    <div class="row masonry">
                                        
<?php 

foreach ($articles as $article) {
  ?>
                        <!-- POST START-->

                                <div class="col-sm-6 col-md-3 col-lg-3 mb-60 mb-xs-40">
                                    
                                    <div class="post-prev-img">
                                        <a href="<?= base_url($article->directory.'/'.$article->uri)?>">
                                            
                                            <?php echo img("assets/images/".$article->directory."/".$article->article_id."/THUMB.jpg"); ?>  
                                        </a>
                                    </div>
                                    
                                    <div class="post-prev-title font-alt hr.black">
                                        <a href="<?= base_url($article->directory.'/'.$article->uri)?>">
                                                    <?= $article->title ?>
                                        </a>
                                    </div>
                                    
                                    <div class="post-prev-info font-alt">
                                        <a href="<?= base_url($article->directory.'/'.$article->uri)?>">
                                                    <?= $article->author ?>
                                        </a> | <?= $article->publish_date ?>
                                    </div>
                                    
                                    <div class="post-prev-text ">
                                    <p class="font-alt">
                                            <?php 
                                                $string = $article->description ;
                                                    $string = word_limiter($string, 40);
                                                    echo $string;?>
                                    </p> 
                                    </div>
                                    
                                    <div class="post-prev-more">
                                        <a href="<?= base_url($article->directory.'/'.$article->uri)?>" class="btn btn-mod btn-gray btn-round">
                                            Read More <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                                <!-- POST END-->

<?php 
  
}
?>
            </div>
        </div>
</section>

<!--*************************End Recent Stories*************************-->
