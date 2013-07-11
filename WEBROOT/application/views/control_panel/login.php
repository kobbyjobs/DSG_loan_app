<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Control Panel - DSG Consumer Payday Loans</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="https://secure.cashmoneynow.net/secure/DSG_loan_app/css/reset.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="https://secure.cashmoneynow.net/secure/DSG_loan_app/css/smoothness/jquery-ui-1.10.3.custom.min.css" />
		
		<script type="text/javascript" src="https://secure.cashmoneynow.net/secure/DSG_loan_app/js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="https://secure.cashmoneynow.net/secure/DSG_loan_app/js/jquery-ui-1.10.3.custom.min.js"></script>
		
		<style type="text/css">
		
		</style>
		
		<script type="text/javascript">
		//<![CDATA[
		( function () {
			$( document ).ready( function () {
				$( '#login_panel' ).dialog( {
					modal : true,
					buttons : {
						'Login' : function () {
							$( this ).dialog( 'close' );
							var username = $( '#username' ).val();
							username = encodeURIComponent( username );
							var password = $( '#password' ).val();
							password = encodeURIComponent( password );
							var url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/login/' + username + '/' + password + '/';
							alert( url );
							window.location.href = url;
						}
					}
				} );
			} );
		} )();
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