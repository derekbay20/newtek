<?php
/**
 * slain setup hooks
 */
require_once slain_file_directory('inc/hooks/setup.php');


/**
 * slain setup hooks
 */
require_once slain_file_directory('inc/hooks/jetpack.php');

/**
 * Ajax Related code goes here
 */
require_once slain_file_directory('inc/hooks/ajax.php');

/**
 * Dynamic scripts from customizer and settings
 */
require_once slain_file_directory('inc/hooks/scripts.php');

/**
 * Dynamic styles from customizer and settings
 */
require_once slain_file_directory('inc/hooks/styles.php');

/**
 * slain setup hooks
 */
require_once slain_file_directory('inc/hooks/template.php');


if(is_admin()):
	/**
	 * TGMPA Installation Plugin
	 */
	require_once slain_file_directory('inc/hooks/tgmpa.php');
	
endif;

/**
 * plugins related hooks
 */
require_once slain_file_directory('inc/hooks/plugins/init.php');