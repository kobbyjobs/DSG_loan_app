<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

$this->load->helper('url');

$data = array(
	'transaction_id' => $transaction_id,
	'aff_id' => $aff_id,
	'offer_id' => $offer_id,
	'first_name' => $first_name,
	'last_name' => $last_name,
	'zip_code' => $zip_code,
	'street_address' => $street_address,
	'home_phone' => $home_phone,
	'mobile_phone' => $mobile_phone,
	'email' => $email
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EASY Cash NOW!</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/reset.css'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.3.custom.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/long_form.css'); ?>" />
	
	<script type="text/javascript" src="<?php echo base_url('js/jquery-1.10.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.datax_pixel.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/long_form.js'); ?>"></script>
	
	<script type="text/javascript">
	//<![CDATA[
	$( document ).ready( function () {
		$('#long_form').datax_pixel({
			testing: false,
			aid: 23627,
			sid: ''
		});
	});
	//]]>
	</script>
</head>

<body>
	<div id="root">
		<div id="header">
			<div id="header_starting_datetime">
				<p><?php echo date('l F j, Y g:i:sa'); ?></p>
			</div>
			
			<div id="header_banner">&nbsp;</div>
		</div>
		
		<div id="content">
			<div id="long_form_container">
				<form name="long_form" id="long_form" method="post" action="https://secure.cashmoneynow.net/secure/loan_app/index.php/long_form/post_and_continue/">
					<?php $this->load->view('hidden_fields', $data); ?>
					
					<div id="long_form_inner_container">
						<h3>Preliminary Questions</h3>
						<div id="preliminary_questions">
							<?php $this->load->view('preliminary_questions'); ?>
						</div>
						
						<h3>Identity Information</h3>
						<div id="identity_information">
							<?php $this->load->view('identity_information', $data); ?>
						</div>
						
						<h3>Contact Information and Address</h3>
						<div id="address_and_contact_information">
							<?php $this->load->view('address_and_contact_information', $data); ?>
						</div>
						
						<h3>Employment Information</h3>
						<div id="employment_information">
							<?php $this->load->view('employment_information'); ?>
						</div>
						
						<h3>Banking Information</h3>
						<div id="banking_information">
							<?php $this->load->view('banking_information'); ?>
						</div>
					</div>
				</form>
			</div>
			
			<div id="sidebar_content">
				<?php $this->load->view('sidebar_content'); ?>
			</div>
		</div>
		
		<div id="footer">
			<div id="footer_navigation_links">
				<?php $this->load->view('footer_navigation_links'); ?>
			</div>
		</div>
	</div>
</body>
</html>