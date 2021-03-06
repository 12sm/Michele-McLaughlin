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
      <div class="max-wrap">
        <?php get_template_part('templates/page', 'header'); ?>
      </div>

    <?php endif; ?>

    <div class="max-wrap">

      <?php if ( have_posts() ) : ?>

        <?php woocommerce_product_loop_start(); ?>

          <?php woocommerce_product_subcategories(); ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>

          <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

      <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

        <?php wc_get_template( 'loop/no-products-found.php' ); ?>

      <?php endif; ?>

    </div>
