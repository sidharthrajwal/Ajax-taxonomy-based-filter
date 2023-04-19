
add_action( 'wp_ajax_my_custom_taxonomy_filter', 'my_custom_taxonomy_filter' );
add_action( 'wp_ajax_nopriv_my_custom_taxonomy_filter', 'my_custom_taxonomy_filter' );

function my_custom_taxonomy_filter() {
  $taxonomy = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : '';
  $term = isset( $_POST['category'] ) ? $_POST['category'] : '';
  // print_r($term);
  
  $args = array(
    'post_type' => 'tutorial',
    'tax_query' => array(
      array(
        'taxonomy' => '$taxonomy',
        'field' => 'slug',
        'terms' => $term,
      ),
    ),
  );
  
  $query = new wp_query( $args );
  
  
            if ( $query->have_posts() ) {

               while ( $query->have_posts() ) {

                    $query->the_post();

                 the_title();
               }
            }
  
  wp_die();
}
