<?php
add_action( 'init', 'register_post_type_event');

function register_post_type_event() {
    register_post_type( 'event',
        array(
            'capability_type' => 'post',
            'label'  => __( 'Événements', 'skin' ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'rewrite' => array( 'slug' => 'agenda' ),
            'public' => true,
            'has_archive' => true,
            'with_front' => true
        )
    );
}
