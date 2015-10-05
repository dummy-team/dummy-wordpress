<?php
/*
 * Returns 2 posts from category 15 (Afficher sur acceuil)
 * Called by [in_news_home] shortcode
 */
function in_news_int ( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'title' => '',
      'subtitle' => '',
      'link' => '/'
    ), $atts));

    $limit_show_news = 100;
    $args = array(
        'posts_per_page'   => $limit_show_news,
        'post_type'        => 'post',
        'meta_key'          => 'is_video',
        'orderby'           => 'is_video',
        'order'             => 'DESC',
    );
    if ( isset($atts['filter_car_emergence']) && $atts['filter_car_emergence'] == 1) {
        $args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => 5,
            ),
        );
    }

    $query = new WP_Query( $args );

    $post_list = '';
    while( $query->have_posts() ) {
        $query->the_post();
        $atts['thumbnail'] = get_the_post_thumbnail(get_the_ID(), 'post-home-thumbnail');
        $atts['categories'] = get_the_category();
        $atts['class_categories_id'] = '';
        $atts['class_categories_slug'] = '';
        foreach ($atts['categories'] as $key => $category) {
            if ($category->parent == 4) {
                $atts['class_categories_id'] .= ' category-id-'.$category->term_id;
                $atts['class_categories_slug'] .= ' category-slug-'.$category->slug;
                unset($atts['categories'][$key]);
            }
        }
        $atts['title'] = get_the_title();
        $atts['content'] = get_the_content();
        $atts['permalink'] = get_permalink();
        $post_list .= Timber::compile('post.twig', $atts);
    }
    $data['post_content'] = $post_list;

    $out = Timber::compile('template.twig', $data);
    return $out;
}

add_shortcode('in_news_int', 'in_news_int');


?>
