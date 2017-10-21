<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors_Model extends CI_Model {

    public function getDetails($author_id)
    {      $query = $this->db->get_where('authors',array('author_id'=>$author_id));
            return $query->result();
    }
    
    public function printAuthor($author_id)
    {
        $query = $this->db->get_where('authors',array('author_id'=>$author_id));
        return $query->result();
//            echo $author[0]->author_id;
//            echo $author[0]->author_name;
//            echo $author[0]->designation;
//            echo $author[0]->organization;
//            echo $author[0]->description;
//            
//             return ' 
//                 <style>
//                 .img-circle {
//                    border-radius: 50%;
//                    
//                 }
//                 
//.auth-img {
//padding-top: 45% !important;
//width:150px;
//float:right;
//}
//
//.auth-section{
//background: white; margin-top: 10px;
//border:2px ;
//}
//                 </style>
//                    <!-- Product Content -->
//                                        <h2 class="font-alt" align="center">About the author</h2>    
//
//                    <div class="row mb-60 mb-xs-30 auth-section" >
//                        <!-- Product Images -->
//                        <div class="col-md-4 mb-md-30">
//                            <div class="post-prev-img ">
//                                
//                                <a href="'. base_url().'assets/images/Authors/'.$author[0]->author_id.'.jpg" class="lightbox-gallery-3 mfp-image ">
//                                    <img  class="auth-img img-circle " src="'. base_url().'assets/images/Authors/'.$author[0]->author_id.'.jpg" alt="" />
//                                </a>
//                                <div class="intro-label">
//                                    <!--<span class="label label-danger bg-red">QuickChex</span>-->
//                                </div>
//                            </div>
//                                
//					   </div>
//                        <!-- End Product Images -->
//                        
//                        <div class="col-md-8 mb-md-30">
//                        <!-- Product Description -->
//                                <div class="mb-xs-40">
//                                    <!--col-sm-8 col-md-5--> 
//                                       <h3 class="font-alt" align="center">'.$author[0]->author_name.'</h3>
//                            <p class="font-alt mt-0" align="center">
//                            '.$author[0]->designation.' at <a href="http://www.euline.in"><b> '.$author[0]->organization.'</b></a>
//                         </p>
//                                
//                     
//                                    <hr class="mt-0 mb-10"/>
//
//                                    <!--<div class="section-text mb-30">-->
//                                    <p >'.$author[0]->description.'
//                                        </p>
//                                    <!--</div>-->
//                                </div>
//                                    <hr class="mt-0 mb-30"/> 
//                            
//                        </div>
//                        <!-- End Product Description -->
//                        
//                        
//                    </div>
//                    <!-- End Product Content -->
//                    ';
//
            
            
            
        
    }
    
}