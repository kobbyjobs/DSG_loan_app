<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
////////////////////////////////////////////////////////////////////////////////
// Filename: application/views/control_panel/dashboard.php
//
// Author: eamohl@leadsanddata.net
//
// Created: 
//
// Description: 
//
////////////////////////////////////////////////////////////////////////////////

$this->load->helper( 'url' );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>Dashboard - Control Panel - DSG Consumer Payday Loans</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/reset.css' ); ?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/cupertino/jquery-ui-1.10.3.custom.min.css' ); ?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/control_panel/dashboard.css' ); ?>" />
		
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-1.10.1.min.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-ui-1.10.3.custom.min.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/_DSG.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/control_panel/control_panel.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/control_panel/dashboard.js' ); ?>"></script>
	</head>
	<body>
		<div id="root">
			<div id="nav_links">
				<ul>
					<li><a href="<?php echo site_url( 'control_panel/logout/' ); ?>">Logout</a></li>
					<li><a href="<?php echo site_url( 'control_panel/dashboard/' ); ?>">Dashboard</a></li>
				</ul>
			</div>
			<div id="op_links">
				<h3>DSG - Control Panel - Payday Site Network</h3>
				<ul>
					<li><a id="create_site_configuration" class="op_link" href="#create_site_configuration" title="Configure a new website within the DSG Payday Site Network">Create Site Configuration...</a></li>
					<li><a id="edit_site_configuration" class="op_link" href="#edit_site_configuration" title="Edit the configuration of a website already within the DSG Payday Site Network">Edit Site Configuration...</a></li>
					<li><a id="upload_site_banner" class="op_link" href="#upload_site_banner" title="Upload a banner graphic for use in a website configuration">Upload Site Banner...</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
<?php
////////////////////////////////////////////////////////////////////////////////
// End of file: dashboard.php
////////////////////////////////////////////////////////////////////////////////