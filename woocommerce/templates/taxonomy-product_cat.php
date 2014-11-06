<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template.
 *
 * Override this template by copying it to yourtheme/woocommerce/taxonomy-product_cat.php
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


//wc_get_template( 'archive-product.php' );

?>


<div class="col">
<div class="page-header">
  <h1>
    <?php echo roots_title(); ?>
  </h1>
</div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <?php echo do_shortcode('[wpv-view name="STORE-MENU"]'); ?>
      </div>
    </div>
      <?php echo do_shortcode('[wpv-view name="STORE-OTHER"]'); ?>
  </div>
</div>