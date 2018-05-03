<?php
/**
 * The admin-specific functionality of the plugin. Create the side menu
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 */

global $gift_recorder_options_page;
$gift_recorder_options_page = 'gift-recorder-admin-display';
add_menu_page(
  'Options',
  'Gift Recorder',
  'manage_options',
  'gift-recorder-admin-display',
  array( $this,'gift_recorder_display_admin_page' ),
  plugins_url('/admin/img/gift-recorder-logo.svg', GIFT_RECORDER_PATH ),
  100
);
add_submenu_page(
  'gift-recorder-admin-display',
  'Settings',
  'Settings',
  'manage_options',
  'gift-recorder-admin-display',
  array( $this, 'gift_recorder_display_admin_page' ),
  100
);
add_submenu_page( 
  'gift-recorder-admin-display', 
  'Questions', 
  'Questions', 
  'manage_options', 
  'gift-recorder-admin-questions', 
  array( $this, 'gift_recorder_display_admin_questions'),
  '101'
);
add_submenu_page( 
  'gift-recorder-admin-display', 
  'User Manger', 
  'User Manger', 
  'manage_options', 
  'gift-recorder-admin-user-manager', 
  array( $this, 'gift_recorder_display_admin_user_manger'),
  '102'
);
add_submenu_page( 
  'gift-recorder-admin-display', 
  'Reports', 
  'Reports', 
  'manage_options', 
  'gift-recorder-admin-reports', 
  array( $this, 'gift_recorder_display_admin_reports'),
  '103'
);
add_submenu_page( 
  'gift-recorder-admin-display', 
  'Integrations', 
  'Integrations', 
  'manage_options', 
  'gift-recorder-admin-integration', 
  array( $this, 'gift_recorder_display_admin_integrations'),
  '104'
);