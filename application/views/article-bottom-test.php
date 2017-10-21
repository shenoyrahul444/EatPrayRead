
<?php
    // if($article_liked == 1){ 
      //                                  echo '<div class="success">You have already liked this article</div>';
//}else{
//                                        echo '<div class="error">Please click like if you found this article interesting</div>';
//}
?>


<!--<div ng-app="like" ng-controller="likeCtrl">-->
               
               
               
                        <!--<button type="submit" name="like" title="Facebook" target="_blank">-->
                            <!--<h2>                            {{likeResponse}} </h2>-->
                            <div class="{{like_suggestion_class}}">{{like_suggestion_text}}</div>
                        <button type="submit" class="{{like_class}}" style="background:none;" ng-click="likeClick()"></button>
                            
                        <?php
                            // if($article_liked == 0){ 
                               //         echo '<i class="fa fa-thumbs-o-up" style="background: none;">';                            
                            // }else{
                              //          echo '<i class="fa fa-thumbs-up" style="background: none;">';
                                //}
                            ?>
                            
                                 {{total_likes}} people liked this</i>
                            
<!--                        </button>-->
<!--</div>-->
<?php // form_close()?>       

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
<!--
                        <div  class="fb-like"  data-share="true"  data-width="450"  data-show-faces="true" data-background="">

                        </div>
                        
-->
                  <!--Like Button Below Post-->


<!--Getsocial.io plugin Social sharing bar -->
<br>
<!--
<div class="getsocial gs-inline-group"></div>
            <script type="text/javascript">
            'function'!=typeof loadGsLib&&(loadGsLib=function(){var e=document.createElement("script");
            e.type="text/javascript",e.async=!0,e.src='//api.at.getsocial.io/widget/v1/gs_async.js?id=d0e68c';
            var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();
            </script>
-->
<!--Getsocial.io plugin Social sharing bar -->

<!--********************************************FACEBOOK LIKE SHARE AND SIDEBAR START********************************************-->
                  
    <!--******ABOUT AUTHOR SECTION******-->
     <?php // $author_section_print 
// print_r($author[0]);
     
     ?>
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
                                	
                                    
                    <form class="form" name="commentForm" novalidate>
                                    
                                    
                                    <div class="row mb-20 mb-md-10">
                                        <div class="col-md-6 mb-md-10">
                                             <!--Name--> 
                                         <span class="error mb-10" style="text-align:center; font-weight: 800" ng-show=" commentForm.name.$touched &&  commentForm.name.$error.required">Name is required.</span>
                                            <input type="text" ng-model="name" name="name" id="name" class="input-md form-control" placeholder="Name *" maxlength="100" required>
                                         
                                        </div>
                                    </div>
                                     
                                     <!--Comment--> 
                                    <div class="mb-30 mb-md-10" id="comment" >
                                         <span class="error mb-10" style="text-align:center; font-weight: 800" ng-show=" commentForm.comment.$touched &&  commentForm.comment.$error.required">Comment is required.</span>                                        
                                        <textarea  ng-model="comment" name="comment" class="input-md form-control" rows="6" placeholder="Comment *" maxlength="400" required></textarea>
                                    </div>

                                     <!--Send Button--> 
                                     <button type="submit" ng-click="addComment()" class="btn btn-mod btn-medium btn-round btn-round mb-20" 
                                         ng-disabled="commentForm.name.$invalid || commentForm.comment.$invalid ||
                                          commentForm.name.$untouched || commentForm.name.$untouched ||
                                          commentForm.name.$touched && commentForm.name.$error.invalid 
                                          || commentForm.comment.$touched &&  commentForm.comment.$error.invalid">
                                        <!--Send comment-->Submit
                                    </button>   
                                        <!--{{val}}-->
                        
                        <div class="{{comment_status_type}} mb-10">{{comment_status}}</div>
                            </form>
                        
                         <!--End Add Comment--> 
    				
                    <!--View Comments-->    
                    <div class="mb-80 mb-xs-40" style="background: white; padding: 20px;" id="comments">
                                
                                <h4 class="blog-page-title font-alt">Comments<small class="number">
                                    ({{total_comments_count}})
                                     <!--##Neeeds to be changed-->
                                    </small></h4>
                                <ul class="media-list text comment-list clearlist">
                                     <!--Comment Item--> 

                        <li class="media comment-item" ng-repeat="comment in comments">
                                    	
                                        <a class="pull-left" href="#">
                                            <img class="media-object comment-avatar" src="<?= base_url()?>assets/images/user-avatar.png" alt="" width="50" height="50">
                                        </a>
                                        
                                        <div class="media-body">
    										
                                            <div class="comment-item-data">
                                                <div class="comment-author">
                                                    <a href="#"><h5><b>{{comment.comment_author_name}}</b></h5> </a>
                                                    
                                                </div>
                                                {{comment.day + '/' + comment.month + '/' + comment.year}}
                                                <!--Feb 9, 2014, at 10:23-->
                                                <!--<span class="separator">&mdash;</span>
                                                <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>-->
                                            </div>
    										
                                            <p>
                                                <?php // $comment->comment_content?>
                                                {{comment.comment_content}}
                                               
                                            </p>
    										
                                        </div>
    									
                                    </li>
                                     <!--End Comment Item--> 
                                </ul>
    							
                            </div>
                    <!--End View Comments--> 
	                  </div>
            </div>
                        
    <!--End Column Division-->                         
    
