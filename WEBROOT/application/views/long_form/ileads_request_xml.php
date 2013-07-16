<?php if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
////////////////////////////////////////////////////////////////////////////////
// File: application/views/long_form/ileads_request_xml.php
//
// Author: eamohl@leadsanddata.net
//
// Created: June 27, 2013
//
// Description:
//
////////////////////////////////////////////////////////////////////////////////

echo '<?xml version="1.0" encoding="UTF-8"?' . ">\n"; ?>
<request>
	<source>
		<password><?php echo $ileads_password; ?></password>
		<campaign>1</campaign>
		<type>payday</type>
		<form>organic</form>
		<redirect>true</redirect>
		<sub_id>0</sub_id>
		<source_url>https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/long_form/</source_url>
		<time_available>30</time_available>
	</source>
	<lead_identity>
		<firstname><?php echo $first_name; ?></firstname>
		<lastname><?php echo $last_name; ?></lastname>
		<ssn><?php echo $social_security_number; ?></ssn>
		<dob><?php echo $date_of_birth; ?></dob>
		<dl_number><?php echo $drivers_license_id_number; ?></dl_number>
		<dl_state><?php echo $drivers_license_id_state; ?></dl_state>
		<gender><?php echo ($salutation == 'MR') ? 'M' : 'F'; ?></gender>
		<military_active><?php echo ($active_military == 'YES') ? 'true' : 'false'; ?></military_active>
		<amount_requested><?php echo $loan_amount_requested; ?></amount_requested>
	</lead_identity>
	<lead_contact>
		<residence_type><?php echo ($residence_type == 'HOMEOWNER') ? 'Own' : 'Rent'; ?></residence_type>
		<residence_length><?php echo $months_at_address; ?></residence_length>
		<address1><?php echo $street_address; ?></address1>
		<address2></address2>
		<city><?php echo $city; ?></city>
		<state><?php echo $state; ?></state>
		<zip><?php echo $zip_code; ?></zip>
		<phone_home><?php echo $home_phone; ?></phone_home>
		<phone_cell><?php echo $mobile_phone; ?></phone_cell>
		<contact_time><?php echo $best_time_to_call; ?></contact_time>
		<email><?php echo $email; ?></email>
		<ip_addr><?php echo $ip_address; ?></ip_addr>
	</lead_contact>
	<lead_employment>
		<pay_frequency><?php echo $paycheck_frequency; ?></pay_frequency>
		<net_income><?php echo $gross_monthly_income; ?></net_income>
		<first_payday><?php echo $date_of_next_paycheck_1; ?></first_payday>
		<second_payday><?php echo $date_of_next_paycheck_2; ?></second_payday>
		<employment_status><?php echo $employment_status; ?></employment_status>
		<employer_name><?php echo $employer_name; ?></employer_name>
		<job_title><?php echo $job_title; ?></job_title>
		<hire_date><?php echo $date_of_hire; ?></hire_date>
		<phone_work><?php echo $employer_phone; ?></phone_work>
		<phone_work2></phone_work2>
	</lead_employment>
	<lead_banking>
		<bank_name><?php echo $bank_name; ?></bank_name>
		<account_type><?php echo ($bank_account_type == 'CHECKING') ? 'checking' : 'savings'; ?></account_type>
		<direct_deposit><?php echo ($direct_deposit == 'YES') ? 'true' : 'false'; ?></direct_deposit>
		<routing_no><?php echo $bank_routing_number; ?></routing_no>
		<account_no><?php echo $bank_account_number; ?></account_no>
	</lead_banking>
	<lead_references>
		<reference1_firstname></reference1_firstname>
		<reference1_lastname></reference1_lastname>
		<reference1_relationship></reference1_relationship>
		<phone_reference1></phone_reference1>
		<reference2_firstname></reference2_firstname>
		<reference2_lastname></reference2_lastname>
		<reference2_relationship></reference2_relationship>
		<phone_reference2></phone_reference2>
		<data_pixel><?php echo $datax_pixel; ?></data_pixel>
		<datax_pixel><?php echo $datax_pixel; ?></datax_pixel>
	</lead_references>
</request>
<?php
////////////////////////////////////////////////////////////////////////////////
// End of file: ileads_request.xml
////////////////////////////////////////////////////////////////////////////////