<?php
require_once('Classes/DummyRegisterScripts.php');
require_once('Classes/DummyRegisterStyles.php');

new DummyRegisterStyles(
	'skin_main_css',
	get_stylesheet_directory_uri().'/web/css/main.css'
);

new DummyRegisterScripts(
	'skin_main_js',
	get_stylesheet_directory_uri().'/web/js/main.js',
	array('jquery')
);
