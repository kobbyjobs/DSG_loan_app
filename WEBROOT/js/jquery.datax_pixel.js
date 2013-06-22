////////////////////////////////////////////////////////////////
//	@file		jquery.datax_pixel.js
////////////////////////////////////////////////////////////////

( function ( $ ) {
	var script_urls = {
		testing : 'rc.verihub.com/api/js/datax_pixel.js',
		production : 'verihub.com/api/js/datax_pixel.js'
	};
	
	$.fn.datax_pixel = function ( options ) {
		var settings = $.extend({
			testing : false,
			aid : 'NULL_PUBLISHER_AFF_ID',
			sid : 'NULL_PUBLISHER_SUB_ID'
		}, options );
		
		var script_url = ( 'https:' == document.location.protocol ) ? 'https://' : 'http://';
		if ( settings.testing ) {
			script_url += script_urls.testing;
		} else {
			script_url += script_urls.production;
		}
		
		this.append( '<input type="hidden" id="datax_pixel" name="datax_pixel" value="" />' );
		this.append( '<input type="hidden" id="datax_pixel_aid" name="datax_pixel_aid" value="' + settings.aid + '" />' );
		this.append( '<input type="hidden" id="datax_pixel_sid" name="datax_pixel_sid" value="' + settings.sid + '" />' );
		
		$.getScript( script_url )
		.done(( function () {
			return function ( data, textStatus, jqXHR ) {
				console.log( 'DATAX_PIXEL_JS_LOADED = 1' );
			};
		})())
		.fail(( function () {
			return function ( jqXHR, textStatus, errorThrown ) {
				console.log( 'DATAX_PIXEL_JS_LOADED = 0' );
			};
		})());
	};
})( jQuery );

////////////////////////////////////////////////////////////////
//	@end		jquery.datax_pixel.js
////////////////////////////////////////////////////////////////