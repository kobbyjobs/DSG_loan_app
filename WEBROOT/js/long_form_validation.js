////////////////////////////////////////////////////////////////
// File: js/long_form_validation.js
////////////////////////////////////////////////////////////////

$( document ).ready( function () {

	////////////////////////////////////////////////////////////
	// Set up and configure the form fields on which the jQuery
	// inputmask plugin will be used
	////////////////////////////////////////////////////////////

	$( '#first_name' ).inputmask( 'mask', {
		'mask': 'A[AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA]',
		'autoUnmask': true,
		'onincomplete': function () {
			//alert( 'You must enter a first name!' );
			//$( '#first_name' ).focus();
		}
	});
	
	$( '#middle_initial' ).inputmask( 'mask', {
		'mask': '[A]',
		'autoUnmask': true
	});
	
	$( '#last_name' ).inputmask( 'mask', {
		'mask': 'A[AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA]',
		'autoUnmask': true,
		'onincomplete': function () {
			//alert( 'You must enter a last name!' );
			//$( '#last_name' ).focus();
		}
	});
	
	$( '#social_security_number' ).inputmask( 'mask', {
		'mask': '999-99-9999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter a social security number!' );
			//$( '#social_security_number' ).focus();
		}
	});
	
	$( '#drivers_license_id_number' ).inputmask( 'mask', {
		'mask': '#[########################################]',
		'autoUnmask': true,
		//'clearIncomplete': true,
		'onincomplete': function () {
			//alert( "You must enter a driver's license/ID number!" );
			//$( '#drivers_license_id_number' ).focus();
		}
	});
	
	// something for e-mail here
	
	$( '#home_phone' ).inputmask( 'mask', {
		'mask': '(999) 999-9999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter a home phone number!' );
			//$( '#home_phone' ).focus();
		}
	});
	
	$( '#mobile_phone' ).inputmask( 'mask', {
		'mask': '(999) 999-9999',
		'autoUnmask': true,
		'clearIncomplete': true
	});
	
	// something for street address here
	
	// something for city here
	
	$( '#zip_code' ).inputmask( 'mask', {
		'mask': '99999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter a zip code!' );
			//$( '#zip_code' ).focus();
		}
	});
	
	// something for employer name
	
	$( '#employer_phone' ).inputmask( 'mask', {
		'mask': '(999) 999-9999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter an employer phone number!' );
			//$( '#employer_phone' ).focus();
		}
	});
	
	// something for job title
	
	$( '#last_paycheck_amount' ).inputmask( 'mask', {
		'mask': '$ 9[99999]',
		'autoUnmask': true,
		//'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter the amount of your last paycheck!' );
			//$( '#last_paycheck_amount' ).focus();
		}
	});
	
	$( '#bank_routing_number' ).inputmask( 'mask', {
		'mask': '999999999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter your bank account routing number!' );
			//$( '#bank_routing_number' ).focus();
		},
		'oncomplete': function () {
			$.ajax({
				url: '/secure/DSG_loan_app/index.php/long_form/lookup_bank_routing_number/' + $( '#bank_routing_number' ).val(),
				dataType: 'json'
			}).done( function ( data, textStatus, jqXHR ) {
					if ( data['message'] == 'OK' ) {
						$( '#bank_name' ).val( data['customer_name'] );
						$( '#bank_phone' ).val( data['telephone'].replace( /[^0-9]/g, '' ) );
					} else {
						alert( 'You must enter a VALID bank account routing number!' );
						$( '#bank_routing_number' ).val ( '' );
						$( '#bank_routing_number' ).focus();
					}
			});
		}
	});
	
	$( '#bank_account_number' ).inputmask( 'mask', {
		'mask': '9[999999999999999999999999]',
		'autoUnmask': true,
		//'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must eneter your bank account number!' );
			//$( '#bank_account_number' ).focus();
		}
	});
	
	// something for bank name here
	
	$( '#bank_phone' ).inputmask( 'mask', {
		'mask': '(999) 999-9999',
		'autoUnmask': true,
		'clearIncomplete': true,
		'onincomplete': function () {
			//alert( 'You must enter a bank phone number!' );
			//$( '#bank_phone' ).focus();
		}
	});
	
	////////////////////////////////////////////////////////////
	// Bind to the form panels' beforeActivate event to do some
	// form validation tasks
	////////////////////////////////////////////////////////////
	
	$( '#form_panels' ).bind( 'accordionbeforeactivate', function ( event, ui ) {
		if ( ui.oldPanel.is( '#form_panel_1' ) ) {
			console.log( 'Validating form panel #1...' );
		} else if ( ui.oldPanel.is( '#form_panel_2' ) ) {
			console.log( 'Validating form panel #2...' );
		} else if ( ui.oldPanel.is( '#form_panel_3' ) ) {
			console.log( 'Validating form panel #3...' );
		} else if ( ui.oldPanel.is( '#form_panel_4' ) ) {
			console.log( 'Validating form panel #4...' );
		} else if ( ui.oldPanel.is( '#form_panel_5' ) ) {
			console.log( 'Validating form panel #5...' );
		}
	});
});
