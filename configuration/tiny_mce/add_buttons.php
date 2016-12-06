<?php
add_filter( 'mce_buttons_2', function($buttons) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
});
