<?php namespace GlobalTechnology\MPDCalculator {
	require_once( dirname( __FILE__ ) . '/../vendor/autoload.php' );

	$wrapper = ApplicationWrapper::singleton();
	$wrapper->authenticate();

	if ( empty( $_GET ) ) {
		header( 'Content-Type: text/html; charset=UTF-8', true, 200 );
		echo '<html><head><title>CAS Proxy Callback Handler</title></head><body></body></html>';
		exit();
	}
}
