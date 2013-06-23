<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div id="email_div" class="field_div">
	<p><label for="email">E-Mail Address</label></p>
	<div id="email_inner_div" class="field_inner_div">
		<input type="text" id="email" name="email" maxlength="150" style="width: 450px;" class="ui-widget ui-corner-all" value="<?php echo $email; ?>" />
	</div>
</div>

<div class="field_div_grouping">
	<div id="home_phone_div" class="field_div">
		<p><label for="home_phone">Home Phone</label></p>
		<div id="home_phone_inner_div" class="field_inner_div">
			<input type="text" id="home_phone" name="home_phone" maxlength="14" style="width: 150px;" class="ui-widget ui-corner-all" value="<?php echo $home_phone; ?>" />
		</div>
	</div>
	
	<div id="mobile_phone_div" class="field_div">
		<p><label for="mobile_phone">Mobile Phone</label></p>
		<div id="mobile_phone_inner_div" class="field_inner_div">
			<input type="text" id="mobile_phone" name="mobile_phone" maxlength="14" style="width: 150px;" class="ui-widget ui-corner-all" value="<?php echo $mobile_phone; ?>" />
		</div>
	</div>
	
	<div id="best_time_to_call_div" class="field_div">
		<p>Best Time to Call</p>
		<div id="best_time_to_call_inner_div" class="field_inner_div">
			<input type="radio" id="best_time_to_call_morning" name="best_time_to_call" value="MORNING" checked="checked" />
			<label for="best_time_to_call_morning">Morning</label>
			<input type="radio" id="best_time_to_call_afternoon" name="best_time_to_call" value="AFTERNOON" />
			<label for="best_time_to_call_afternoon">Afternoon</label>
			<input type="radio" id="best_time_to_call_evening" name="best_time_to_call" value="EVENING" />
			<label for="best_time_to_call_evening">Evening</label>
		</div>
		<script type="text/javascript">
		//<![CDATA[
		$( document ).ready( function () {
			$( '#best_time_to_call_inner_div' ).buttonset();
		});
		//]]>
		</script>
	</div>
	
	<div style="height: 0px; clear: both;">&nbsp;</div>
</div>

<div id="street_address_div" class="field_div">
	<p><label for="street_address">Street Address</label></p>
	<div id="street_address_inner_div" class="field_inner_div">
		<input type="text" id="street_address" name="street_address" maxlength="100" style="width: 400px;" class="ui-widget ui-corner-all" value="<?php echo $street_address; ?>" />
	</div>
</div>

<div class="field_div_grouping">
	<div id="city_div" class="field_div">
		<p><label for="city">City</label></p>
		<div id="city_inner_div" class="field_inner_div">
			<input type="text" id="city" name="city" maxlength="50" style="width: 200px;" class="ui-widget ui-corner-all" value="" />
		</div>
	</div>
	
	<div id="state_div" class="field_div">
		<p><label for="state">State</label></p>
		<div id="state_inner_div" class="field_inner_div">
			<select id="state" name="state" class="ui-widget ui-corner-all">
				<?php $this->load->view('state_options'); ?>
			</select>
		</div>
	</div>
	
	<div id="zip_code_div" class="field_div">
		<p><label for="zip_code">Zip Code</label></p>
		<div id="zip_code_inner_div" class="field_inner_div">
			<input type="text" id="zip_code" name="zip_code" maxlength="5" style="width: 75px;" class="ui-widget ui-corner-all" value="<?php echo $zip_code; ?>" />
		</div>
	</div>
	
	<div style="height: 0px; clear: both;">&nbsp;</div>
</div>

<div id="months_at_address_div" class="field_div">
	<input type="hidden" id="months_at_address" name="months_at_address" value="" />
	<p>Length of Time Living at Current Address</p>
	<div id="months_at_address_inner_div" class="field_inner_div">
		<select id="months_at_address_years_part" name="months_at_address_years_part" class="ui-widget ui-corner-all">
			<option value="0">0 years</option>
			<option value="1">1 year</option>
			<?php for ($i = 2; $i < 15; $i++) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?> years</option>
			<?php } ?>
			<option value="15">15 or more years</option>
		</select>
		<span>and</span>
		<select id="months_at_address_months_part" name="months_at_address_months_part" class="ui-widget ui-corner-all">
			<option value="0">0 months</option>
			<option value="1">1 month</option>
			<?php for ($i = 2; $i < 12; $i++) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?> months</option>
			<?php } ?>
		</select>
	</div>
</div>

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