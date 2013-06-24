<?php if ( ! defined( 'BASEPATH' ) ) exit('No direct script access allowed'); ?>
<h3>Preliminary Information</h3>
<div id="form_panel_1" class="form_panel">
	<p>How much cash do you need?</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="loan_amount_requested_300" name="loan_amount_requested" value="300" checked="checked" />
		<label for="loan_amount_requested_300">$300</label>
		<?php for ($i = 400; $i <= 1000; $i += 100) { ?>
		<input type="radio" id="loan_amount_requested_<?php echo $i; ?>" name="loan_amount_requested" value="<?php echo $i; ?>" />
		<label for="loan_amount_requested_<?php echo $i; ?>">$<?php echo $i; ?></label>
		<?php } ?>
	</div>
	
	<p>Regarding you or any immediate family member:</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="active_military_no" name="active_military" value="NO" checked="checked" />
		<label for="active_military_no">NO, not active in the military</label>
		<input type="radio" id="active_military_yes" name="active_military" value="YES" />
		<label for="active_military_yes">Yes, active in the military</label>
	</div>
	
	<p>Regarding your citizenship:</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="us_citizen_yes" name="us_citizen" value="YES" checked="checked" />
		<label for="us_citizen_yes">YES, I am a US citizen</label>
		<input type="radio" id="us_citizen_no" name="us_citizen" value="NO" />
		<label for="us_citizen_no">No, I am not a US citizen</label>
	</div>
	
	<p>Regarding how you may receive your loan:</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="direct_deposit_yes" name="direct_deposit" value="YES" checked="checked" />
		<label for="direct_deposit_yes">YES, I can accept direct deposit</label>
		<input type="radio" id="direct_deposit_no" name="direct_deposit" value="NO" />
		<label for="direct_deposit_no">No, I cannot accept direct deposit</label>
	</div>
	
	<p>Regarding your source of income:</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="income_type_employed" name="income_type" value="EMPLOYED" checked="checked" />
		<label for="income_type_employed">I am regularly employed</label>
		<input type="radio" id="income_type_self_employed" name="income_type" value="SELF EMPLOYED" />
		<label for="income_type_self_employed">I am self-employed</label>
		<input type="radio" id="income_type_benefits" name="income_type" value="BENEFITS" />
		<label for="income_type_benefits">I am on benefits</label>
	</div>
	
	<p>Regarding your primary residence:</p>
	<div class="form_panel_buttonset">
		<input type="radio" id="residence_type_renter" name="residence_type" value="HOMEOWNER" checked="checked" />
		<label for="residence_type_renter">I RENT my primary residence</label>
		<input type="radio" id="residence_type_homeowner" name="residence_type" value="RENTER" />
		<label for="residence_type_homeowner">I OWN my primary residence</label>
	</div>
	
	<div class="navigation">
		<span class="next"><a class="next" href="#">Next</a></span>
	</div>
</div>