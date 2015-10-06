<?php<?php
require_once('Classes/DummyTaxonomy.php');
$config =  array(
    'label' => __( 'Catégories événement', 'skin' ),
    'public' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'show_ui' => true
);
new DummyTaxonomy('event-category', 'event', $config);
