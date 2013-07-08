////////////////////////////////////////////////////////////////
// File: js/long_form_supporting.js
////////////////////////////////////////////////////////////////

$( document ).ready( function () {
	
	////////////////////////////////////////////////////////////
	// Supporting event handlers for updating the hidden field
	// "months_at_address" dynamically based on user's selection
	////////////////////////////////////////////////////////////
	
	var months_at_address_closure = function () {
		return function () {
			var months_part_str = $( '#months_at_address_months_part' ).val();
			var years_part_str = $( '#months_at_address_years_part' ).val();
			var months_part = parseInt( months_part_str );
			var years_part = parseInt( years_part_str );
			
			var total_months = ( years_part * 12 ) + months_part;
			
			$( '#months_at_address' ).val( '' + total_months );
		};
	};
	
	$( '#months_at_address_months_part' ).change( months_at_address_closure() );
	$( '#months_at_address_years_part' ).change( months_at_address_closure() );
	
});

////////////////////////////////////////////////////////////////
// End of file: js/long_form_supporting.js
////////////////////////////////////////////////////////////////