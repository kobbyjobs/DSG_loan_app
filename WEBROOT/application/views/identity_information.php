<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

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
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#salutation_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div class="field_div_grouping">
	<div id="first_name_div" class="field_div">
		<p><label for="first_name">First Name</label></p>
		<div id="first_name_inner_div" class="field_inner_div">
			<input type="text" id="first_name" name="first_name" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="<?php echo $first_name; ?>" />
		</div>
	</div>

	<div id="middle_initial_div" class="field_div">
		<p><label for="middle_initial">M.I.</label></p>
		<div id="middle_initial_inner_div" class="field_inner_div">
			<input type="text" id="middle_initial" name="middle_initial" maxlength="1" style="width: 20px;" class="ui-widget ui-corner-all" value="" />
		</div>
	</div>
	
	<div id="last_name_div" class="field_div">
		<p><label for="last_name">Last Name</label></p>
		<div id="last_name_inner_div" class="field_inner_div">
			<input type="text" id="last_name" name="last_name" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="<?php echo $last_name; ?>" />
		</div>
	</div>
	
	<div style="height: 0px; clear: both;">&nbsp;</div>
</div>

<div id="date_of_birth_div" class="field_div">
	<input type="hidden" id="date_of_birth" name="date_of_birth" value="" />
	<p>Date of Birth</p>
	<div id="date_of_birth_inner_div" class="field_inner_div">
		<select id="date_of_birth_month" name="date_of_birth_month" class="ui-widget ui-corner-all">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		
		<select id="date_of_birth_day" name="date_of_birth_day" class="ui-widget ui-corner-all">
			<?php for ($i = 1; $i <= 31; $i++) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
		</select>
		
		<select id="date_of_birth_year" name="date_of_birth_year" class="ui-widget ui-corner-all">
			<?php for ($i = 1998; $i > 1900; $i--) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<div id="social_security_number_div" class="field_div">
	<p><label for="social_security_number">Social Security Number</label></p>
	<div id="social_security_number_inner_div" class="field_inner_div">
		<input type="text" id="social_security_number" name="social_security_number" maxlength="11" style="width: 150px;" class="ui-widget ui-corner-all" value="" />
	</div>
</div>

<div class="field_div_grouping">
	<div id="drivers_license_id_state_div" class="field_div">
		<p><label for="drivers_license_id_state">Driver's License/ID Issuing State</label></p>
		<div id="drivers_license_id_state_inner_div" class="field_inner_div">
			<select id="drivers_license_id_state" name="drivers_license_id_state" class="ui-widget ui-corner-all">
				<?php $this->load->view('state_options'); ?>
			</select>
		</div>
	</div>
	<div id="drivers_license_id_number_div" class="field_div">
		<p><label for="drivers_license_id_number">Driver's License/ID Number</label></p>
		<div id="drivers_license_id_number_inner_div" class="field_inner_div">
			<input type="text" id="drivers_license_id_number" name="drivers_license_id_number" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="" />
		</div>
	</div>
	<div style="height: 0px; clear: both;">&nbsp;</div>
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
