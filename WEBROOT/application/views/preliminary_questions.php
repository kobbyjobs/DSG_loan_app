<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div id="loan_amount_requested_div" class="field_div">
	<p>How much cash do you need?</p>
	<div id="loan_amount_requested_inner_div" class="field_inner_div">
		<input type="radio" id="loan_amount_requested_300" name="loan_amount_requested" value="300" checked="checked" />
		<label for="loan_amount_requested_300">$300</label>
		<?php for ($i = 400; $i <= 1000; $i += 100) { ?>
		<input type="radio" id="loan_amount_requested_<?php echo $i; ?>" name="loan_amount_requested" value="<?php echo $i; ?>" />
		<label for="loan_amount_requested_<?php echo $i; ?>">$<?php echo $i; ?></label>
		<?php } ?>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#loan_amount_requested_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="active_military_div" class="field_div">
	<p>Regarding you or any immediate family member:</p>
	<div id="active_military_inner_div" class="field_inner_div">
		<input type="radio" id="active_military_no" name="active_military" value="NO" checked="checked" />
		<label for="active_military_no">NOT active in military</label>
		<input type="radio" id="active_military_yes" name="active_military" value="YES" />
		<label for="active_military_yes">Yes, actively serving in military</label>
	</div>
	<script type="text/javascript">
	//<![CDATA
	$( document ).ready( function () {
		$( '#active_military_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="us_citizen_div" class="field_div">
	<p>Regarding your citizenship:</p>
	<div id="us_citizen_inner_div" class="field_inner_div">
		<input type="radio" id="us_citizen_yes" name="us_citizen" value="YES" checked="checked" />
		<label for="us_citizen_yes">YES, I am a US citizen</label>
		<input type="radio" id="us_citizen_no" name="us_citizen" value="NO" />
		<label for="us_citizen_no">No, I am not a US citizen</label>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#us_citizen_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="direct_deposit_div" class="field_div">
	<p>Regarding how you will receive your loan:</p>
	<div id="direct_deposit_inner_div" class="field_inner_div">
		<input type="radio" id="direct_deposit_yes" name="direct_deposit" value="YES" checked="checked" />
		<label for="direct_deposit_yes">YES, I can receive direct deposit funds</label>
		<input type="radio" id="direct_deposit_no" name="direct_deposit" value="NO" />
		<label for="direct_deposit_no">No, I cannot receive direct deposit funds</label>
	</div>
	<script type="text/javascript">
	//<![CDATA
	$( document ).ready( function () {
		$( '#direct_deposit_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="income_type_div" class="field_div">
	<p>Regarding your source of income:</p>
	<div id="income_type_inner_div" class="field_inner_div">
		<input type="radio" id="income_type_employed" name="income_type" value="EMPLOYED" checked="checked" />
		<label for="income_type_employed">I have regular employment</label>
		<input type="radio" id="income_type_self_employed" name="income_type" value="SELF EMPLOYED" />
		<label for="income_type_self_employed">I am self-employed</label>
		<input type="radio" id="income_type_benefits" name="income_type" value="BENEFITS" />
		<label for="income_type_benefits">I receive other benefits</label>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#income_type_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="residence_type_div" class="field_div">
	<p>Regarding your place of residence:</p>
	<div id="residence_type_inner_div" class="field_inner_div">
		<input type="radio" id="residence_type_renter" name="residence_type" value="HOMEOWNER" checked="checked" />
		<label for="residence_type_renter">I rent my home</label>
		<input type="radio" id="residence_type_homeowner" name="residence_type" value="RENTER" />
		<label for="residence_type_homeowner">I own my home</label>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#residence_type_inner_div' ).buttonset();
	});
	//]]>
	</script>
</div>

<div id="preliminary_questions_navigation" class="panel_navigation">
	<span class="panel_next"><a id="preliminary_questions_next" href="#">Next</a></span>
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$( '#preliminary_questions_next' )
			.button({
				icons: {
					secondary: 'ui-icon-arrowthick-1-e'
				}
			})
			.click( function ( event ) {
				event.preventDefault();
				$( '#long_form_inner_container' )
					.accordion( 'option', 'active', 1 );
			});
	});
	//]]>
	</script>
</div>