<?php
if (!defined('ABSPATH')) exit;
add_action('wp_head',function(){if(is_singular('cad_car')){$id=get_the_ID();$f=cad_car_fields($id);$data=['@context'=>'https://schema.org','@type'=>'Vehicle','name'=>get_the_title(),'url'=>get_permalink(),'image'=>get_the_post_thumbnail_url($id,'large'),'offers'=>['@type'=>'Offer','price'=>preg_replace('/[^0-9.]/','',$f['price']),'priceCurrency'=>'AUD','availability'=>'https://schema.org/InStock']];echo '<script type="application/ld+json">'.wp_json_encode($data).'</script>';}});
add_filter('document_title_parts',function($parts){if(is_post_type_archive('cad_car'))$parts['title']='Used Cars for Sale | Crown Auto Deals';return $parts;});
add_action('wp_head',function(){if(!is_admin()){echo '<meta name="description" content="Quality inspected used cars, finance and warranty support from Crown Auto Deals.">';}});
