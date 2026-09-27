<?php
/**
 * Plugin Name: Crown Auto Deals Core
 * Description: Inventory, customer accounts, transactions, invoices, warranty documents, search and lead handling for Crown Auto Deals.
 * Version: 1.0.0
 * Requires at least: 6.2
 * Requires PHP: 7.4
 * Author: Crown Auto Deals
 * Text Domain: cad-core
 */
if (!defined('ABSPATH')) exit;
define('CAD_CORE_VERSION','1.0.0');
define('CAD_CORE_FILE',__FILE__);
define('CAD_CORE_DIR',plugin_dir_path(__FILE__));
define('CAD_CORE_URL',plugin_dir_url(__FILE__));
require_once CAD_CORE_DIR.'includes/cpt.php';
require_once CAD_CORE_DIR.'includes/meta.php';
require_once CAD_CORE_DIR.'includes/forms.php';
require_once CAD_CORE_DIR.'includes/dashboard.php';
require_once CAD_CORE_DIR.'includes/seo.php';
require_once CAD_CORE_DIR.'includes/admin.php';
function cad_core_activate(){cad_register_post_types();cad_register_taxonomies();flush_rewrite_rules();}
function cad_core_deactivate(){flush_rewrite_rules();}
register_activation_hook(__FILE__,'cad_core_activate');
register_deactivation_hook(__FILE__,'cad_core_deactivate');
add_action('wp_enqueue_scripts',function(){wp_enqueue_style('cad-core',CAD_CORE_URL.'assets/css/core.css',[],CAD_CORE_VERSION);wp_enqueue_script('cad-core',CAD_CORE_URL.'assets/js/core.js',[],CAD_CORE_VERSION,true);wp_localize_script('cad-core','cadCore',['ajaxUrl'=>admin_url('admin-ajax.php'),'nonce'=>wp_create_nonce('cad_search')]);});
