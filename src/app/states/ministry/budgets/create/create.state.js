(function ( module ) {
	'use strict';

	module.config( function ( $stateProvider ) {
		$stateProvider.state( 'createBudget', {
			parent:  'budgets',
			//TODO Make mpd_def_id part of the url, missing or invalid would choose first form
			url:     '/create',
			resolve: {
				'forms':  function ( $log, MPDForms, ministry ) {
					return MPDForms.query( {ministry_id: ministry.ministry_id} ).$promise;
				},
				'budget': function ( $log, session, ministry, forms, MPDBudgets, user ) {
					var form     = _.first( forms ),
						defaults = {
							person_id:   session.user.person_id,
							person_name: [user.last_name, user.first_name].join( ', ' ),
							ministry_id: ministry.ministry_id
						};
					return MPDBudgets.newBudget( form, defaults );
				}
			},
			views:   {
				'@app': {
					templateUrl: 'app/states/ministry/budgets/create/create.html',
					controller:  'CreateBudgetController'
				}
			}
		} );
	} );

})( angular
	.module( 'mpdCalculator.states.budgets.create', [
		// Dependencies
		'ui.router',
		'mpdCalculator.components.mpdBudget',
		'mpdCalculator.states.budgets',
		'mpdCalculator.api.measurements'
	] ) );
