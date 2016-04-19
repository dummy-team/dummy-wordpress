<?php
/*
 * Example for events with start & enddate
 *
*/
function get_dated_post_query($paged, $since, $limit=4) {
 $meta_query = array(
   'relation' => 'OR',
   array(
     'key' => 'event_start',
     'value' => strftime('%Y%m%d', $since),
     'type' => 'NUMERIC',
     'compare' => '>=',
   ),
   array(
     array(
       'key' => 'event_end',
       'value' => strftime('%Y%m%d', $since),
       'type' => 'NUMERIC',
       'compare' => '>=',
     )
  ),
 );

 $post_query = array(
   'post_type' => 'events',
   'posts_per_page' => $limit,
   'paged' => $paged,
   'meta_key' => 'date_start',
   'orderby' => 'meta_value_num',
   'order' => 'ASC',
   'meta_query' => $meta_query,
 );

 return $post_query;
}
