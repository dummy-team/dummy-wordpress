<?php
/**
 * The template for displaying Events pages filtered by event-category taxonomy.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */


global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}
$context = Timber::get_context();
$args = array(
    'event-category' => get_query_var($wp_query->query_vars['taxonomy']),
    'post_type' => 'event',
    'paged' => $paged,
    'meta_query' => array(
        array(
            'key' => 'event_startdate',
            'compare' => '>=',
            'value' => time(),
        )
    ),
    'meta_key' => 'event_startdate',
    'orderby' => 'meta_value',
);

/* THIS LINE IS CRUCIAL */
/* in order for WordPress to know what to paginate */
/* your args have to be the default query */
    query_posts($args);
/* make sure you've got query_posts in your .php file */

$context['title'] = __('Agenda', 'skin-dummy');
$context['currentTaxonomy'] = get_query_var($wp_query->query_vars['taxonomy']);
$context['eventCategory'] = get_terms( 'event-category' );
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();
Timber::render('archive-' . get_post_type() . '.twig', $context, TWIG_CACHE_ENABLE);

?>
