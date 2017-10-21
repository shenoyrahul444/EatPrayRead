

<!-- Section -->
<!--<section class="page-section" data-background="<?php // base_url()?>assets/images/background-2.jpg" >OPEN-->
<section class="page-section"><!--OPEN-->
    <div class="container relative"><!--OPEN-->
        <div class="row"> <!--OPEN-->

            <!-- Content -->
            <div class="col-sm-8"> <!---CLOSED HERE-->
                         
                    <div class="row multi-columns-row">
                           
                                         
                         <!--***********POST START***********-->
                         
                         
<?php


if(!$articles){
echo '                            
                         <center> 
                             <h1 class="blog-item-title">
                                 <b>under construction</b>
                             </h1>
                             
                             <p class="font-alt"><br>You can browse our Technology section for interesting stuff.<br>
                             Please <a href="#footer"><b><i>subscribe</i></b> </a>
                             so that we can notify you as and when we make progress.
                             </p>
                         </center>
';
}
else{

        foreach ($articles as $article) {
            ?>

             
      
                            
                                <!-- Post Item -->
                                <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                                    
                                    <div class="post-prev-img">

                                        <a href="<?= base_url($article->directory.'/'.$article->uri)?>">
                                        <?= img('assets/images/'.$article->directory.'/'.$article->article_id.'/THUMB.jpg')?>
                                        </a>
                                    </div>
                                    
                                    <div class="post-prev-title font-alt">
                                        <a href="<?= base_url().$article->directory.'/'.$article->uri ?>"><?= $article->title ?></a>
                                    </div>
                                    
            <div class="post-prev-info font-alt">

                       <img src="<?= base_url() ?>assets/images/icons/clock.png" width="20"/> <?= $article->publish_date ?>
                    &nbsp;&nbsp;&nbsp;
                    
                    <img src="<?= base_url() ?>assets/images/icons/author.png" width="20"/> <?= $article->author ?>
                    &nbsp;&nbsp;&nbsp;
                    
                    <img src="<?= base_url() ?>assets/images/icons/eye.png" width="20"/> <?= $article->article_view_count ?>
             
            </div>
                                    
                                    <div class="post-prev-text">
                          <p class="font-alt">
                                    <?php 
                                        $string = $article->description ;
                                            $string = word_limiter($string, 40);
                                            echo $string;?>
                                 </p> 

                                    </div>
                                    
                                    <div class="post-prev-more">
                                        <a href="<?= base_url($article->directory.'/'.$article->uri.'')?>" class="btn btn-mod btn-round  btn-small">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                    
                                </div>
                          <!-- Post Item -->
                                
                        
      
                            
                <?php
                //Closing the foreach
        }
}
        ?>
                    </div>
</div>                            
