<?php
require_once('Classes/DummyRegisterScripts.php');
new DummyRegisterScripts(
	'skin_multiselect_bootstrap', 
	get_template_directory_uri() . '/web/js/vendors/bootstrap-multiselect.js', 
	array('jquery'), '0.0.0', 
	true
);
new DummyRegisterScripts(
	'skin_bootstrap', 
	get_template_directory_uri() . '/web/js/vendors/bootstrap.min.js', 
	array('jquery'), 
	'0.0.0', 
	true
);
