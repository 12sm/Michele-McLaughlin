<?php

define( 'UPLOADS', ''.'media' );

//Length shortcode
add_shortcode('trim', 'trim_shortcode');
function trim_shortcode($atts, $content = '') {
  $content = wpv_do_shortcode($content);
  $length = (int)$atts['length'];
  if (strlen($content) > $length) {
    $content = substr($content, 29, $length) . '&hellip;';
  }
  return $content;
}

/**
* WooCommerce: Show only one custom product attribute above Add-to-cart button on single product page.
*/
function woo_get_key_pa(){

    // Edit below with the title of the attribute you wish to display
    $desired_att = 'Key Signature';

    global $product;
    $attributes = $product->get_attributes();

    if ( ! $attributes ) {
        return;
    }

    $out = '';

    foreach ( $attributes as $attribute ) {

        if ( $attribute['is_taxonomy'] ) {

            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = 'key-signature';

            // if this is desired att, get value and label

            if ( $attribute['name'] == 'pa_' . $tax_slug ) {

                $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );

                // get the taxonomy
                $tax = $terms[0]->taxonomy;

                // get the tax object
                $tax_object = get_taxonomy($tax);

                // get tax label
                if ( isset ($tax_object->labels->name) ) {
                    $tax_label = $tax_object->labels->name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                }

                foreach ( $terms as $term ) {

                    $out .= $term->name;
                    $out .= '<br />';

                }

            } // our desired att

        } else {

            // for atts which are NOT registered as taxonomies

            // if this is desired att, get value and label
            if ( $attribute['name'] == $desired_att ) {
                $out .= $attribute['name'] . ': ';
                $out .= $attribute['value'];
            }
        }


    }

    return $out;
}
add_shortcode('product-att-key', 'woo_get_key_pa');

function woo_get_level_pa(){

    // Edit below with the title of the attribute you wish to display
    $desired_att = 'Level';

    global $product;
    $attributes = $product->get_attributes();

    if ( ! $attributes ) {
        return;
    }

    $out = '';

    foreach ( $attributes as $attribute ) {

        if ( $attribute['is_taxonomy'] ) {

            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $desired_att)));

            // if this is desired att, get value and label

            if ( $attribute['name'] == 'pa_' . $tax_slug ) {

                $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );

                // get the taxonomy
                $tax = $terms[0]->taxonomy;

                // get the tax object
                $tax_object = get_taxonomy($tax);

                // get tax label
                if ( isset ($tax_object->labels->name) ) {
                    $tax_label = $tax_object->labels->name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                }

                foreach ( $terms as $term ) {

                    $out .= $term->name;

                }

            } // our desired att

        } else {

            // for atts which are NOT registered as taxonomies

            // if this is desired att, get value and label
            if ( $attribute['name'] == $desired_att ) {
                $out .= $attribute['name'] . ': ';
                $out .= $attribute['value'];
            }
        }


    }

    return $out;
}
add_shortcode('product-att-level', 'woo_get_level_pa');

?>
