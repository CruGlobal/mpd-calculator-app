(function ( module ) {
	'use strict';

	module.directive( 'mpdFormList', function ( $log ) {
		return {
			restrict:    'E',
			scope:       {
				forms: '&forms',
				title: '@'
			},
			templateUrl: 'app/components/mpd-form-list/mpd-form-list.html',
			controller:  function ( $scope ) {
				$scope.collapsed = false;
			}
		};
	} );
})( angular.module( 'mpdCalculator.components.mpdFormList', [] ) );
