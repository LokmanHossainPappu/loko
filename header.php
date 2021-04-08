
 <?php $config = get_option('Halim-options'); ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Title -->
      <title>Halim | Onepage Multipurpose Website</title>
      <!-- Font Google -->
     
      <?php wp_head(); ?>
   </head>
   <body>
	   <section class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="header-left">
            
             
         <?php  
            if($config['header_email']){
         ?>
            <a href="mailto: <?php echo $config['header_email']; ?>"><i class="fa fa-envelope"></i> <?php echo $config['header_email']; ?> </a>
         <?php 
          }

         ?>	

         <?php  
            if($config['header_email']){
         ?>
            <a href="tel:<?php echo $config['header_phone']; ?>"><i class="fa fa-phone"></i><?php echo $config['header_phone']; ?></a>
         <?php 
          }

         ?>	
							
						</div>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="header-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-youtube"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
							<a href=""><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>
			</div>
	   </section>
      <!-- Header Area Start -->
      <header class="header header-fixed">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <nav class="navbar navbar-expand-md navbar-light">
                     <a class="navbar-brand" href="#">halim</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse ml-auto mainmenu justify-content-end" id="navbarNav">
                       
                      <?php  
                      
                      wp_nav_menu(array(
                         'theme_location' => 'primary_menu',
                         'menu_class' => 'navbar-nav ml-auto'
                      ));
                      
                      
                      ?>

                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>


