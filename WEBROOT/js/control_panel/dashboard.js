////////////////////////////////////////////////////////////////////////////////
// File: js/control_panel/dashboard.js
//
// Author: eamohl@leadsanddata.net
//
// Created: July 15, 2013
//
// Description: 
//
////////////////////////////////////////////////////////////////////////////////

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
					'\t\t<p>Site to Edit: <select id="site_to_edit" name="site_to_edit"><option value="-1">Select a site...</option></select><button id="load_site_configuration">Load</button></p>\n' +
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
						
						$( '#site_to_edit' ).append( html );
					}
				});
			})();
			
			$( '#load_site_configuration' ).click( function ( evt ) {
				var id = $( '#site_to_edit' ).val();
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
							$( '#name' ).val( site_configuration['name'] );
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
							
							$.ajax({
								type : 'POST',
								url : _url,
								data : _data
							}).done( function ( data ) {
								$( '#' + id ).dialog( 'destroy' );
								$( '#' + id ).remove();
								
								alert( 'Site Configuration Updated' );
							});
						},
						'Cancel' : function () {
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

////////////////////////////////////////////////////////////////////////////////
// End of file: dashboard.js
////////////////////////////////////////////////////////////////////////////////