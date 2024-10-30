<?php
/*
Plugin Name: Headup (Discontinued)
Plugin URI: http://www.headup.com
Description: Headup widget for WordPress was discontinued, you are advised to remove this plugin. Headup automatically identifies & highlights the important topics in your content. <a href="http://mint1.headup.com/Services/Backoffice/">Sign up</a> after installation & customize your Headup widget to show related posts from your archivem, get access to usage statistics & gain insight into your blog's most popular topics.
Author: SemantiNet
Version: 1.12
Author URI: http://www.headup.com
*/

if( !class_exists( 'HeadupForWordPress' ) ) {

	class HeadupForWordPress {

		// SETTINGS

		/**
		 * Associative array of languages and language codes.
		 *
		 * @var array
		 */
		var $languages = array();

		/**
		 * Default settings for the plugin.  These settings are used when no settings have yet been saved by the user.
		 *
		 * @var array
		 */
		//var $defaults = array( 'gigya-toolbar-for-wordpress-partner-id' => '825901', 'gigya-toolbar-for-wordpress-status-text' => 'reading %TITLE% at %URL%', 'gigya-toolbar-for-wordpress-email-subject' => 'Nice article - %TITLE%', 'gigya-toolbar-for-wordpress-email-body' => 'Take a look at this article - <a href=\'%URL%\'>%TITLE%</a> from %SITENAME%' );
		var $defaults = array( 'Headup User Id' => '' );

		/**
		 * Array of items that need to get rendered via JavaScript.
		 *
		 * @var array
		 */
		var $needToRender = array();

		// MISC


		/**
		 * A string containing the version for this plugin.  Always update this when releaseing a new version.
		 *
		 * @var string
		 */
		var $version = '1.12';

		/**
		 * Adds all the appropriate actions and filters.
		 *
		 * @return HeadupForWordPress
		 */
		function HeadupForWordPress() {
			register_deactivation_hook( __FILE__, array( &$this, 'deleteSettings' ) );
			//add_action( 'admin_menu', array( &$this, 'addAdministrativePage' ) );
			//add_action( 'init', array( &$this, 'savePluginSettings' ) );
			//add_action( 'wp_head', array( &$this, 'inlineScript' ) );
			//add_action( 'wp_footer', array( &$this, 'displayRenderingPage' ) );
		}

		/// CALLBACKS

		/**
		 * Registers a new administrative page which displays the settings panel.
		 *
		 */
		function addAdministrativePage() {
			add_options_page( __( 'Headup Widget' ), __( 'Headup Widget' ), 'manage_options', 'headup-widget', array( $this, 'displaySettingsPage' ) );
		}

		/**
		 * Attempts to intercept a POST request that is saving the settings for the WordPress plugin.
		 * 
		 */
		function savePluginSettings() {
			$settings = $this->getSettings( );
			if( is_admin() && isset( $_POST[ 'save-headup-for-wordpress-settings' ] ) && check_admin_referer( 'save-headup-for-wordpress-settings' ) ) {
				$settings[ 'headup_user_id' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'headup_user_id' ] ) ) ) );

				$this->saveSettings( $settings );
				wp_redirect( 'options-general.php?page=headup-widget&updated=true' );
				exit( );
			}
		}

		/// DISPLAY
		function inlineScript() {
			//echo("\n<!-- Headup Widget -->\n");
			$settings = $this->getSettings();
			$uid = $settings[ 'headup_user_id' ];
			$customerid = !empty($uid) ? '?customerid='.$uid : '';
echo("\n");
echo <<<EOT
<script type='text/javascript'>
	// In case wordpress template is broken and doesn't support 'wp_footer' hook.
	window.onload = function() {
		var scripts = document.getElementsByTagName('script'), script;
		for(var i in scripts){
			if( scripts.hasOwnProperty(i) )
				if( scripts[i].src && scripts[i].src.indexOf('annotate.js') != -1 )
					return false;
		}
		var js = document.createElement("script");
		js.setAttribute("type", "text/javascript");
		js.src = 'http://mint1.headup.com/clientscripts/annotate.js$customerid';
		document.body.appendChild(js);
	};
</script>
EOT;
			echo("\n");
		}

		/**
		 * Includes the necessary inline JavaScript that will render all the appropriate divs.
		 *
		 */
		function displayRenderingPage() {
			echo("\n<!-- Headup Widget -->\n");
			include "views/rendering-script.php";
			echo("\n");
		}

		/**
		 * Outputs the correct HTML for the settings page.
		 *
		 */
		function displaySettingsPage() {
			include ( 'views/settings.php' );
		}

		/// SETTINGS

		/**
		 * Removes the settings for the Headup plugin from the database.
		 *
		 */
		function deleteSettings() {
			delete_option( 'Headup Widget Settings' );
		}

		/**
		 * Returns the settings for the Headup plugin.
		 *
		 * @return array An associative array of settings for the Headup plugin.
		 */
		function getSettings() {
			if( $this->settings === null ) {
				$this->settings = get_option('Headup Widget Settings', $this->defaults);
				/*
				if( !isset( $this->settings[ 'headup_user_id' ] ) || empty( $this->settings[ 'headup_user_id' ] ) ){
					$this->settings[ 'headup_user_id' ] = __( 'reading %TITLE% at %URL%' );
				}
				*/
			}
			return $this->settings;
		}

		/**
		 * Saves the settings for the Headup plugin.
		 *
		 * @param array $settings An array of settings for the Headup plugin.
		 */
		function saveSettings( $settings ) {
			$this->settings = $settings;
			update_option( 'Headup Widget Settings', $this->settings );
		}
	}
}

if( class_exists( 'HeadupForWordPress' ) ) {
	$gwfw = new HeadupForWordPress( );
}