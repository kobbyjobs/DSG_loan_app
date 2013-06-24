<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<h3>Address and Contact Information</h3>
<div id="form_panel_3" class="form_panel">
	<div class="form_panel_row">
		<p>E-Mail Address</p>
		<input type="text" id="email" name="email" maxlength="150" style="width: 450px;" class="ui-widget ui-corner-all" value="<?php echo $email; ?>" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Home Phone</p>
		<input type="text" id="home_phone" name="home_phone" maxlength="14" style="width: 150px;" class="ui-widget ui-corner-all" value="<?php echo $home_phone; ?>" />
	</div>
	<div class="form_panel_row">
		<p>Mobile Phone</p>
		<input type="text" id="mobile_phone" name="mobile_phone" maxlength="14" style="width: 150px;" class="ui-widget ui-corner-all" value="<?php echo $mobile_phone; ?>" />
	</div>
	<div class="form_panel_row">
		<p>Best Time to Call</p>
		<div class="form_panel_buttonset">
			<input type="radio" id="best_time_to_call_morning" name="best_time_to_call" value="MORNING" checked="checked" />
			<label for="best_time_to_call_morning">Morning</label>
			<input type="radio" id="best_time_to_call_afternoon" name="best_time_to_call" value="AFTERNOON" />
			<label for="best_time_to_call_afternoon">Afternoon</label>
			<input type="radio" id="best_time_to_call_evening" name="best_time_to_call" value="EVENING" />
			<label for="best_time_to_call_evening">Evening</label>
		</div>
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Street Address</p>
		<input type="text" id="street_address" name="street_address" maxlength="100" style="width: 400px;" class="ui-widget ui-corner-all" value="<?php echo $street_address; ?>" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>City</p>
		<input type="text" id="city" name="city" maxlength="50" style="width: 200px;" class="ui-widget ui-corner-all" value="" />
	</div>
	<div class="form_panel_row">
		<p>State</p>
		<select id="state" name="state" class="ui-widget ui-corner-all">
			<?php $this->load->view('state_options'); ?>
		</select>
	</div>
	<div class="form_panel_row">
		<p>Zip Code</p>
		<input type="text" id="zip_code" name="zip_code" maxlength="5" style="width: 75px;" class="ui-widget ui-corner-all" value="<?php echo $zip_code; ?>" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>How long have you lived at this address?</p>
		<input type="hidden" id="months_at_address" name="months_at_address" value="" />
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
	<div class="clearing">&nbsp;</div>

	<div class="navigation">
		<span class="prev"><a class="prev" href="#">Previous</a></span>
		<span class="next"><a class="next" href="#">Next</a></span>
	</div>
</div>