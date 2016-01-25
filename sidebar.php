<?php
if( ! defined( 'ABSPATH' ) ) exit;
/**
 * The Template for displaying all single posts
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

Timber::render( array( 'Templates/sidebar.twig' ), $data, TWIG_CACHE_ENABLE );
