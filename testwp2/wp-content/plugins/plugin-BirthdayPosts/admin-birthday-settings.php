<?php

public function addAdminMenuItems() {
 //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
add_menu_page(
  $this->plugin_name,
  'Your plugin name',
  'administrator',
  $this->plugin_name,
  array(
   $this,
   'displayAdminDashboard',
  ),
  'dashicons-email',
  20
 );
//add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
add_submenu_page(
  $this->plugin_name,
  'Your plugin Settings',
  'Settings',
  'administrator',
  $this->plugin_name.'-settings',
  array(
   $this,
   'displayAdminSettings',
  )
 );
}
public function displayAdminSettings() {
 require_once 'partials/' . $this->plugin_name . '-admin-settings-display.php';
}
?>