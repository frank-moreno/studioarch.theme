<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function agents_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'agent' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '3',
        'order'                  => 'ASC',
        // 'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    $output = '<div class="section__agent-item container">
                    <div class="row">';

    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

                    $role = get_field('role');
                    $facebook = get_field('social_link_facebook');
                    $twitter = get_field('social_link_twitter');
                    $pinterest = get_field('social_link_pinterest');

                    // give output to the user of the single post in a fixed layout
                    $output .= '
                                <div class="section__agent-item__image col-lg-4 col-sm-12">
                                    <img src="' .get_the_post_thumbnail_url(). '" alt="' . get_the_title() . '">

                                    <div class="section__agent-item__content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="section__agent-item__social">
                                                        <a href="' . $facebook . '"><i class="fab fa-facebook-f"></i></a>
                                                        <a href="' . $twitter . '"><i class="fab fa-twitter"></i></a>
                                                        <a href="' . $pinterest . '"><i class="fab fa-pinterest-p"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-10 section__agent-item__details"">
                                                    <h2 class="section__agent-item__title">' . get_the_title() . '</h2>
                                                    <div class="section__agent-item__role">
                                                        <p>' . $role . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                ';

        }

        $output .= '</div>
                    </div>';

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'agents', 'agents_shortcode' );

?>