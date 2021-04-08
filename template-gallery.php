<?php
/**
 * Template Name: Gallery
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

<section class="gallery-area pt-100 pb-100">
    <div class="container">
        <div class="row">

         <?php 
              $args = array(
                  'post_type' => 'gallery',
                  'posts_per_page' => -1
              );
              $query = new WP_Query($args);
              while($query -> have_posts()){
                  $query -> the_post();
                  $normal_image = get_field('normal_image');
                  $bg_image = get_field('bg_image');
             ?>
                  <div class="col-xl-4">
                  <div class="single-gallery">
                       <img src="<?php echo $normal_image['url']; ?>" alt="">
                       <div class="gallery-hover">
                          <div class="gallery-content">
                             <h3><a href="<?php echo $bg_image['url'];?>" class="gallery"><i class="fa fa-plus"></i> <?php the_title(); ?> </a></h3>
                          </div>
                      </div>
                  </div>
              </div>
             <?php 
              };
         ?>

            
            
        </div>
    </div>
</section>
 <!-- CTA Area Start -->
<?php get_footer(); ?>