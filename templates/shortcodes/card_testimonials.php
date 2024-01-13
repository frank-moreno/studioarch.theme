<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function card_testimonials_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'testimonial' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '-1',
        'order'                  => 'ASC',
        // 'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {

        

        $output = '<div class="swiper-container swiper-testimonials section__testimonial">
                        <div class="swiper-wrapper">';

        while ( $query->have_posts() ) {
            $query->the_post();

            $name = get_field('name');
            $description = get_field('short_description');

            $output .= '<div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class=" testimonial-item__content">
                                    <p class=" testimonial-item__title">' . get_the_content() . '</p>
                                    <div class=" testimonial-item__image">
                                        <img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">
                                    </div>
                                    <div class=" testimonial-item__name">
                                        <span class="name">' . $name . '</span> 
                                    </div>
                                    <div class=" testimonial-item__description">
                                        <span class="description">' . $description . '</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
        
        }

        $output .= '</div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        </div>';

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'card_testimonials', 'card_testimonials_shortcode' );

?>