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
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/custom-theme/jquery-ui-1.10.3.custom.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/long_form.css'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('css/form_panels.css'); ?>" />
	
	<script type="text/javascript" src="<?php echo base_url('js/jquery-1.10.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('js/jquery.inputmask.bundle.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.datax_pixel.js'); ?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('js/long_form.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/long_form_supporting.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/long_form_validation.js'); ?>"></script>
	
	<!-- set up the datax jQuery plugin -->
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
			
			<div id="header_banner" style="background-image:url(<?php echo base_url( $site_banner ); ?>);">&nbsp;</div>
		</div>
		
		<div id="content">
			<div id="long_form_container">
				<form name="long_form" id="long_form" method="post" action="https://secure.cashmoneynow.net/secure/loan_app/index.php/long_form/post_and_continue/">
					<?php $this->load->view('long_form/hidden_fields', $data); ?>
					<div id="form_panels">
						<?php $this->load->view('long_form/form_panel_1', $data); ?>
						
						<?php $this->load->view('long_form/form_panel_2', $data); ?>
						
						<?php $this->load->view('long_form/form_panel_3', $data); ?>
						
						<?php $this->load->view('long_form/form_panel_4', $data); ?>
						
						<?php $this->load->view('long_form/form_panel_5', $data); ?>
					</div>
				</form>
			</div>
		</div>
		
		<div id="footer">
			<div id="footer_navigation_links">
				<?php $this->load->view('long_form/footer_navigation_links'); ?>
			</div>
		</div>
	</div>
	<div id="#conversion_pixels">
<!-- Offer Conversion: Justclickhereloans.com - SHORT Form -->
<iframe src="https://link.go2oursite.net/SL2?adv_sub=<?php echo $email; ?>&transaction_id=<?php echo $transaction_id; ?>" scrolling="no" frameborder="0" width="1" height="1"></iframe>
<!-- // End Offer Conversion -->
<!-- Offer Conversion: Topdollarcashloans.com - SHORT Form -->
<iframe src="https://link.go2oursite.net/SL6L?adv_sub=<?php echo $email; ?>&transaction_id=<?php echo $transaction_id; ?>" scrolling="no" frameborder="0" width="1" height="1"></iframe>
<!-- // End Offer Conversion -->
	</div>
</body>
</html>