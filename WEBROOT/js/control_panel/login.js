////////////////////////////////////////////////////////////////////////////////
// File: WEBROOT/js/control_panel/login.js
//
// Author: eamohl@leadsanddata.net
//
// Created: July 15, 2013
//
// Description:
//
////////////////////////////////////////////////////////////////////////////////

_DSG.control_panel.login = function ( selector ) {
	this.selector = selector;
	
	this.base_url = _DSG.WEBROOT + 'index.php/control_panel/login/';
	
	this.username = '';
	this.password = '';
	
	( function ( _this ) {
		$( _this.selector ).dialog({
			modal : true,
			dialogClass : 'no-close',
			draggable : true,
			resizable : false,
			closeOnEscape : false,
			title : 'DSG - Login',
			buttons : {
				'Login' : function () {
					_this.setup();
					_this.do_login();
				}
			}
		});
		$( _this.selector ).keyup( function ( evt ) {
			_this.log('keyup', 'evt.which = ' + evt.which);
			if ( 13 == evt.which ) {
				evt.preventDefault();
				_this.setup();
				_this.do_login();
			}
		});
	})( this );
};

_DSG.control_panel.login.prototype.log = function ( tag, str ) {
	console.log( '' );
	console.log( '--------------------------------' );
	console.log( '@[' + this.selector + ']:[' + tag + ']' );
	console.log( '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>' );
	console.log( str );
	console.log( '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<' );
};

_DSG.control_panel.login.prototype.setup = function () {
	var username = $( '#username' ).val();
	var password = $( '#password' ).val();
	
	this.username = encodeURIComponent( username );
	this.password = encodeURIComponent( password );
};

_DSG.control_panel.login.prototype.do_login = function () {
	var url = this.base_url + this.username + '/' + this.password + '/';
	window.location.href = url;
};

////////////////////////////////////////////////////////////////////////////////
// End of file: login.js
////////////////////////////////////////////////////////////////////////////////