<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<h3>Banking Information</h3>
<div id="form_panel_5" class="form_panel">
	<div class="form_panel_row">
		<p>Bank Routing Number</p>
		<input type="text" id="bank_routing_number" name="bank_routing_number" maxlength="9" class="ui-widget ui-corner-all" style="width:150px" value="" />
	</div>
	<div class="form_panel_row">
		<p>Bank Account Number</p>
		<input type="text" id="bank_account_number" name="bank_account_number" maxlength="30" class="ui-widget ui-corner-all" style="width:200px;" value="" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Bank Name</p>
		<input type="text" id="bank_name" name="bank_name" maxlength="50" class="ui-widget ui-corner-all" style="width:250px;" value="" />
	</div>
	<div class="form_panel_row">
		<p>Bank Phone</p>
		<input type="text" id="bank_phone" name="bank_phone" maxlength="14" class="ui-widget ui-corner-all" style="width:150px;" value="" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Type of Bank Account</p>
		<div class="form_panel_buttonset">
			<input type="radio" id="bank_account_type_checking" name="bank_account_type" checked="checked" value="CHECKING" />
			<label for="bank_account_type_checking">Checking Account</label>
			<input type="radio" id="bank_account_type_savings" name="bank_account_type" value="SAVINGS" />
			<label for="bank_account_type_savings">Savings Account</label>
		</div>
	</div>
	<div class="form_panel_row">
		<p>How long have you been at this bank?</p>
		<input type="hidden" id="months_at_bank" name="months_at_bank" value="" />
		<select id="months_at_bank_years_part" name="months_at_bank_years_part" class="ui-widget ui-corner-all">
			<option value="0">0 years</option>
			<option value="1">1 year</option>
			<?php for ($i = 2; $i < 15; $i++) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?> years</option>
			<?php } ?>
			<option value="15">15 or more years</option>
		</select>
		<span>and</span>
		<select id="months_at_bank_months_part" name="months_at_bank_months_part" class="ui-widget ui-corner-all">
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
		<span class="next"><input type="submit" id="long_form_submit" value="Get Cash NOW!" /></span>
	</div>
</div>
