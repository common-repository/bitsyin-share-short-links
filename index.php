<?php
/*
Plugin Name: Bitsy.in Share Short Links
Plugin URI:https://www.bitsy.in/
Description: This plugin will help you use Bitsy.in to shorten links when you share Web pages or blogs from your WordPress site. 
Version: 1.1
Author: Bitsy.in
*/
ob_start();
function btsy_ShareButton()
{
	?>
<div id="sharebox" class="slide-on-scroll" data-top="121.8px">
        <a id="hypfacebook" target="_blank" title="Follow on Facebook" class="contact-button-link cb-ancor facebook">
            <span class="fa fa-facebook"></span></a>
            <a id="hyptwitter" target="_blank" title="Visit on Twitter"
                class="contact-button-link cb-ancor twitter" href="#"><span class="fa fa-twitter">
                </span></a>
                <a id="hypgoogle" target="_blank" title="Visit on Google Plus" class="contact-button-link cb-ancor gplus">
                    <span class="fa fa-google-plus"></span></a><a id="hyplinkedin" target="_blank" title="Visit on LinkedIn"
                        class="contact-button-link cb-ancor linkedin"><span class="fa fa-linkedin"></span>
                    </a>
                    <a id="hypgmail" target="_blank" title="Send us an email" class="contact-button-link cb-ancor email">
                        <span class="fa fa-envelope"></span></a>
</div>
<?php
}



function btsy_my_footer_enqueue()
{
	wp_enqueue_style('bitsyin', plugins_url('css/bitsy.css', __FILE__));
	wp_enqueue_style('font-awesome', plugins_url('css/font-awesome.min.css', __FILE__));
	wp_enqueue_script('bitsyin',plugins_url( 'bitsyin-share-short-links/js/bitsy.js', dirname(__FILE__) ), array(),  true );
	
	
}
add_action( 'wp_enqueue_scripts', 'btsy_my_footer_enqueue',500 );
add_shortcode( 'bitsy_share', 'btsy_ShareButton' ); //make shortcode
add_action('admin_menu', 'btsy_test_plugin_setup_menu');
 
function btsy_test_plugin_setup_menu(){
        add_menu_page( 'Bitsy', 'Bitsy.in', 'manage_options', 'bitsy', 'btsy_test_init',plugins_url( 'bitsy/images/fav.png',dirname(__FILE__)) );
}
function btsy_test_init()
{
	?>
       <h1>Bitsy.in</h1><br/><p>
This Bitsy.in WordPress plugin will help you use Bitsy.in to shorten links when you share Web pages or blogs from your WordPress site.Short links look elegant, are easier to use, and provide you an easy way to track the shortlink stats, including the number of clicks your link got!</p><br/>
	  <strong>Shortcode</strong> : [bitsy_share] <br/><strong>Php Shortcode</strong>: echo do_shortcode('[bitsy_share]');
	   <?php
}
ob_flush();
?>