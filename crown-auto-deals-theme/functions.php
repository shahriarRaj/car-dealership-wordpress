<?php
if(!defined('ABSPATH'))exit;
function cad_theme_setup(){add_theme_support('title-tag');add_theme_support('post-thumbnails');add_theme_support('html5',['search-form','comment-form','gallery','caption']);register_nav_menus(['primary'=>'Primary Menu']);}
add_action('after_setup_theme','cad_theme_setup');
function cad_theme_assets(){wp_enqueue_style('cad-theme',get_stylesheet_uri(),[], '1.0.0');}add_action('wp_enqueue_scripts','cad_theme_assets');
function cad_featured_cars(){ $q=new WP_Query(['post_type'=>'cad_car','posts_per_page'=>6,'meta_key'=>'_cad_stock','meta_value'=>'Featured']);ob_start();echo '<div class="car-grid">';while($q->have_posts()){$q->the_post();get_template_part('template-parts/car-card');}wp_reset_postdata();echo '</div>';return ob_get_clean();}add_shortcode('cad_featured_cars','cad_featured_cars');
