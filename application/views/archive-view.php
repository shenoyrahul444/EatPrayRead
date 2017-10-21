        <section class="page-section" data-background="<?= base_url()?>assets/images/background-2.jpg"  >
                <div class="container relative">
                    <h1 class="mt-0 font-alt" align="center">Archives for <?= $year?></h1>
                    <br>
                    <div class="row masonry ">
<?php 
if($articles){
    //It will print all the articles sorted by the array $articlenology if $articlenology is TRUE or It has values in it
foreach ($articles as $article) {
  ?>
                        <!-- POST START-->

                                <div class="col-sm-6 col-md-3 col-lg-3 mb-60 mb-xs-40">
                                    
                                    <div class="post-prev-img">
                                        <a href="<?= base_url('Technology/'.$article->uri)?>">
                                            <!--<img src="images/Technology/whatsapp's-encryption-genie-is-out-of-the-bottle-THUMB.jpg" alt="Whatsapp" />-->
                                            <?php echo img("assets/images/".$article->directory."/".$article->article_id."/1.jpg"); ?>
                                        </a>
                                    </div>
                                    
                                    <div class="post-prev-title font-alt">
                                        <a href="<?= base_url('Technology/'.$article->uri)?>"><?= $article->title ?></a>
                                    </div>
                                    
                                    <div class="post-prev-info font-alt">
                                        <a href="<?= base_url('Technology/'.$article->uri)?>"><?= $article->author ?></a> | <?= $article->publish_date ?>
                                    </div>
                                    
                                    <div class="post-prev-text">
                                            <?php echo $article->description
//                                            $string = $article->description ;
//                                            $string = word_limiter($string, 30);
//                                            echo $string;?>
                                    </div>
                                    
                                    <div class="post-prev-more">
                                        <a href="<?= base_url('Technology/'.$article->uri)?>" class="btn btn-mod btn-gray btn-round">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                    
                                </div>
                                <!-- POST END-->
                    
<?php 
  
}
}else
{
    //It will print "Sorry No archives found for this year" in case $articlenology is empty OR FALSE
?>
    <div class="col-sm-6 col-md-8 col-lg-8 mb-60 mb-xs-40">
        <h1>Sorry No archives found for this year</h1>
    </div>
<?php                          
}
?>
                    </div>
                    <!--TESTING--> 
                    <!--TESTING--> 
                    <!--TESTING-->
                </div>
            
        </section>
                    <!--TESTING--> 
                    <!--TESTING--> 
                    
                    
                    