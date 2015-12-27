<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
/**
* Script styles to run jQuery on pages
*/
add_action( 'wp_enqueue_scripts', 'wsu_setup_scripts' );

function wsu_setup_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
}

	/**
	* Enqueue scripts
	*/
	add_action('wp_footer','wsu_scripts',5);

	function wsu_scripts() { ?>
	
		<script type="text/javascript">

			jQuery(document).ready(function($){
				$('#toggleSidebar').attr('value', 'true');
				$('#switchSidebar').attr('value', 'right');
				
				$('#toggleSidebar').click(function() {
					var value = $('#toggleSidebar').val();
					//alert(value);transition: 1s;
					if (value == 'false') {
						$('#toggleSidebar').attr('value', 'true');
						$('#primary-mono').css('float', 'right');
						$('#primary-mono').css('max-width', '75%');
						$('#primary-mono').css('width', '100%');
						$('#secondary').css('display', 'block');
						//alert('no');

						
					} else {
						$('#toggleSidebar').attr('value', 'false');
						$('#primary-mono').css('float', 'none');
						$('#primary-mono').css('max-width', '100%');
						$('#primary-mono').css('width', '100%');
						$('#secondary').css('display', 'none');
						//alert('yes');
					}
				});

				$('#switchSidebar').click(function() {
					var value = $('#switchSidebar').val();
					//alert(value);
					if (value == 'right') {
						$('#switchSidebar').attr('value', 'left');
						$('#primary-mono').css('float', 'left');
						$('#secondary').css('float', 'right');
						//alert('no');

						
					} else {
						$('#switchSidebar').attr('value', 'right');
						$('#primary-mono').css('float', 'right');
						$('#secondary').css('float', 'left');
						//alert('yes');
					}
				});
		  	});

		</script>


	<?php }

	/**
	* Enqueue styles
	*/
	add_action('wp_footer','wsu_styles',10);

	function wsu_styles() { ?>

		<style type="text/css">

		</style>
	<?php }