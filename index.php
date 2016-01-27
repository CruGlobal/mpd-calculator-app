<?php namespace GlobalTechnology\MPDCalculator {
	require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
	$wrapper = ApplicationWrapper::singleton();
	$wrapper->authenticate();
	$min = Config::get( 'application.directory', 'dist' ) === 'dist' ? '.min' : '';
	?>
	<!doctype html>
	<html>
	<head>
		<!-- Application Configuration -->
		<script type="application/javascript">
			var MPDCalculator = window.MPDCalculator = window.MPDCalculator || {};
			MPDCalculator.config = <?php echo $wrapper->appConfig(); ?>;
		</script>

		<style>
			body, html {
				margin: 0; padding: 0; height: 100%; overflow: hidden;
			}

			#MPDCalculatorApplication {
				position:absolute; left: 0; right: 0; bottom: 0; top: 0; height: 100%;
			}
		</style>

		<!--<script type="application/javascript" src="<? echo $wrapper->appDir( "iframeResizer{$min}.js" ); ?>"></script>-->
	</head>
	<body style="margin: 0;">
	<iframe id="MPDCalculatorApplication" src="<?php echo $wrapper->appDir( 'index.html' ); ?>" style="width: 100%; border-width: 0;"></iframe>

	<!-- Resizeable iFrame Example -->
	<!--<iframe id="MPDCalculatorApplication" src="<?php echo $wrapper->appDir( 'index.html' ); ?>" style="width: 100%; border-width: 0;" scrolling="no"></iframe>-->
	<!--<script type="application/javascript">iFrameResize( {minHeight: 500}, document.getElementById( 'MPDCalculatorApplication' ) );</script>-->
	</body>
	</html>
<?php }
