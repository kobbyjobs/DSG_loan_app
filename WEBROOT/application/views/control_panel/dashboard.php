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
		<title>Dashboard - Control Panel - DSG Consumer Payday Loans</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/reset.css' ); ?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url( 'css/cupertino/jquery-ui-1.10.3.custom.min.css' ); ?>" />
		
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-1.10.1.min.js' ); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url( 'js/jquery-ui-1.10.3.custom.min.js' ); ?>"></script>
		
		<style type="text/css">
			#nav_links {
				float : right;
			}
			
			#nav_links ul {
				float : right;
			}
			
			#nav_links li {
				float : right;
				padding-right : 20px;
				padding-top : 20px;
				padding-bottom : 20px;
				padding-left : 20px;
			}
			
			#nav_links a {
				text-decoration : none;
			}
			
			#op_links {
				width : 400px;
				
				padding-bottom : 30px;
			
				float : none;
				clear : both;
				
				margin-top : 200px;
				margin-right : auto;
				margin-left : auto;
				
				background-color : #EEEEEE;
			}
			
			#op_links > ul {
				width : 100%;
			}
			
			#op_links li {
				width : 100%;
				
				padding-top : 20px;
				
				text-align : center;
			}
			
			#op_links li > a {
				width : 80%;
			}
			
			#name {
				width : 400px;
			}
			
			#landing {
				width : 400px;
			}
			
			#short_form {
				width : 50px;
			}
			
			#long_form {
				width : 50px;
			}
			
			#banner {
				width : 400px;
			}
			
			#ping_tree_1 {
				width : 400px;
			}
			
			#ping_tree_2 {
				width : 400px;
			}
			
			#ping_tree_3 {
				width : 400px;
			}
			
			#ping_tree_4 {
				width : 400px;
			}
			
			/***************************************************
			* This right here allows us to hide the top-right 
			* 'X' button for any give dialog with the option
			* 'dialogClass' set to 'no-close'
			***************************************************/
			.no-close .ui-dialog-titlebar-close {
				display : none;
			}
			
			h3 {
				text-align : center;
				padding-top : 20px;
				padding-bottom : 20px;
				font-size : 20px;
			}
		</style>
		
		<script type="text/javascript">
		//<![CDATA[
		( function () {
			$( document ).ready( function () {
				$( '#create_site_configuration' ).button();
				$( '#edit_site_configuration' ).button();
				$( '#upload_site_banner' ).button();
				
				$( '#create_site_configuration' ).tooltip();
				$( '#edit_site_configuration' ).tooltip();
				$( '#upload_site_banner' ).tooltip();
				
				$( '#create_site_configuration' ).click( function ( evt ) {
					var id = 'create_site_configuration_dialog';
					var html = '<div id="' + id + '">\n' +
						'\t<form name="create_site_configuration_form" id="create_site_configuration_form">\n' +
							'\t\t<input id="id" name="id" type="hidden" value="-1" />\n' +
							'\t\t<p>Site Name: <input id="name" name="name" type="text" value="" /></p>\n' +
							'\t\t<p>Landing Page: <input id="landing" name="landing" type="text" value="" /></p>\n' +
							'\t\t<p>Short-Form Offer ID: <input id="short_form" name="short_form" type="text" value="" /></p>\n' +
							'\t\t<p>Long-Form Offer ID: <input id="long_form" name="long_form" type="text" value="" /></p>\n' +
							'\t\t<p>Site Banner: <input id="banner" name="banner" type="text" value="" /></p>\n' +
							'\t\t<p>Round Robin:\n' +
								'\t\t\t<ul style="padding-left:20px;">\n' +
									'\t\t\t\t<li>Tree #1: <input id="ping_tree_1" name="ping_tree_1" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #2: <input id="ping_tree_2" name="ping_tree_2" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #3: <input id="ping_tree_3" name="ping_tree_3" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #4: <input id="ping_tree_4" name="ping_tree_4" type="text" value="" /></li>\n' +
								'\t\t\t</ul>\n' +
							'\t\t</p>\n' +
						'\t</form>\n' +
						'</div>\n';
					
					evt.preventDefault();
					
					$( html ).insertAfter( '#root' );
					$( '#' + id ).dialog({
						modal : true,
						dialogClass : 'no-close',
						draggable : false,
						resizable : false,
						minWidth : 650,
						minHeight : 600,
						title : 'Create Site Configuration',
						buttons : {
							'Save' : function () {
								var _data = $( '#create_site_configuration_form' ).serialize();
								var _url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/create_site_configuration/';
								
								$.ajax({
									type : 'POST',
									url : _url,
									data : _data,
								}).done( function ( data ) {
									$( '#' + id ).dialog( 'destroy' );
									$( '#' + id ).remove();
									
									alert( 'New Site Configuration Created' );
									//window.location.href = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/';
								});
							},
							'Cancel' : function () {
									$( '#' + id ).dialog( 'destroy' );
									$( '#' + id ).remove();
							}
						}
					});
				});
				
				$( '#edit_site_configuration' ).click( function ( evt ) {
					var id = 'edit_site_configuration_dialog';
					var html = '<div id="' + id + '">\n' +
						'\t<form name="edit_site_configuration_form" id="edit_site_configuration_form">\n' +
							'\t\t<input id="id" name="id" type="hidden" value="-1" />\n' +
							'\t\t<p>Site Name: <select id="name" name="name"><option value="-1">Select a site...</option></select><button id="load_site_configuration">Load</button></p>\n' +
							'\t\t<p>Landing Page: <input id="landing" name="landing" type="text" value="" /></p>\n' +
							'\t\t<p>Short-Form Offer ID: <input id="short_form" name="short_form" type="text" value="" /></p>\n' +
							'\t\t<p>Long-Form Offer ID: <input id="long_form" name="long_form" type="text" value="" /></p>\n' +
							'\t\t<p>Site Banner: <input id="banner" name="banner" type="text" value="" /></p>\n' +
							'\t\t<p>Round Robin:\n' +
									'\t\t\t<ul style="padding-left:20px;">\n' +
									'\t\t\t\t<li>Tree #1: <input id="ping_tree_1" name="ping_tree_1" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #2: <input id="ping_tree_2" name="ping_tree_2" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #3: <input id="ping_tree_3" name="ping_tree_3" type="text" value="" /></li>\n' +
									'\t\t\t\t<li>Tree #4: <input id="ping_tree_4" name="ping_tree_4" type="text" value="" /></li>\n' +
								'\t\t\t</ul>\n' +
							'\t\t</p>\n' +
						'\t</form>\n' +
						'</div>\n';
					
					evt.preventDefault();
					
					$( html ).insertAfter( '#root' );
					
					( function () {
						var _url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/site_configurations/';
						
						$.ajax({
							type : 'GET',
							url : _url,
							dataType : 'json'
						}).done( function ( data ) {
							var site_configurations = data['site_configurations'];
							
							for ( id in site_configurations ) {
								var name = site_configurations[id];
								var html = '<option value="' + id + '">' + name + '</option>\n';
								
								$( '#name' ).append( html );
							}
						});
					})();
					
					$( '#load_site_configuration' ).click( function ( evt ) {
						var id = $( '#name' ).val();
						id = parseInt( id );
						
						evt.preventDefault();
						
						if ( -1 == id ) {
							alert( 'You must select a site configuration to load' );
						} else {
							( function ( _id ) {
								var _url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/site_configuration/' + _id + '/';
								
								$.ajax({
									type : 'GET',
									url : _url,
									dataType : 'json'
								}).done( function ( data ) {
									var site_configuration = data['site_configuration'];
									
									$( '#id' ).val( site_configuration['id'] );
									$( '#landing' ).val( site_configuration['landing'] );
									$( '#short_form' ).val( site_configuration['short_form'] );
									$( '#long_form' ).val( site_configuration['long_form'] );
									$( '#banner' ).val( site_configuration['banner'] );
									$( '#ping_tree_1' ).val( site_configuration['ping_tree_1'] );
									$( '#ping_tree_2' ).val( site_configuration['ping_tree_2'] );
									$( '#ping_tree_3' ).val( site_configuration['ping_tree_3'] );
									$( '#ping_tree_4' ).val( site_configuration['ping_tree_4'] );
								});
							})( id );
						}
					});
					
					( function ( id ) {
						$( '#' + id ).dialog({
							modal : true,
							dialogClass : 'no-close',
							draggable : false,
							resizable : false,
							minWidth : 650,
							minHeight : 600,
							title : 'Edit Site Configuration',
							buttons : {
								'Save' : function () {
									var _data = $( '#edit_site_configuration_form' ).serialize();
									var _url = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/update_site_configuration/';
									
									//console.log( 'edit_site_dialog.Save using id = ' + id );
									
									$.ajax({
										type : 'POST',
										url : _url,
										data : _data
									}).done( function ( data ) {
										$( '#' + id ).dialog( 'destroy' );
										$( '#' + id ).remove();
										
										alert( 'Site Configuration Updated' );
										//window.location.href = 'https://secure.cashmoneynow.net/secure/DSG_loan_app/index.php/control_panel/';
									});
								},
								'Cancel' : function () {
									//console.log( 'edit_site_dialog.Cancel using id = ' + id );
									$( '#' + id ).dialog( 'destroy' );
									$( '#' + id ).remove();
								}
							}
						});
					})( id );
				});
				
				$( '#upload_site_banner' ).click ( function ( evt ) {
					var id = 'upload_site_banner_dialog';
					var html = '<div id="' + id + '">\n' +
						'</div>\n';
						
					evt.preventDefault();
					
					$( html ).insertAfter( '#root' );
					
					$( '#' + id ).dialog({
						modal : true,
						dialogClass : 'no-close',
						draggable : false,
						resizable : false,
						minWidth : 650,
						minHeight : 600,
						title : 'Upload Site Banner',
						buttons : {
							'Done' : function () {
								$( '#' + id ).dialog( 'destroy' );
								$( '#' + id ).remove();
							}
						}
					});
				});
				
				// end of document ready callback
			});
		})();
		//]]>
		</script>
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