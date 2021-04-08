<?php
/**
 * Template Name: Services
 */

get_header(); ?>

<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
            <?php get_template_part('/inc/breadcumb'); ?>
            </div>
        </div>
    </div>
</section>

<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
         <div class="container">
            <div class="row">
            <?php 
   
   $args = array(
      'post_type'=> 'services',
       'posts_per_page' => -1,
       'order' => 'DSC'
   );

   $query = new WP_Query($args);
    while($query -> have_posts()){
      $query -> the_post();
      
      $icon = get_field('services_icon');
   ?>
             <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div class="single-service">
                   <i class="<?php echo $icon ?>"></i>
                   <h4> <?php the_title(); ?></h4>
                   <p> <?php the_content(); ?> </p>
                </div>
             </div>
           <?php }
             wp_reset_postdata();
           ?>
            </div>
         </div>
      </section>
      <!-- Services Area End -->
 <?php get_footer(); ?>