<?php
add_filter('wp_mail_from', function( $email ){
  return 'noreply@example.com';
});

add_filter('wp_mail_from_name', function( $original_email_from ){
  return 'Skin';
});
