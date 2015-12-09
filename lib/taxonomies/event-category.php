<?php
register_taxonomy('event-category', 'event', array(
    'label' => __( 'Catégories événement', 'skin' ),
    'public' => true,
    'rewrite' => true,
    'hierarchical' => true,
    'show_ui' => true
));
