<?php
require_once('Classes/DummyRegisterScripts.php');
new DummyRegisterScripts(
	'skin_main_js',
	get_stylesheet_directory_uri().'/web/js/main.js',
	array('jquery'), 
	'0.0.0', 
	true
);
