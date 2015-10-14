<?php namespace GlobalTechnology\MPDCalculator {
	require_once( dirname( __FILE__ ) . '/../vendor/autoload.php' );
	$wrapper = ApplicationWrapper::singleton();
	$wrapper->authenticate();
	?>
	<!doctype html>
	<html ng-app="mpdCalculator">
	<head>
		<meta charset="UTF-8">
		<base href="<?php echo rtrim( $wrapper->url->getPath(), '/' ) . '/'; ?>" />
		<title></title>

		<!-- Application Configuration -->
		<script type="application/javascript">
			var MPDCalculator = window.MPDCalculator = window.MPDCalculator || {};
			MPDCalculator.config = <?php echo $wrapper->appConfig(); ?>;
		</script>

		<!-- 3rd Party JavaScript and CSS -->
		<script type="application/javascript" src="bower_components/jquery/dist/jquery.js"></script>
		<script type="application/javascript" src="bower_components/angular-loader/angular-loader.js"></script>
		<script type="application/javascript" src="bower_components/angular/angular.js"></script>
		<script type="application/javascript" src="bower_components/angular-resource/angular-resource.js"></script>
		<script type="application/javascript" src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
		<script type="application/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
		<script type="application/javascript" src="bower_components/ngstorage/ngStorage.js"></script>
		<script type="application/javascript" src="bower_components/moment/moment.js"></script>
		<script type="application/javascript" src="bower_components/underscore/underscore.js"></script>
		<script type="application/javascript" src="bower_components/webshim/js-webshim/dev/polyfiller.js"></script>
		<script type="application/javascript" src="bower_components/jquery-ui/jquery-ui.js"></script>
		<script type="application/javascript" src="bower_components/angular-ui-sortable/sortable.js"></script>
		<script type="application/javascript" src="bower_components/angular-sanitize/angular-sanitize.js"></script>
		<script type="application/javascript" src="bower_components/ui-select/dist/select.js"></script>
		<script type="application/javascript">
			webshims.polyfill( 'forms forms-ext' );
		</script>
		<link rel="stylesheet" href="bower_components/bootswatch/superhero/bootstrap.css" />

		<!-- Application CSS -->
		<!-- build:styles -->
		<link rel="stylesheet" href="app/css/app.css" />
		<!-- endbuild -->

		<!-- build:library -->
		<script type="application/javascript" src="bower_components/angular-gettext/dist/angular-gettext.js"></script>
		<script type="application/javascript" src="bower_components/angular-growl-v2/build/angular-growl.js"></script>
		<!-- endbuild -->
	</head>
	<body>
	<div growl></div>
	<div ui-view>
		<!-- Placeholder while Angular app loads -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">MPD Calculator</a>
				</div>
			</div>
		</nav>

		<div class="sk-container">
			<div>
				<div>Application Loading &hellip;</div>
				<div class="sk-cube-grid">
					<div class="sk-cube sk-cube1"></div>
					<div class="sk-cube sk-cube2"></div>
					<div class="sk-cube sk-cube3"></div>
					<div class="sk-cube sk-cube4"></div>
					<div class="sk-cube sk-cube5"></div>
					<div class="sk-cube sk-cube6"></div>
					<div class="sk-cube sk-cube7"></div>
					<div class="sk-cube sk-cube8"></div>
					<div class="sk-cube sk-cube9"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Application JavaScript -->
	<!-- build:application -->
	<script type="application/javascript" src="app/api/measurements/measurements.module.js"></script>
	<script type="application/javascript" src="app/app.module.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget/mpd-budget.module.js"></script>
	<script type="application/javascript" src="app/components/mpd-form/mpd-form.module.js"></script>
	<script type="application/javascript" src="app/components/mpd-formula/mpd-formula.module.js"></script>

	<script type="application/javascript" src="app/states/app.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/ministry.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/budget/budget.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/budget/edit/edit.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/budgets.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/create/create.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/forms/forms.state.js"></script>
	<script type="application/javascript" src="app/states/ministry/forms/edit/edit-form.state.js"></script>
	<script type="application/javascript" src="app/states/select/select.state.js"></script>

	<script type="application/javascript" src="app/api/measurements/budgets.service.js"></script>
	<script type="application/javascript" src="app/api/measurements/forms.service.js"></script>
	<script type="application/javascript" src="app/api/measurements/ministries.service.js"></script>
	<script type="application/javascript" src="app/api/measurements/session.service.js"></script>
	<script type="application/javascript" src="app/app.config.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget/budget-value.filter.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget/mpd-budget.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget/question.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget/section.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-budget-list/mpd-budget-list.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-form/mpd-form.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-form-list/mpd-form-list.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-formula/mpd-formula.directive.js"></script>
	<script type="application/javascript" src="app/components/mpd-formula/formula-editor.controller.js"></script>
	<script type="application/javascript" src="app/components/period.filter.js"></script>
	<script type="application/javascript" src="app/settings/settings.service.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/budget/edit/edit.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/create/create.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/budgets/sidebar.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/change-ministry.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/forms/sidebar.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/forms/edit/edit-form.controller.js"></script>
	<script type="application/javascript" src="app/states/ministry/unsaved-changes.controller.js"></script>
	<script type="application/javascript" src="app/states/select/select.controller.js"></script>
	<!-- endbuild -->

	</body>
	</html>
<?php }
