<?php
require_once('Classes/DummyRegisterScripts.php');
new DummyRegisterScripts(
	'skin_menu',
	get_stylesheet_directory_uri() . '/web/js/vendors/Menu.min.js',
	array('jquery')
);
new DummyRegisterScripts(
	'skin_menu_mob',
	get_stylesheet_directory_uri() . '/web/js/vendors/menu.Mobile.js',
	array('jquery')
);
