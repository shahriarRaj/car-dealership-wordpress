<?php
if (!defined('ABSPATH')) exit;
function cad_register_post_types(){
 register_post_type('cad_car',['labels'=>['name'=>'Cars','singular_name'=>'Car','add_new_item'=>'Add Car'],'public'=>true,'has_archive'=>'used-cars','rewrite'=>['slug'=>'used-cars'],'menu_icon'=>'dashicons-car','supports'=>['title','editor','thumbnail','excerpt'],'show_in_rest'=>true]);
 register_post_type('cad_transaction',['labels'=>['name'=>'Transactions','singular_name'=>'Transaction'],'public'=>false,'show_ui'=>true,'menu_icon'=>'dashicons-clipboard','supports'=>['title','editor'],'show_in_rest'=>false]);
 register_post_type('cad_document',['labels'=>['name'=>'Customer Documents','singular_name'=>'Customer Document'],'public'=>false,'show_ui'=>true,'menu_icon'=>'dashicons-media-document','supports'=>['title'],'show_in_rest'=>false]);
}
function cad_register_taxonomies(){register_taxonomy('cad_make','cad_car',['label'=>'Makes','public'=>true,'rewrite'=>['slug'=>'make'],'show_in_rest'=>true]);register_taxonomy('cad_body','cad_car',['label'=>'Body Types','public'=>true,'rewrite'=>['slug'=>'body-type'],'show_in_rest'=>true]);}
add_action('init','cad_register_post_types');add_action('init','cad_register_taxonomies');
function cad_car_fields($id){return ['price'=>get_post_meta($id,'_cad_price',true),'year'=>get_post_meta($id,'_cad_year',true),'mileage'=>get_post_meta($id,'_cad_mileage',true),'fuel'=>get_post_meta($id,'_cad_fuel',true),'transmission'=>get_post_meta($id,'_cad_transmission',true),'stock'=>get_post_meta($id,'_cad_stock',true)];}
