(function( $ ) {

	wp.customize.bind( 'ready', function() {

		/**
		 *	Toogle Custom Control's Script
		 */

		var customize = this; // Customize object alias.

		// Array with the control names
		var toggleControls = [
			'#CONTROLNAME01#',
			'#CONTROLNAME02#'
		];

		$.each( toggleControls, function( index, control_name ) {

			customize( control_name, function( value ) {

				var controlTitle = customize.control( control_name ).container.find( '.customize-control-title' );

                // Get control  title.
				// 1. On loading.
				controlTitle.toggleClass( 'disabled-control-title', !value.get() );

				// 2. Binding to value change.
				value.bind( function( to ) {
					controlTitle.toggleClass( 'disabled-control-title', !value.get() );
				} );

			} );

		} );

	});

}) ( jQuery );
