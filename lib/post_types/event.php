<?php
require_once('Classes/DummyPostType.php');
$config = array(
    'capability_type' => 'post',
    'label'  => __( 'Événements', 'skin' ),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'rewrite' => array( 'slug' => 'agenda' ),
    'public' => true,
    'has_archive' => true,
    'with_front' => true
);
new DummyPostType('event', $config);
