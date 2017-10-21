<?php if($article_liked == 1){ 
                                        echo '<div class="success">You have already liked this article</div>';
}else{
                                        echo '<div class="error">Please click like if you found this article interesting</div>';
}
?>
               <?= form_open('')?>
               
               
                        <button type="submit" name="like" title="Facebook" target="_blank">
                        <?php if($article_liked == 0){ 
                                        echo '<i class="fa fa-thumbs-o-up" style="background: none;">';                            
                            }else{
                                        echo '<i class="fa fa-thumbs-up" style="background: none;">';
                                }
                                ?>
                                 <i><?= $total_likes ?> people liked this</i>
                            
                        </button>
                <?= form_close()?>
       

                         <?php if($sources != 'none'){
                             echo '<blockquote>
                                        <cite title="Source Title">
                                            <b>Sources :-</b> '.$sources.'
                                        </cite>
                                    </blockquote>
                    ';
                         }
?>
                                    
                   

<!--********************************************FACEBOOK LIKE SHARE AND SIDEBAR START********************************************-->

<script>
//  window.fbAsyncInit = function() {
//    FB.init({
//      appId      : '446026115589931',
//      xfbml      : true,
//          version    : 'v2.5'
//    });
//  };
//
//  (function(d, s, id){
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if (d.getElementById(id)) {return;}
//     js = d.createElement(s); js.id = id;
//     js.src = "//connect.facebook.net/en_US/sdk.js";
//     fjs.parentNode.insertBefore(js, fjs);
//   }(document, 'script', 'facebook-jssdk'));
</script>

<!--Sticky Sidebar-->

<!--Sticky Sidebar-->

                <!--Sticky Side-->

                        <aside id="sticky-social">
                            <ul>
                                <li><a href="https://www.facebook.com/Eat-Pray-Read-1648177492113582/?fref=ts" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
                            </ul>
                        </aside>

                <!--Sticky Side-->
    
    
    
                  <!--Like Button Below Post-->
                        <div  class="fb-like"  data-share="true"  data-width="450"  data-show-faces="true" data-background="">

                        </div>
                  <!--Like Button Below Post-->

<!--********************************************FACEBOOK LIKE SHARE AND SIDEBAR START********************************************-->
                  
    <!--******ABOUT AUTHOR SECTION******-->
     
            <style>
                 .img-circle {
                    border-radius: 50%;
                    
                 }
                 
.auth-img {
padding-top: 45% !important;
width:150px;
float:right;
}

.auth-section{
background: white; margin-top: 10px;
border:2px ;
}
                 </style>
                    <!-- Product Content -->
                    <h2 class="font-alt" align="center">About the author</h2>    

                    <div class="row mb-60 mb-xs-30 auth-section" >
                        <!-- Product Images -->
                        <div class="col-md-4 mb-md-30">
                            <div class="post-prev-img ">
                                
                                <a href="<?= base_url() ?>'assets/images/Authors/'.<?= $author->author_id ?>'.jpg" class="lightbox-gallery-3 mfp-image ">
                                    <img  class="auth-img img-circle " src="<?= base_url()?>assets/images/Authors/<?= $author->author_id ?>.jpg" alt="" />
                                </a>
                                <div class="intro-label">
                                    <!--<span class="label label-danger bg-red">QuickChex</span>-->
                                </div>
                            </div>
                                
					   </div>
                        <!-- End Product Images -->
                        
                        <div class="col-md-8 mb-md-30">
                        <!-- Product Description -->
                                <div class="mb-xs-40">
                                    <!--col-sm-8 col-md-5--> 
                                       <h3 class="font-alt" align="center"><?= $author->author_name ?></h3>
                            <p class="font-alt mt-0" align="center">
                            <?= $author->designation ?> at <b> <?= $author->organization ?></b>
                         </p>
                                
                     
                                    <hr class="mt-0 mb-10"/>

                                    <!--<div class="section-text mb-30">-->
                                    <p ><?= $author->description ?>
                                        </p>
                                    <!--</div>-->
                                </div>
                                    <hr class="mt-0 mb-30"/> 
                            
                        </div>
                        <!-- End Product Description -->
                        
                        
                    </div>
                    <!-- End Product Content -->

    <!--******ABOUT AUTHOR SECTION******-->
 
    
    <!--******************** COMMENTS START-->
                                               
                            </div>
                                 <!--End Text--> 
    							
            </div>
                            <!--End Post--> 
                        <!--Leave Comment Start-->
                            <div class="mb-80 mb-xs-40">	
                                <h4 class="blog-page-title font-alt">Leave a comment</h4>
                                	 <!--Add Comment--> 
                                	
                                <!--Form--> 
                                <?php echo form_open('')?>
                                <!--<form>-->
                                    <div class="row mb-20 mb-md-10">
                                        
                                        <div class="col-md-6 mb-md-10">
                                             <!--Name--> 
                                            <input type="text" name="name" id="name" class="input-md form-control" placeholder="Name *" maxlength="100" required>
                                        </div>
                                        
<!--                                        <div class="col-md-6">
                                             Email 
                                            <input type="email" name="email" id="email" class="input-md form-control" placeholder="Email *" maxlength="100" required>
                                        </div>-->
                                        
                                    </div>
                                    
<!--                                    <div class="mb-20 mb-md-10">
                                         Website 
                                        <input type="text" name="website" id="website" class="input-md form-control" placeholder="Website" maxlength="100" required>
                                    </div>
                                    -->
                                     <!--Comment--> 
                                    <div class="mb-30 mb-md-10" id="comment" >
                                        <textarea  name="comment" class="input-md form-control" rows="6" placeholder="Comment" maxlength="400" required></textarea>
                                    
                                        <!--id="text"-->
                                    </div>

                                     <!--Send Button--> 
                                     <button type="submit" name="submit" id="submit" value ='1' class="btn btn-mod btn-medium btn-round btn-round">
                                        <!--Send comment-->Submit
                                    </button>
                                </form>			
                                <?php // echo form_close()?>
                                     <?= $comments_result ?>
    							 <!--End Form--> 
    								
                        </div>
                         <!--End Add Comment--> 
    				
                    <!--View Comments-->    
                    <div class="mb-80 mb-xs-40" style="background: white; padding: 20px;" id="comments">
                                
                                <h4 class="blog-page-title font-alt">Comments<small class="number">(<?= $comments_count?>)</small></h4>
                                <ul class="media-list text comment-list clearlist">
                                     <!--Comment Item--> 
<?php foreach ($comments as $comment){ ?>
                                     <li class="media comment-item">
                                    	
                                        <a class="pull-left" href="#">
                                            <img class="media-object comment-avatar" src="images/user-avatar.png" alt="" width="50" height="50">
                                        </a>
                                        
                                        <div class="media-body">
    										
                                            <div class="comment-item-data">
                                                <div class="comment-author">
                                                    <a href="#"><?= $comment->comment_author_name ?></a>
                                                </div>
                                                <?php // $comment->day.' '.$comment->month.' '.$comment->year?>
                                                <!--Feb 9, 2014, at 10:23-->
                                                <!--<span class="separator">&mdash;</span>-->
                                                <!--<a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>-->
                                            </div>
    										
                                            <p>
                                                <?= $comment->comment_content?>
                                                <!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.-->
                                            </p>
    										
                                        </div>
    									
                                    </li>
                                     <!--End Comment Item--> 
    <?php 
}
    ?>								
                                </ul>
    							
                            </div>
                    <!--End View Comments--> 
	
                
                        </div>
                        
                        
    <!--End Column Division-->                         
