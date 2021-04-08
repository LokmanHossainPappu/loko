<?php 

  get_template_part('inc/theme-option');
  
  function theme_support(){

     add_theme_support('title-tag');
     load_theme_textdomain('halim', get_template_directory_uri().'/languages');
     add_theme_support('post-thumbnails', array('post','sliders','teams','testimonials','protfolio'));


     register_nav_menus(array(
         'primary_menu' => 'primary menu',
         
     ) );


  }

  add_action('after_setup_theme', 'theme_support');



function css_js_enqueue(){

    // enqueue css files
    
    wp_enqueue_style('main-css',get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '1.0', 'all' );
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), '1.0', 'all' );
    wp_enqueue_style('owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '1.0', 'all' );
    wp_enqueue_style('responsive-css', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.0', 'all' );

// Js enqueue file
   
   wp_enqueue_script('popper-js', get_template_directory_uri().'/assets/js/popper.min.js',array('jquery') ,'1.0', true);
   wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('owl.carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('jquery.magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('imageloaded', get_template_directory_uri().'/assets/js/imageloaded.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('jquery.counterup', get_template_directory_uri().'/assets/js/jquery.counterup.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('waypoint', get_template_directory_uri().'/assets/js/waypoint.min.js', array('jquery'), '1.0', true);
   wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js', array(), '1.0', true);



 
};

add_action('wp_enqueue_scripts','css_js_enqueue');

// slider Custom Posts

function custom_posts(){

  register_post_type('sliders', array(
    'labels' => array(
      'name' => __('sliders', 'halim'),
      'singular_name' => __('slider','halim'),
      
    ),
    'public' => true,
    'supports' => array('title','editor','thumbnail','custom-fields')
  ));
   
// Services custom posts

  register_post_type('services', array(
    'labels' => array(
      'name' => __('services', 'halim'),
      'singular_name' => __('service', 'halim'),
    ),
    'public' => true,
    'supports' => array('title','editor','custom-fields')
  ));

// custom posts for Team section 

  register_post_type('teams', array(
    'labels' => array(
      'name' => __('teams', 'halim'),
      'singular_name' => __('team', 'halim'),
    ),
    'public' => true,
    'supports' => array('title','editor','thumbnail','custom-fields','page-attributes')
  ));

// custom post for testimonial slider

  register_post_type('testimonials', array(
    'labels' => array(
      'name' => __('testimonials', 'halim'),
      'singular_name' => __('testimonial', 'halim'),
      
    ),
    'public' => true,
    'supports' => array('title','editor','thumbnail','custom-fields',)
  ));

  // Galley custom post

  register_post_type('gallery', array(
    'labels' => array(
      'name' => __('Gallerys', 'halim'),
      'singular_name' => __('Gallery', 'halim'),
      
    ),
    'public' => true,
    'supports' => array('title','custom-fields','page-attributes')
  ));
 
  // Protfolio custom post

  register_post_type('protfolio', array(
    'labels' => array(
      'name' => __('protfolios', 'halim'),
      'singular_name' => __('protfolio', 'halim'),
      
    ),
    'public' => true,
    'supports' => array('title','editor','thumbnail','custom-fields','page-attributes')
  ));

  //Portfolio Taxonomy

  register_taxonomy('portfolio-cat', 'portfolio',array(
    'labels' => array(
      'name' => __('Categories', 'halim'),
      'singular_name' => __('Category', 'halim')
    ),

    'hierarchical'    => true

  ));

};

add_action('init', 'custom_posts');

// arrange comments style

function halim_comment_fields($fields){

  $comment = $fields['comment'];
  $author = $fields['author'];
  $email = $fields['email'];
  $url = $fields['url'];
  $cookies = $fields['cookies'];

  unset( $fields['comment']);
  unset( $fields['author']);
  unset( $fields['email']);
  unset( $fields['url']);
  unset( $fields['cookies']);
  
  $fields['name'] = $author;
  $fields['email'] = $email;
  $fields['website'] = $url;
  $fields['comment'] = $comment;
  $fields['cokkies'] = $cookies;

  return $fields;
};

add_filter('comment_form_fileds','halim_comment_fields');


// custom widgets

function halim_widgets(){

  // Custom sidebar widgets for sidebar

  register_sidebar(array(
      'name' => __('Main Sidebar', 'halim'),
      'id' => 'main_sidebar',
      'description' => __('Main sidebar for Blog Page', 'halim'),
      'before_widget' => '<div class="single-sidebar"> ',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>'
  ));

  // Custom sidebar widgets for footer

  register_sidebar(array(
    'name' => __('Footer Sidebar 1', 'halim'),
    'id' => 'footer_sidebar1',
     'description' => __('Footer widget 1 for showing widget', 'halim'),
     'before_widget' => '<div class="single-footer footer-logo"> ',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Footer Sidebar 2', 'halim'),
    'id' => 'footer_sidebar2',
     'description' => __('Footer widget 2 for showing widget', 'halim'),
     'before_widget' => '<div class="single-footer "> ',
     'after_widget' => '</div>',
     'before_title' => '<h4>',
     'after_title' => '</h4>'
  ));

  register_sidebar(array(
    'name' => __('Footer Sidebar 3', 'halim'),
    'id' => 'footer_sidebar3',
     'description' => __('Footer widget 3 for showing widget', 'halim'),
     'before_widget' => '<div class="single-footer "> ',
     'after_widget' => '</div>',
     'before_title' => '<h4>',
     'after_title' => '</h4>'
  ));
  
  register_sidebar(array(
    'name' => __('Footer Sidebar 4', 'halim'),
    'id' => 'footer_sidebar4',
     'description' => __('Footer widget 3 for showing widget', 'halim'),
     'before_widget' => '<div class="single-footer contact-box"> ',
     'after_widget' => '</div>',
     'before_title' => '<h4>',
     'after_title' => '</h4>'
  ));
  
  
}

add_action('widgets_init', 'halim_widgets');