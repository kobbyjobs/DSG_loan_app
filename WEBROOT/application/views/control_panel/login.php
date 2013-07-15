<?php if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
////////////////////////////////////////////////////////////////////////////////
// File: WEBROOT/application/views/control_panel/login.php
//
// Author: eamohl@leadsanddata.net
//
// Created: July 15, 2013
//
// Description:
//
////////////////////////////////////////////////////////////////////////////////

$this->load->helper( 'url' );

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Control Panel - DSG Consumer Payday Loans</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/reset.css' ); ?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/cupertino/jquery-ui-1.10.3.custom.min.css' ); ?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/control_panel/login.css' ); ?>" />
		
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-1.10.1.min.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-ui-1.10.3.custom.min.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/_DSG.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/control_panel/control_panel.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/control_panel/login.js' ); ?>"></script>
		
		<script type="text/javascript">
		//<![CDATA[
		( function () {
			var obj_login = false;
			
			$( document ).ready( function () {
				obj_login = new _DSG.control_panel.login( '#login_panel' );
			});
		})();
		//]]>
		</script>

	</head>
	<body>
		<div id="root">
			<div id="login_panel">
				<p>Username: <input id="username" type="text" /></p>
				<p>Password: <input id="password" type="password" /></p>
			</div>
		</div>
	</body>
</html>
<?php
////////////////////////////////////////////////////////////////////////////////
// End of file: login.php
////////////////////////////////////////////////////////////////////////////////