<?php
add_filter( 'add_buttons', 'add_buttons' );

function add_buttons ( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
