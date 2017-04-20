
<?php
/*
Plugin Name: Woocommerec Custom Mini Cart
Version: 1.0.1
Plugin URI: https://github.com/GaganTiwari/WC-Direct-Place-Order-Without-Payment
Description: This is Woocommerec custom Mini Cart plugin 
Author: Hariom Srivastava
License: GPL v3
Woocommerec custom Mini Cart
Copyright (C) 2017, 

*/

// register jquery and style on initialization
add_action('init', 'register_script');
function register_script(){
	wp_register_script( 'custom_jquery', plugins_url('/js/custom-jquery.js', __FILE__), array('jquery'), '2.5.1' );
	
	wp_register_style( 'custom-mini-cart-css', plugins_url('/css/custom-mini-cart-css.css', __FILE__), false, '1.0.0', 'all');
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style(){
	wp_enqueue_script('custom_jquery');
	
	wp_enqueue_style( 'custom-mini-cart-css' );
}


/// Main Function For Plugin

function woocommerec_custom_mini_cart(){

	?>
	   <div class="custom-mini-cart">

          
          
                   <a class="cart-customlocation custom-mini-cart-main-link" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>

                    <div id="cartcontents" class="custom-mini-cart-details-div">
                        <div class="widget_shopping_cart_content">
                            <?php woocommerce_mini_cart(); ?>
                        </div>
                    </div>
                </a>
      </div>
      <?php
	  
	}	
	
add_shortcode( 'custom_mini_cart', 'woocommerec_custom_mini_cart' );

















