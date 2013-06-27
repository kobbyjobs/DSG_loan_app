<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); ?>
<h3>Employment Information</h3>
<div id="form_panel_4" class="form_panel">
	<div class="form_panel_row">
		<p>Employer Name</p>
		<input type="text" id="employer_name" name="employer_name" maxlength="50" class="ui-widget ui-corner-all" style="width:250px;" value="" />
	</div>
	<div class="form_panel_row">
		<p>Employer Phone</p>
		<input type="text" id="employer_phone" name="employer_phone" maxlength="14" class="ui-widget ui-corner-all" style="width:150px;" value="" />
	</div>
	<div class="form_panel_row">
		<p>Job Title</p>
		<input type="text" id="job_title" name="job_title" maxlength="50" class="ui-widget ui-corner-all" style="width:250px;" value="" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>When were you hired?</p>
		<input type="hidden" id="date_of_hire" name="date_of_hire" value="" />
		<select id="date_of_hire_month" name="date_of_hire_month" class="ui-widget ui-corner-all">
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		<select id="date_of_hire_day" name="date_of_hire_day" class="ui-widget ui-corner-all">
			<?php for ($i = 1; $i <= 31; $i++) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
		</select>
		<select id="date_of_hire_year" name="date_of_hire_year" class="ui-widget ui-corner-all">
			<?php for ($i = 2013; $i > 1940; $i--) { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form_panel_row">
		<p>Paycheck Frequency</p>
		<select id="paycheck_frequency" name="paycheck_frequency" class="ui-widget ui-corner-all">
			<option value="WEEKLY">Weekly</option>
			<option value="EVERY TWO WEEKS">Every Two Weeks</option>
			<option value="MONTHLY">Monthly</option>
			<option value="TWICE PER MONTH">Twice Per Month</option>
		</select>
	</div>
	<div class="form_panel_row">
		<p>Amount of Last Paycheck</p>
		<input type="hidden" id="gross_monthly_income" name="gross_monthly_income" value="" />
		<input type="text" id="last_paycheck_amount" name="last_paycheck_amount" maxlength="8" class="ui-widget ui-corner-all" value="" />
	</div>
	<div class="clearing">&nbsp;</div>
	
	<div class="form_panel_row">
		<p>Date of Next Paycheck</p>
		<input type="hidden" id="date_of_next_paycheck_1" name="date_of_next_paycheck_1" value="" />
		<div id="paycheck_calendar_1"></div>
	</div>
	<div class="form_panel_row">
		<p>Date of Following Paycheck</p>
		<input type="hidden" id="date_of_next_paycheck_2" name="date_of_next_paycheck_2" value="" />
		<div id="paycheck_calendar_2"></div>
	</div>
	<div class="clearing">&nbsp;</div>

	<div class="navigation">
		<span class="prev"><a class="prev" href="#">Previous</a></span>
		<span class="next"><a class="next" href="#">Next</a></span>
	</div>
</div>