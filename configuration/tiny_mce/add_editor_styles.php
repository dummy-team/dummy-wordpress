<?php
add_action( 'admin_init', 'add_editor_styles' );

function add_editor_styles() {
    add_editor_style( './configuration/tiny_mce/custom-editor-style.css' );
}
