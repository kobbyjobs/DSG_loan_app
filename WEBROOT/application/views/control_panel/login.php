<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Control Panel - DSG Consumer Payday Loans</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="https://secure.cashmoneynow.net/secure/DSG_loan_app/css/reset.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="https://secure.cashmoneynow.net/secure/DSG_loan_app/css/cupertino/jquery-ui-1.10.3.custom.min.css" />
		
		<script type="text/javascript" src="https://secure.cashmoneynow.net/secure/DSG_loan_app/js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="https://secure.cashmoneynow.net/secure/DSG_loan_app/js/jquery-ui-1.10.3.custom.min.js"></script>
		
		<style type="text/css">
		.no-close .ui-dialog-titlebar-close {
			display : none;
		}
		</style>
		
		<script type="text/javascript">
		//<![CDATA[
		( function () {
			$( document ).ready( function () {
				$( '#login_panel' ).dialog( {
					modal : true,
					dialogClass : 'no-close',
					draggable : true,
					resizable : false,
					closeOnEscape : false,
					title : 'DSG - Login',
					buttons : {
						'Login' : function () {
							$( this ).dialog( 'close' );
							var username = $( '#username' ).val();
							username = encodeURIComponent( username );
							var password = $( '#password' ).val();
							password = encodeURIComponent( password );
							var url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/login/' + username + '/' + password + '/';
							window.location.href = url;
						}
					}
				});
				$( '#login_panel' ).keyup( function ( evt ) {
					console.log( '\n@[#login_panel]:[keyup]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>' );
					console.log( '\tevt.which = ' + evt.which );
					console.log( '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<@[#login_panel]:[keyup]' );
					
					if ( 13 == evt.which ) {
						evt.preventDefault();
					}
				});
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