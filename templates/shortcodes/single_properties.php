<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function single_properties_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'property' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '1',
        'order'                  => 'DESC',
        //get de post id of the current post
        'post__in'               => array(get_the_ID()),
        // 'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {

        $output = '';

        while ( $query->have_posts() ) {
            $query->the_post();

            $address = get_field('address');
            $price = get_field('price');
            $bedrooms = get_field('bedrooms');
            $bathrooms = get_field('bathrooms');
            $sq_ft = get_field('sq_ft');
            $carpark = get_field('carpark');
            $description = get_field('description');
            $cat_property = get_field('category_property');

            $current_post_taxonomies = get_the_terms( get_the_ID(), 'category_property' );

            $output .= '<div class="property-details">
                            <div class="property-details__image">
                                <span class="property-details__status">'.$current_post_taxonomies[0]->name.'</span>
                                <img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">
                            </div>
                            <div class="property-details__content">
                                <div class="property-details__price">
                                    <span class="price">' . $price . '</span> 
                                </div>
                                <h3 class="property-details__title">' . get_the_title() . '</h3>
                                <div class="property-details__description">
                                    <span class="description">' . $description . '</span>
                                </div>
                                <div class="property-details__card">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$bedrooms.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Beedrooms</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$bathrooms.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Bathrooms</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$carpark.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Car Park</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$sq_ft.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Square Ft</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-details__contact">
                                    <a href="/contact-us" class="btn btn--primary">Request a visit now</a>
                                </div>
                            </div>
                        </div>';
        
        }

        $output .= '';

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'single_properties', 'single_properties_shortcode' );

?>