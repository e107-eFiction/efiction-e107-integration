<?php
if ( ! class_exists( 'efiction_settings' ) ) {

	class efiction_settings {

		
		public function __construct() {
		 
		}

		public static function get_settings() {

			$table_name = MPREFIX . 'fanfiction_settings'; 

			$sitekey = e107::getInstance()->getSitePath();

			$query = "SELECT * FROM ".$table_name." WHERE sitekey = '".$sitekey."' LIMIT 1 "  ; 

			$settings = e107::getDb()->retrieve($query);

			/* replace not used settings */
			$settings['sitekey'] = $sitekey;
			$settings['sitename'] = SITENAME;
			$settings['slogan'] = SITETAG;
			$settings['url'] = SITEURL;
			$settings['tableprefix'] = e107::getDB()->mySQLPrefix;
			$settings['siteemail'] = ADMINEMAIL;
			$settings['language'] = e_LANGUAGE;
			
			unset($settings['smtp_host']);
			unset($settings['smtp_username']);
			unset($settings['smtp_password']);
			 
			return $settings; 

		}

		public static function get_single_setting($setting_name) {

			$settings = self::get_settings();

			if ($setting_name) {
				return $settings[$setting_name];
			}

			return NULL;


		}		
	}

	new efiction_settings();
}