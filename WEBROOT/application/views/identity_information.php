<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div class="field_div_grouping">
	<div id="salutation_div" class="field_div">
		<p>Salutation</p>
		<div id="salutation_inner_div" class="field_inner_div">
			<input type="radio" id="salutation_mr" name="salutation" value="MR" checked="checked" />
			<label for="salutation_mr">Mr.</label>
			<input type="radio" id="salutation_mrs" name="salutation" value="MRS" />
			<label for="salutation_mrs">Mrs.</label>
			<input type="radio" id="salutation_ms" name="salutation" value="MS" />
			<label for="salutation_ms">Ms.</label>
		</div>
	</div>

	<div id="first_name_div" class="field_div">
		<p><label for="first_name">First Name</label></p>
		<div id="first_name_inner_div" class="field_inner_div">
			<input type="text" id="first_name" name="first_name" maxlength="50" style="width: 200px;" class="ui-corner-all" value="<?php echo $first_name; ?>" />
		</div>
	</div>

	<div id="middle_initial_div" class="field_div">
		<p><label for="middle_initial">M.I.</label></p>
		<div id="middle_initial_inner_div" class="field_inner_div">
			<input type="text" id="middle_initial" name="middle_initial" maxlength="1" style="width: 20px;" class="ui-corner-all" value="" />
		</div>
	</div>
</div>

<div id="identity_information_navigation" class="panel_navigation">
	<span class="panel_previous"><a id="identity_information_previous" href="#">Previous</a></span>
	<span class="panel_next"><a id="identity_information_next" href="#">Next</a></span>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#identity_information_previous' )
			.button({
				icons: {
					primary: 'ui-icon-arrowthick-1-w'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 0 );
			});
			
		$('#identity_information_next')
			.button({
				icons: {
					secondary: 'ui-icon-arrowthick-1-e'
				}
			})
			.click( function (event) {
				event.preventDefault();
				
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 2 );
			});
	});
	//]]>
	</script>
</div>
