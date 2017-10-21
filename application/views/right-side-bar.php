                        
<!--************************************RIGHT SIDEBAR START************************************-->
<!-- Sidebar -->
                <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                            
                            
                            <!-- Widget -->
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">Categories</h5>
                                
                                <div class="widget-body">
                                    <ul class="clearlist widget-menu">
                                        <li>
                                            <a href="<?= base_url('Technology')?>" title="">Technology</a>
                                            <small>
                                                - <?= $technology_count ?>
                                            </small>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('DigitalMedia')?>" title="">Digital Media</a>
                                            <small>
                                                - <?= $digitalMedia_count ?>
                                            </small>
                                        </li>
                                        
                                         <li>
                                            <a href="<?= base_url('DataScience')?>" title="">Data Science</a>
                                            <small>
                                                - <?php echo $datascience_count ?>
                                            </small>
                                        </li>
                                        
<!--                                        <li>
                                            <a href="#" title="">Photography</a>
                                            <small>
                                                - 5
                                            </small>
                                        </li>
                                        <li>
                                            <a href="#" title="">Other</a>
                                            <small>
                                                - 1
                                            </small>
                                        </li>-->
                                    </ul>
                                </div>
                                
                            </div>
                            <!-- End Widget -->
                            
                            <!-- Widget -->
<!--                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">Tags</h5>
                                
                                <div class="widget-body">
                                    <div class="tags">
                                        <a href="">Design</a>
                                        <a href="">Portfolio</a>
                                        <a href="">Digital</a>
                                        <a href="">Branding</a>
                                        <a href="">Theme</a>
                                        <a href="">Clean</a>
                                        <a href="">UI & UX</a>
                                        <a href="">Love</a>
                                    </div>
                                </div>
                                
                            </div>-->
                            <!-- End Widget -->
                            
                            <!-- Widget -->
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">Last posts</h5>
                                
                                <div class="widget-body">
                                    <ul class="clearlist widget-posts">
                            
                                  <?php 
                                  foreach ($articles as $article) {
                                  
                            ?>
                                        <li class="clearfix">
                                            <a href="<?= base_url($article->directory.'/'.$article->uri)?>"><img src="<?= base_url('assets/images/'.$article->directory.'/'.$article->article_id.'/ICON.jpg')?>" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="<?= base_url($article->directory.'/'.$article->uri)?>" title=""><?= $article->title ?></a>
                                                Posted by <?= $article->author ?> on <?= $article->publish_date ?>
                                            </div>
                                        </li>
                        <?php 

                        }
                        ?>      
                                    </ul>
                                </div>
                                
                            </div>
                            <!-- End Widget -->
                            
                            <!-- Widget -->
<!--                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">Text widget</h5>
                                
                                <div class="widget-body">
                                    <div class="widget-text clearfix">
                                        
                                        <img src="images/user-avatar.png" alt="" width="70" class="img-circle left img-left">
                                        
                                        Consectetur adipiscing elit. Quisque magna ante eleifend eleifend. 
                                        Purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem.
                                        Quisque magna ante eleifend eleifend. 
                                    
                                    </div>
                                </div>
                                
                            </div>                            -->
                            <!-- End Widget -->
                            
                            <!-- Widget -->
                            <div class="widget">
                                
                                <h5 class="widget-title font-alt">Archive</h5>
                                
                                <form action="<?= base_url('Site/archive')?>" method="post">
                                        <div class="widget-body">
                                            <ul class="clearlist widget-menu">
                                                
                                                <li>
                                                    <a name='archive' href="<?= base_url('Site/archive?value=2016')?>" title="">2016</a>
                                                </li>
                                                <li>
                                                    <a name='archive' href="<?= base_url('Site/archive?value=2015')?>" title="">2015</a>
                                                </li>
                                                <li>
                                                    <a name='archive' href="<?= base_url('Site/archive?value=2014')?>" title="">2014</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                </form>  
<!--******************************8ADVERTISEMENTS*****************************-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- right side bar ad- 2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-2717318155423018"
     data-ad-slot="1468757486"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                
<!--                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!-- rightsidebarad - 3 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-2717318155423018"
     data-ad-slot="5898957085"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                
                                
<!--								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!-- RightSideBar 1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-2717318155423018"
     data-ad-slot="1930722684"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                
                                
<!--******************************END ADVERTISEMENTS*****************************-->
                        
                            </div>
                            <!-- End Widget -->
                            
                        </div>
                        <!-- End Sidebar -->
<!--************************************RIGHT SIDEBAR START************************************-->

<!--************************************CLOSING THE CENTRAL BODY************************************-->


                    </div>
                    
                </div>
            </section>
                        <h3 align="center">Page rendered in <strong>{elapsed_time}</strong> seconds.    </h3>                                

            <!-- End Section -->
<!--************************************CLOSING THE CENTRAL BODY************************************-->
