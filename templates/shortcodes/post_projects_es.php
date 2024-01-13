<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function post_projects_es_shortcode() {

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

    //get the id of current post
    $current_post_id = get_the_ID();

    // loop through the posts to get the current post index

    $current_post_index = 0;

    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            if (get_the_terms( get_the_ID(), 'language' )[0]-> slug == 'es') {

                if ( $current_post_id == get_the_ID() ) {
                    // get the current post fields and store them in variables
                    $current_post_title = get_the_title();
                    $current_post_content = get_the_content();
                    $current_post_image = get_the_post_thumbnail_url();
                    $current_post_permalink = get_the_permalink();
                    $current_post_excerpt = get_the_excerpt();
                    $current_post_taxonomies = get_the_terms( get_the_ID(), 'language' );
                    $current_post_index = $current_post_index;

                    // get gallery images of project_images field
                    $gallery_images = get_field('project_images');

                    $project_description = get_field('project_description');

                    // get the number of gallery images
                    $gallery_images_count = count($gallery_images);

                    // give output to the user of the single post in a fixed layout
                    $output = '<div class="project-item">
                                    <div class="project-item__image">
                                        <img src="' . $current_post_image . '" alt="' . $current_post_title . '">
                                    </div>
                                    <div class="project-item__content">
                                        <h1 class="project-item__title">' . $current_post_title . '</h1>
                                        <div class="project-item__description">
                                            <p>' . $project_description . '</p>
                                        </div>
                                    </div>
                                </div>';

                    // if there are gallery images, then show them in a slider
                    if ( $gallery_images_count > 0 ) {

                        $output .= '<div class="swiper-container swiper-project-images">
                                        <div class="swiper-wrapper">';

                        foreach ( $gallery_images as $gallery_image ) {

                            $output .= '<div class="swiper-slide">
                                            <div class="project-item__image">
                                                <a href="' . $current_post_permalink . '">
                                                    <img src="' . $gallery_image['url'] . '" alt="' . $gallery_image['alt'] . '">
                                                </a>
                                            </div>
                                        </div>';

                        }

                        $output .= '  </div>
                                    </div>';

                    }

                    // if there are more than one posts, then show the next and previous posts
                    if ( $query->post_count > 1 ) {

                        $output .= '<div class="project-item__navigation">
                                        <div class="project-item__navigation__previous">';

                        if ( $current_post_index > 0 ) {

                            $previous_post = get_previous_post();

                            $output .= '<a href="' . get_the_permalink( $previous_post->ID ) . '">
                                            <span class="project-item__navigation__previous__title">' . get_the_title( $previous_post->ID ) . '</span>
                                            <span class="project-item__navigation__previous__label">Previous Project</span>
                                        </a>';

                        }

                        $output .= '</div>
                                    <div class="project-item__navigation__next">';

                        if ( $current_post_index < $query->post_count - 1 ) {

                            $next_post = get_next_post();

                            $output .= '<a href="' . get_the_permalink( $next_post->ID ) . '">
                                            <span class="project-item__navigation__next__title">' . get_the_title( $next_post->ID ) . '</span>
                                            <span class="project-item__navigation__next__label">Next Project</span>
                                        </a>';

                        }

                        $output .= '</div>
                                    </div>';

                    }

                }

            }

            $current_post_index++;

        }

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'post_projects_es', 'post_projects_es_shortcode' );

?>