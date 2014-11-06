<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

      <?php get_template_part('templates/page', 'header'); ?>

    <?php endif; ?>

    <div class="max-wrap righto">

      <?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'templates/content', 'page' ); ?>

          <?php endwhile; // end of the loop. ?>

      <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

        <?php wc_get_template( 'loop/no-products-found.php' ); ?>

      <?php endif; ?>

    </div>