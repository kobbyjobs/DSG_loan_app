<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div id="employment_information_navigation" class="panel_navigation">
	<span class="panel_previous"><a id="employment_information_previous" href="#">Previous</a></span>
	<span class="panel_next"><a id="employment_information_next" href="#">Next</a></span>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#employment_information_previous' )
			.button({
				icons: {
					primary: 'ui-icon-arrowthick-1-w'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 2 );
			});
			
		$( '#employment_information_next' )
			.button({
				icons: {
					secondary: 'ui-icon-arrowthick-1-e'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 4 );
			});
	});
	//]]>
	</script>
</div>