<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div id="address_and_contact_information_navigation" class="panel_navigation">
	<span class="panel_previous"><a id="address_and_contact_information_previous" href="#">Previous</a></span>
	<span class="panel_next"><a id="address_and_contact_information_next" href="#">Next</a></span>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#address_and_contact_information_previous' )
			.button({
				icons: {
					primary: 'ui-icon-arrowthick-1-w'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 1 );
			});
			
		$( '#address_and_contact_information_next' )
			.button({
				icons: {
					secondary: 'ui-icon-arrowthick-1-e'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 3 );
			});
	});
	//]]>
	</script>
</div>