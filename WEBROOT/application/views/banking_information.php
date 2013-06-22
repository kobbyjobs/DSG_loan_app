<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div id="banking_information_navigation" class="panel_navigation">
	<span class="panel_previous"><a id="banking_information_previous" href="#">Previous</a></span>
	<span class="panel_next"><input id="long_form_submit" type="submit" value="Get me my cash NOW!" /></span>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#banking_information_previous' )
			.button({
				icons: {
					primary: 'ui-icon-arrowthick-1-w'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 3 );
			});
			
		$( '#long_form_submit' ).button();
	});
	//]]>
	</script>
</div>