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
	// Define some validation rules for each panel's form fields
	////////////////////////////////////////////////////////////
	
	var validation_rules_1 = {
		// empty, panel one has no rules (so far)
	};
	
	var validation_rules_2 = {
		first_name : {
			sel : "#first_name",
			rex : /^[A-Z\-]+$/gi,
			msg : "First name must be some combination of only letters (hyphens are permitted also)"
		},
		middle_initial : {
			sel : "#middle_initial",
			rex : /^[A-Z]?$/gi,
			msg : "Middle initial is optional, but must be only one letter if given"
		},
		last_name : {
			sel : "#last_name",
			rex : /^[A-Z\-]+$/gi,
			msg : "Last name must be some combination of only letters (hyphens are permitted also)"
		},
		social_security_number : {
			sel : "#social_security_number",
			rex : /^[0-9]{9}$/g,
			msg : "You must enter nine digits for your social security number"
		},
		drivers_license_id_number : {
			sel : "#drivers_license_id_number",
			rex : /^[0-9A-Z\-]+$/g,
			msg : "Driver's license or ID number may be entered as a combination of upper-case letters, digits and dashes (if necessary)"
		}
	};
	
	var validation_rules_3 = {
		email : {
			sel : "#email",
			// See: http://www.regular-expressions.info/email.html
			rex : /^[A-Z0-9._%+\-]+@[A-Z0-9.\-]+\.[A-Z]{2,4}$/gi,
			msg : "You must enter a valid e-mail address"
		},
		home_phone : {
			sel : "#home_phone",
			rex : /^[2-9]{1}[0-9]{9}$/g,
			msg : "You must enter a valid home/primary phone number"
		},
		mobile_phone : {
			sel : "#mobile_phone",
			rex : /^([2-9]{1}[0-9]{9}|.{0,0})$/g,
			msg : "You must enter a valid mobile phone number, or leave this field blank"
		},
		street_address : {
			sel : "#street_address",
			rex : /^[A-Z0-9.\-,&# ]+$/gi,
			msg : "You must enter a valid street address"
		},
		city : {
			sel : "#city",
			rex : /^[A-Z\- &]+$/gi,
			msg : "You must enter a valid city name"
		},
		zip_code : {
			sel : "#zip_code",
			rex : /^[0-9]{5}$/g,
			msg : "You must enter a valid five digit zip code"
		},
		months_at_address : {
			sel : "#months_at_address",
			rex : /^[1-9]+[0-9]*$/g,
			msg : "Length of time lived at current address must be more than 0 years and 0 months"
		}
	};
	
	var validation_rules_4 = {
		employer_name : {
			sel : "#employer_name",
			rex : /^[A-Z &.,:\-+]+$/gi,
			msg : "You must enter a name for your employer"
		},
		employer_phone : {
			sel : "#employer_phone",
			rex : /^[2-9]{1}[0-9]{9}$/g,
			msg : "You must give a valid phone number for your employer"
		},
		job_title : {
			sel : "#job_title",
			rex : /^[A-Z &.,:\-+]+$/gi,
			msg : "You must give some title for your job"
		},
		last_paycheck_amount : {
			sel : "#last_paycheck_amount",
			rex : /^[1-9]+[0-9]*$/g,
			msg : "You must enter in the amount of your last paycheck"
		}
	};
	
	var validation_rules_5 = {
	
	};
	
	////////////////////////////////////////////////////////////
	// Define a function which shall act as an "engine" to 
	// execute the defined validation rules
	////////////////////////////////////////////////////////////
	
	var execute_validation_rules = function ( evt, rule_set ) {
		for ( field in rule_set ) {
			if ( evt.isDefaultPrevented () ) {
				// if the default event action has already been canceled,
				// it would be "unwise" to proceed further...
				break;
			}
			
			var rule = rule_set[field];
			var $sel = $( rule['sel'] );
			var rex = rule['rex'];
			var msg = rule['msg'];
			
			console.log( 'field = ' + field + '\nrex = ' + rex + '\n$sel.val() = ' + $sel.val() );
			console.log( 'rex.lastIndex = ' + rex.lastIndex + '\nResetting rex.lastIndex to 0...' );
			rex.lastIndex = 0;
			console.log( 'rex.lastIndex = ' + rex.lastIndex );
			
			if (! rex.test( $sel.val() )) {
				evt.preventDefault();
				
				var oldTitle = $sel.attr( 'title' );
				$sel.data( 'oldTitle', oldTitle );
				$sel.attr( 'title', msg );
				$sel.tooltip({
					tooltipClass : 'ui-state-error'
				});
				$sel.bind( 'blur.removeError', function () {
					// could have called this variable oldTitle as well, but using
					// tmp instead to avoid any sort of subtle confusion as to scope
					var tmp = $( this ).data( 'oldTitle' );
					$( this ).removeData( 'oldTitle' );
					$( this ).tooltip( 'destroy' );
					$( this ).attr( 'title', tmp );
					$( this ).unbind( 'blur.removeError' );
				});
				$sel.focus();
				$sel.tooltip( 'open' );
			}
		}
	};
	
	////////////////////////////////////////////////////////////
	// Bind to the form panels' beforeActivate event to do some
	// form validation tasks
	////////////////////////////////////////////////////////////
	
	$( '#form_panels' ).bind( 'accordionbeforeactivate', function ( evt, ui ) {
		if ( ui.oldPanel.is( '#form_panel_1' ) ) {
			console.log( 'Validating form panel #1...' );
			execute_validation_rules( evt, validation_rules_1 );
		} else if ( ui.oldPanel.is( '#form_panel_2' ) ) {
			console.log( 'Validating form panel #2...' );
			execute_validation_rules( evt, validation_rules_2 );
		} else if ( ui.oldPanel.is( '#form_panel_3' ) ) {
			console.log( 'Validating form panel #3...' );
			execute_validation_rules( evt, validation_rules_3 );
		} else if ( ui.oldPanel.is( '#form_panel_4' ) ) {
			console.log( 'Validating form panel #4...' );
			execute_validation_rules( evt, validation_rules_4 );
		} else if ( ui.oldPanel.is( '#form_panel_5' ) ) {
			console.log( 'Validating form panel #5...' );
			execute_validation_rules( evt, validation_rules_5 );
		}
	});
});
