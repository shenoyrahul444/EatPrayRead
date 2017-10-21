<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <meta name="description" content="<?= $description ?>">
        <meta name="keywords" content="<?= $keywords?>">
        <meta charset="utf-8">
        <meta name="author" content="<?= $author ?>">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        
        <?= link_tag('assets/images/favicon.png',$rel='shortcut icon')?>
        <?= link_tag('assets/images/apple-touch-icon.png',$rel='apple-touch-icon')?>
        <?= link_tag('assets/images/apple-touch-icon-72x72.png',$rel='apple-touch-icon',$sizes = '72x72')?>
        <?= link_tag('assets/images/apple-touch-icon-144x144.png',$rel='apple-touch-icon',$sizes = '114x114')?>
      
        
<!--***********************CSS***********************-->
        <?= link_tag('assets/css/bootstrap.min.css')?>
        <?= link_tag('assets/css/style.css')?>
        <?= link_tag('assets/css/style-responsive.css')?>
        <?= link_tag('assets/css/animate.min.css')?>
        <?= link_tag('assets/css/vertical-rhythm.min.css')?>
        <?= link_tag('assets/css/owl.carousel.css')?>
        <?= link_tag('assets/css/magnific-popup.css')?>
        <?= link_tag('assets/css/socialmediasidebar.css')?>
<!--***********************CSS***********************-->


        <?= link_tag('assets/css/font-awesome.min.css')?>
	    <script src="<?= base_url()?>assets/js/angular.min.js" ></script>

<!--***********FOR TESTING ANgular-Bootstrap MODAL --> 	    <script src="<?= base_url()?>assets/js/ui-bootstrap-tpls-1.3.3.min.js" ></script>
        
        <!-- Google Tag Manager -->
<!--
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W2FZSWR');</script>
-->
<!-- End Google Tag Manager -->
        
		
    </head>
        <!--****************All pages use Angular Now****************-->
    <body ng-app="article" ng-controller="articleCtrl"  class="appear-animate"> 
        <!--****************All pages use Angular Now****************-->
   
        <!-- Page Loader -->        

        <div class="page-loader">
            <div class="lets-load"></div>
        </div>

        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">

            <!-- Navigation panel -->
            <nav class="main-nav  stick-fixed " > <!--- dark transparent --->
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll" >
                        <a href="<?= site_url();?>" class="logo">
                            <!--<img src="images/logo.png" />-->
                            <?= img('assets/images/logo-dark.png',FALSE)?>
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <!--<li class="active"><a href="index.php">Home</a></li>-->
                            <li><a href="<?= base_url()?>">Home</a></li>                            
                            <li><a href="<?= base_url()?>Technology">Technology</a></li>                            
                            <li><a href="<?= base_url()?>DigitalMedia">Digital Media</a></li>
							<li><a href="<?=  base_url()?>DataScience">Data Science</a></li> 
                            <!--<li><a href="<?php // base_url()?>Opinions">Opinions</a></li>-->
                            <li><a href="<?= base_url()?>Site/connect">Connect</a></li>

                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->

         