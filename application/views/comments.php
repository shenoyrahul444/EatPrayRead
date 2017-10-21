
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">                    
                    <div class="row">
                        <!-- Content -->
                        <div class="col-sm-8">

                        <!--Leave Comment Start-->
                            <div class="mb-80 mb-xs-40">	
                                <h4 class="blog-page-title font-alt">Leave a comment</h4>
                                	 <!--Add Comment--> 
                                	
                                <!--Form--> 
                                <?= form_open('')?>
                                    
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
                                    <div class="mb-30 mb-md-10">
                                        <textarea  name="comment" class="input-md form-control" rows="6" placeholder="Comment" maxlength="400" required></textarea>
                                    
                                        <!--id="text"-->
                                    </div>
                                    
                                     <!--Send Button--> 
                                     <button type="submit" name="submit" value ='1' class="btn btn-mod btn-medium btn-round btn-round">
                                        <!--Send comment-->Submit
                                    </button>
    								
                                <?= form_close()?>
                                     <?= $comments_result ?>
    							 <!--End Form--> 
    								
                        </div>
                         <!--End Add Comment--> 
    				
                            
                            <div class="mb-80 mb-xs-40">
                                
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
                    <!--End Comments--> 
    		    </div>
                <!--End Content -->
                   </div>
               </div>
           </section>