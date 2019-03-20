<?php

function get_blog_posts( $request ) {

  ob_start();

  $paged = $request['page'];

  include locate_template('/parts/acf/modules/blog/blog-posts-query.php');


  header('Content-Type: text/html');
  echo ob_get_clean();
  exit();
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'unior-station/v1', '/posts/(?P<page>\d+)', array(
    'methods' => 'GET',
    'callback' => 'get_blog_posts',
    'args' => array(
      'page' => array(
        'validate_callback' => function($param, $request, $key) {
          return is_numeric( $param );
        }
      ),
    ),
  ) );
} );

?>