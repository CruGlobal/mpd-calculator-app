<?php namespace GlobalTechnology\MPDDashboard {
	/**
	 * @param string $var
	 * @param mixed  $default
	 *
	 * @return string
	 */
	function ENV( $var, $default = '' ) {
		return array_key_exists( $var, $_SERVER ) ? $_SERVER[ $var ] : $default;
	}

	return array(
		/**
		 * Application Settings
		 */
		'application'  => array(
			/**
			 * Application version
			 */
			'version'      => '1.0.0',

			/**
			 * Project Name
			 */
			'project_name' => ENV( 'PROJECT_NAME', 'mpd-calculator-app' ),

			/**
			 * Application directory
			 *
			 * Location where where index.html, javascript, styles should be loaded from.
			 * Valid values (dist, src)
			 */
			'directory'    => ENV( 'APPLICATION_DIR', 'dist' ),

			/**
			 * Application Environment
			 *
			 * Valid values (production, staging, development)
			 */
			'environment'  => ENV( 'ENVIRONMENT', 'production' ),
		),

		/**
		 * Proxy Granting Ticket Service
		 *
		 * Enable this to use the php wrapper on localhost.
		 */
		'pgtservice'   => array(
			/** @var bool Enable PGT Service */
			'enabled'  => (bool)ENV( 'PGTSERVICE_ENABLED', false ),
			/** @var string PGT Service proxy callback URL */
			'callback' => ENV( 'PGTSERVICE_CALLBACK', 'https://agapeconnect.me/casLogin.aspx' ),
			/** @var string PGT Service endpoint URL */
			'endpoint' => ENV( 'PGTSERVICE_ENDPOINT', 'https://agapeconnect.me/DesktopModules/AgapeConnect/casauth/pgtcallback.asmx/RetrievePGTCallback' ),
			/** @var string PGT Service Username */
			'username' => ENV( 'PGTSERVICE_USERNAME', '' ),
			/** @var string PGT Service Password */
			'password' => ENV( 'PGTSERVICE_PASSWORD', '' ),
		),

		/**
		 * CAS Settings
		 */
		'cas'          => array(
			/** @var string CAS hostname */
			'hostname' => ENV( 'CAS_HOSTNAME', 'thekey.me' ),
			/** @var int CAS port */
			'port'     => ENV( 'CAS_PORT', 443 ),
			/** @var string CAS context */
			'context'  => ENV( 'CAS_CONTEXT', 'cas' ),
		),

		/**
		 * Redis Settings
		 */
		'redis'        => array(
			'hostname' => ENV( 'REDIS_PORT_6379_TCP_ADDR', false ),
			'port'     => 6379,
			'db'       => ENV( 'REDIS_DB_INDEX', 2 ),
		),

		/**
		 * Measurements API
		 */
		'measurements' => array(
			/** @var string API endpoint, no training slash */
			'endpoint' => ENV( 'MEASUREMENTS_API', 'https://measurements.global-registry.org/v4' ),
		),
	);
}
