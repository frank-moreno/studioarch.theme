<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function latest_properties_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'property' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '4',
        'order'                  => 'ASC',
        // 'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    //get the id of current post
    // $current_post_id = get_the_ID();

    // loop through the posts to get the current post index

    // $current_post_index = 0;

    $output = '';

    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

                    $price = get_field('price');

                    // give output to the user of the single post in a fixed layout
                    $output .= '<div class="section__property-item container">
                                   <div class="row">
                                         <div class="section__property-item__image col-lg-5 col-sm-12">
                                            <img src="' .get_the_post_thumbnail_url(). '" alt="' . get_the_title() . '">
                                        </div>
                                        <div class="section__property-item__content col-lg-7 col-sm-12">
                                            <a href="'. get_the_permalink() .'"><h1 class="section__property-item__title">' . get_the_title() . '</h1></a>
                                            <div class="section__property-item__price">
                                                <p>' . $price . '</p>
                                            </div>
                                        </div>
                                   </div>
                                </div>';

                // }

            // }

            // $current_post_index++;

        }

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'latest_properties', 'latest_properties_shortcode' );

?>