(function ( module ) {
	'use strict';

	module
		.controller( 'FormsSidebarController', function ( $log, $scope, $state, user, forms ) {
			$scope.$state = $state;
			$scope.user = user;
			$scope.forms = forms;

			$scope.notEqual = function ( actual, expected ) {
				return !angular.equals( actual, expected );
			};
		} );

})( angular.module( 'mpdCalculator.states.forms' ) );
