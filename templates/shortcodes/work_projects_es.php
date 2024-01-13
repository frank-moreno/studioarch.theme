<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function work_projects_es_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'project' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '-1',
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {

        $output = '<div class="swiper-container swiper-projects">
                        <div class="swiper-wrapper">';

        while ( $query->have_posts() ) {
            $query->the_post();

            if (get_the_terms( get_the_ID(), 'language' )[0]-> slug == 'es') {

                $output .= '<div class="swiper-slide">
                            <div class="project-item u-faux-box-link">
                                <div class="project-item__image">
                                    <img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">
                                </div>
                                <div class="project-item__content">
                                    <h3 class="project-item__title">' . get_the_title() . '</h3>
                                    <div class="project-item__description">
                                        <p>' . get_the_excerpt() . '</p>  
                                    </div>
                                    <div class="project-item__span">
                                        <span>View Project</span>
                                    </div>
                                    <div class="project-item__link u-faux-box-link__overlay">
                                        <a class="u-faux-box-link__overlay" href="' . get_the_permalink() . '">View Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>';

            }
        
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

add_shortcode( 'work_projects_es', 'work_projects_es_shortcode' );

?>