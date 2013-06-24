<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<h3>Identity Information</h3>
<div id="form_panel_2" class="form_panel">
	<div class="form_panel_row">
		<p>Salutation</p>
		<div class="form_panel_buttonset">
			<input type="radio" id="salutation_mr" name="salutation" value="MR" checked="checked" />
			<label for="salutation_mr">Mr.</label>
			<input type="radio" id="salutation_mrs" name="salutation" value="MRS" />
			<label for="salutation_mrs">Mrs.</label>
			<input type="radio" id="salutation_ms" name="salutation" value="MS" />
			<label for="salutation_ms">Ms.</label>
		</div>
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>First Name</p>
		<input type="text" id="first_name" name="first_name" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="<?php echo $first_name; ?>" />
	</div>
	<div class="form_panel_row">
		<p>M.I.</p>
		<input type="text" id="middle_initial" name="middle_initial" maxlength="1" style="width: 30px;" class="ui-widget ui-corner-all" value="" />
	</div>
	<div class="form_panel_row">
		<p>Last Name</p>
		<input type="text" id="last_name" name="last_name" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="<?php echo $last_name; ?>" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Date of Birth</p>
		<input type="hidden" id="date_of_birth" name="date_of_birth" value="" />
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
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Social Security Number</p>
		<input type="text" id="social_security_number" name="social_security_number" maxlength="11" style="width: 150px;" class="ui-widget ui-corner-all" value="" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Driver&apos;s License/ID Issuing State</p>
		<select id="drivers_license_id_state" name="drivers_license_id_state" class="ui-widget ui-corner-all">
			<?php $this->load->view('state_options'); ?>
		</select>
	</div>
	<div class="form_panel_row">
		<p>Driver&apos;s License/ID Number</p>
		<input type="text" id="drivers_license_id_number" name="drivers_license_id_number" maxlength="50" style="width: 250px;" class="ui-widget ui-corner-all" value="" />
	</div>
	<div class="clearing">&nbsp;</div>

	<div class="navigation">
		<span class="prev"><a class="prev" href="#">Previous</a></span>
		<span class="next"><a class="next" href="#">Next</a></span>
	</div>
</div>