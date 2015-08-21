(function ( module ) {
	'use strict';

	module.config( function ( $stateProvider ) {
		$stateProvider.state( 'editForm', {
			parent:  'forms',
			url:     '/{mpd_def_id}',
			resolve: {
				'form': function ( $log, $q, $stateParams, $state, MPDForms, forms ) {
					var deferred = $q.defer(),
						form     = undefined;

					// Edit from by ID
					if ( angular.isDefined( $stateParams.mpd_def_id ) && $stateParams.mpd_def_id !== '' ) {
						var mpd_def_id = +$stateParams.mpd_def_id;
						form = _.findWhere( forms, {mpd_def_id: mpd_def_id} );
						if ( angular.isUndefined( form ) ) {
							deferred.reject();
							$state.go( 'forms' );
						}
						else {
							deferred.resolve( form );
						}
					}
					// New form using $stateParams.form as template
					else if ( angular.isDefined( $stateParams.form ) && angular.isObject( $stateParams.form ) ) {
						form = angular.copy( $stateParams.form );
						delete form.mpd_def_id;
						form.is_global = false;
						deferred.resolve( form );
					}
					// New blank form
					else {
						deferred.resolve( {
							is_global: false,
							sections:  [{
								total_mode: 'both',
								view_order: 1,
								questions:  [{
									view_order: 1,
									type:       'basic_month'
								}]
							}]
						} );
					}
					return deferred.promise;
				}
			},
			views:   {
				'@app': {
					templateUrl: 'app/states/ministry/forms/edit/edit-form.html',
					controller:  'EditFormController'
				}
			},
			params:  {
				form: undefined
			}
		} );
	} );

})( angular
	.module( 'mpdCalculator.states.forms.edit', [
		// Dependencies
		'ui.router',
		'mpdCalculator.states.forms',
		'mpdCalculator.api.measurements',
		'mpdCalculator.components.mpdForm',
		'mpdCalculator.components.mpdFormula'
	] ) );
