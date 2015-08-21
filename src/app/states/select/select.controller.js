(function ( module ) {
	'use strict';

	module
		.controller( 'SelectMinistryController', function ( $log, $scope, $state, ministries, ministry ) {
			$scope.$state = $state;
			$scope.ministries = ministries;

			$scope.setMinistry = function () {
				$state.go( 'budgets', {min_code: $scope.ministry.min_code} );
			};
		} );

})( angular.module( 'mpdCalculator.states.select' ) );
