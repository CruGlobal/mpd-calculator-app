(function ( module ) {
	'use strict';

	module.controller( 'CreateBudgetController', function ( $log, $scope, $state, gettext, MPDBudgets, forms, budget, user, growl, budgets ) {
		$scope.forms = forms;
		$scope.budget = budget;
		$scope.user = user;
		$scope.isEditable = true;

		$scope.$watch( 'budget.mpd_def_id', function ( id, oldId ) {
			if ( angular.isUndefined( id ) ) {
				delete $scope.form;
			}
			else {
				$scope.form = _.findWhere( forms, {mpd_def_id: id} );
				//TODO Create new budget when form changes
			}
		} );

		$scope.saveDraft = function () {
			MPDBudgets.save( $scope.budget, function ( value, responseHeaders ) {
				// Notify on success
				growl.success( gettext( 'Budget successfully saved.' ) );

				// Add budget to budgets list (updates sidebar).
				budgets.push( value );

				// Route to editBudget since we now have an mpd_budget_id
				$state.go( 'editBudget', {mpd_budget_id: value.mpd_budget_id} );
			}, function ( httpResponse ) {
				// Notify on failure
				growl.error( gettext( 'An error occurred while saving the budget. Please try again.' ) );
			} );
		};

	} );

})( angular.module( 'mpdCalculator.states.budgets.create' ) );
