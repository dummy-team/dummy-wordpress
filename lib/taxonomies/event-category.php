<?php
add_action( 'init', 'register_taxonomy_event_category' );

function register_taxonomy_event_category() {
    register_taxonomy(
        'event-category',
        'event',
        array(
            'label' => __( 'Catégories événement', 'skin-dummy' ),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
            'show_ui' => true
        )
    );
}
