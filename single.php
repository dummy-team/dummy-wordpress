<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'Templates/single-password.twig', $context );
} else {
	Timber::render( array( 'Templates/single-' . $post->ID . '.twig', 'Templates/single-' . $post->post_type . '.twig', 'Templates/single.twig' ), $context, TWIG_CACHE_ENABLE );
}
