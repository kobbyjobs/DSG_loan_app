////////////////////////////////////////////////////////////////
// File: loan_app/js/long_form.js
////////////////////////////////////////////////////////////////

// global id 'counter' for dynamic id generation
var generate_next_global_id = ( function () {
	var next_global_id = 0;
	
	return function () {
		var next_id_str = 'DSG_ID_' + next_global_id;
		
		next_global_id++;
		
		return next_id_str;
	};
}) ();

$( document ).ready( function () {
	// set up the accordion widget
	$( '#form_panels' )
		.accordion({
			heightStyle : 'content',
			collapsible : true
		});
	
	// set up the previous/next button click handlers
	$( '#form_panel_1 a.next' ).button({
		icons : {
			secondary : 'ui-icon-arrowthick-1-e'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 1 );
	});
	$( '#form_panel_2 a.prev' ).button({
		icons : {
			primary : 'ui-icon-arrowthick-1-w'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 0 );
	});
	$( '#form_panel_2 a.next' ).button({
		icons : {
			secondary : 'ui-icon-arrowthick-1-e'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 2 );
	});
	$( '#form_panel_3 a.prev' ).button({
		icons : {
			primary : 'ui-icon-arrowthick-1-w'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 1 );
	});
	$( '#form_panel_3 a.next' ).button({
		icons : {
			secondary : 'ui-icon-arrowthick-1-e'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 3 );
	});
	$( '#form_panel_4 a.prev' ).button({
		icons : {
			primary : 'ui-icon-arrowthick-1-w'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 2 );
	});
	$( '#form_panel_4 a.next' ).button({
		icons : {
			secondary : 'ui-icon-arrowthick-1-e'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 4 );
	});
	$( '#form_panel_5 a.prev' ).button({
		icons : {
			primary : 'ui-icon-arrowthick-1-w'
		}
	}).click( function ( event ) {
		event.preventDefault();
		$( '#form_panels' ).accordion( 'option', 'active', 3 );
	});
	
	// set up the jQuery UI styled radio buttons
	$( '.form_panel_buttonset' ).buttonset();
	
	// set up next payday calendars
	$( '#paycheck_calendar_1' ).datepicker({
		altField: '#date_of_next_paycheck_1',
		altFormat: 'yy-mm-dd',
		minDate : 1,
		maxDate : 90,
		beforeShowDay : $.datepicker.noWeekends
	});
	$( '#paycheck_calendar_2' ).datepicker({
		altField: '#date_of_next_paycheck_2',
		altFormat: 'yy-mm-dd',
		minDate : 1,
		maxDate : 90,
		beforeShowDay : $.datepicker.noWeekends
	});
	
	// set up the long-form submission button
	$( '#long_form_submit' ).button();
	
	// set up the long-form submission handling
	// for validation, etc.
	$( '#long_form' )
		.submit( function ( event ) {
			var validated = false;
			
			$( '#form_panels' ).accordion( 'option', 'active', false );
			
			//event.preventDefault();
			
			validated = validate_all_form_fields();
			
			// prevent double-click submission
			//$( '#long_form_submit' ).hide();
			
			// do some validation tasks here
			
			if ( ! validated ) {
				// take some action based on failure to validate
				var div_id_str = generate_next_global_id();
				$( '<div id="' + div_id_str + '" title="Validation Error"><p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0px 7px 20px 0px;"></span>Failed to validate form!</p></div>' )
					.insertAfter( '#root' )
					.dialog({
						resizable: false,
						draggable: false,
						modal: true,
						buttons: {
							'OK': ( function ( d ) {
								return function () {
									$( d )
										.dialog( 'close' )
										.dialog( 'destroy' )
										.remove();
								};
							}) ( this ),
							'Cancel': ( function ( d ) {
								return function () {
									$( d )
										.dialog( 'close' )
										.dialog( 'destroy' )
										.remove();
								};
							}) ( this )
						},
						beforeClose: function ( event, ui ) {
							//alert ( 'event.target = ' + event.target );
							//event.preventDefault();
						}
					});
				
				// show the submit button again
				//$( '#long_form_submit' ).show();
				
				// stop the form submission
				return false;
			} else {
				// good on the validation
				var div_id_str = generate_next_global_id();
				var span_id_str = generate_next_global_id();
				var p_id_str = generate_next_global_id();
				
				$( '<div id="' + div_id_str + '" title="Loan Application Processing"><p style="padding-top: 25px;"><span id="' + span_id_str + '" class="ui-icon ui-icon-arrowrefresh-n-1" style="float: left; margin: 0px 7px 20px 0px;"></span>Please be patient while your application is being processed...</p><p id="' + p_id_str + '" style="text-align: center; font-family: Courier New,Courier,monospance; font-weight: bold; font-size: 48px; padding-top: 25px; padding-bottom: 15px;"><span class="minutes">0</span> : <span class="seconds">00</span></p></div>' )
					.insertAfter( '#root' )
					.dialog({
						width: 625,
						resizable: false,
						draggable: false,
						modal: true,
						beforeClose: ( function ( id_str ) {
							return function ( event, ui ) {
								//var interval_id = $( '#' + id_str ).data( 'interval_id' );
								//window.clearInterval( interval_id );
								//alert( 'event.target = ' + event.target );
								event.preventDefault();
							};
						}) (span_id_str)
					});
				
				$( '#' + span_id_str ).data( 'current_icon', 1 );
					
				var interval_id = window.setInterval( ( function ( id_str ) {
					var icon_set = new Array ();
					icon_set[0] = 'ui-icon-arrowrefresh-1-w';
					icon_set[1] = 'ui-icon-arrowrefresh-1-n';
					icon_set[2] = 'ui-icon-arrowrefresh-1-e';
					icon_set[3] = 'ui-icon-arrowrefresh-1-s';
					
					return function () {
						var current_icon = $( '#' + id_str ).data('current_icon');
						var next_icon = ( current_icon + 1 ) % icon_set.length;
						
						$( '#' + id_str )
							.removeClass( icon_set[current_icon] )
							.addClass( icon_set[next_icon] )
							.data( 'current_icon', next_icon);
					};
				}) ( span_id_str ), 100 );
				
				$( '#' + span_id_str ).data( 'interval_id', interval_id );
				
				interval_id = null;
				
				interval_id = window.setInterval( ( function ( id_str ) {
					var seconds = 0;
					var minutes = 0;
					
					return function () {
						var seconds_str = '';
						var minutes_str = '';
						
						seconds++;
						if ( seconds >= 60 ) {
							seconds = 0;
							minutes++;
						}
						
						seconds_str = '' + seconds;
						if ( seconds < 10 ) {
							seconds_str = '0' + seconds_str;
						}
						
						minutes_str = '' + minutes;
						
						$( '#' + p_id_str + ' > .minutes' ).text( minutes_str );
						$( '#' + p_id_str + ' > .seconds' ).text( seconds_str );
					};
				}) ( p_id_str ), 1000 )
				
				// proceed with form submission
				setTimeout (ajax_form_submit, 2000);
				
				return false;
			}
			
			return false;
		});
});

function validate_all_form_fields () {
	return true;
}

function ajax_form_submit () {
	form_data = $( '#long_form' ).serialize();
	
	$.ajax({
		type: 'POST',
		url: '/secure/DSG_loan_app/index.php/long_form/post_and_continue/',
		dataType: 'json',
		data: form_data
	}).done( function ( data, text_status, jqxhr_obj ) {
		//alert( data['redirect_url']  );
		setTimeout( function () {
			window.location.href = data['redirect_url'];
		}, 5000 );
	}).fail( function ( jqxhr_obj, text_status, error_thrown ) {
		alert( 'There was a problem with submitting your application. Please try again later.' );
	});
}