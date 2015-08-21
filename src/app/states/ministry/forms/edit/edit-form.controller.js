(function ( module ) {
	'use strict';

	module.controller( 'EditFormController', function ( $log, $scope, $state, gettext, MPDForms, form, forms, growl ) {
		$scope.form = form;
		$scope.isEditable = true;

		$scope.saveForm = function () {
			var method = angular.isDefined( $scope.form.mpd_def_id ) ? 'update' : 'save';
			MPDForms[method]( $scope.form, function ( value, responseHeaders ) {
				// Success
				var form = _.findWhere( forms, {mpd_def_id: value.mpd_def_id} );
				if ( angular.isDefined( form ) ) {
					angular.copy( value, form );
				}
				else {
					forms.push( value );
				}

				// Notify on success
				growl.success( gettext( 'Budget form has been saved.' ) );

				$state.go( 'editForm', {mpd_def_id: value.mpd_def_id}, {reload: true} );
			}, function ( httpResponse ) {
				// Failure
				$log.error( httpResponse );

				// Notify on failure
				growl.error( gettext( 'An error occurred while saving the budget form. Please try again.' ) );
			} );
		};
	} );

})( angular.module( 'mpdCalculator.states.forms.edit' ) );
