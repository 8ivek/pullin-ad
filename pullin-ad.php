<?php
/*
Plugin Name: pullin-ad
Plugin URI: http://www.bivekjoshi.com.np/pullin-ad/
Description: This is an ad management plugin that displays advertisement in your Wordpress sites.
Author: Bivek Joshi
Version: 0.1
Author URI: http://www.bivekjoshi.com.np
*/

// We need some CSS to position the paragraph
function pullin_css() {
	echo "<style type='text/css'>
	#pullin_footer {
		position:fixed;
		bottom:0;
	}
	#pullin_footer .pullin_handle {
		text-align:center;
	}
	#pullin_footer .pullin_handle a {
		display:block;
		margin: 5px auto;
	}
	#pullin_footer .pullin_content {
		background:black;
		color:white;
	}
	</style>";
}
function pullin_js() {
	echo "<script type='text/javascript'>
	jQuery(document).ready( function($) {
		var contentHeight = $('#pullin_footer .pullin_content').height();
		$('#pullin_footer').css('bottom', -contentHeight);
		var hidden = true, animating = false;
	
		$('#pullin_footer .pullin_handle a').click(function(e) {
			e.preventDefault();
			animating = true;
			if (hidden) {
				$('#pullin_footer').animate({
					bottom: 0
				}, 400, function() {
					animating = false;
					hidden = false;
					$('#pullin_footer .pullin_handle a').html('Close');
				});
			} else {
				$('#pullin_footer').animate({
					bottom: -contentHeight
				}, 400, function() {
					animating = false;
					hidden = true;
					$('#pullin_footer .pullin_handle a').html('Open');
				});
			}
		});
	});
	</script>";
}

function pullin_html() {
	echo '<div id="pullin_footer">
	  <div class="pullin_handle">
		<a href="#">Open</a>
	  </div>
	  <div class="pullin_content">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
		in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  </div>
	</div>';
}

add_action('wp_footer', 'pullin_html');
add_action('wp_head', 'pullin_css');
add_action('wp_head', 'pullin_js');