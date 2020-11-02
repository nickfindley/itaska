<?php
/**
 * The template for displaying all places
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header(); ?>
<main class="main-single-place" id="content">
    <header class="main-header">
		<div class="main-header-container container">
			<h1>The Dutchtown Places Directory</h1>
		</div>
    </header>
    <div class="places-container container">
        <section class="places-content">
            <p>Welcome to the Dutchtown Places Directory. Find businesses, services, and landmarks here in Dutchtown, Gravois Park, Marine Villa, Mount Pleasant, and Cherokee Street.</p>
            <p>The information in the Dutchtown Places Directory is accurate as of the time of publication. If you find an inaccuracy, please <a href="/contact/">contact us</a>. To add a place please <a href="/places/submit/">complete our submission form</a>.</p>
        </section>
        <section class="places-list">
            <ul class="places-categories">
            <?php
                //  https://wordpress.stackexchange.com/questions/66219/list-all-posts-in-custom-post-type-by-taxonomy
                $custom_terms = get_terms('place_category');

                foreach( $custom_terms as $custom_term ) :
                    wp_reset_query();
                    $args = array(
                        'post_type' => 'places',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'place_category',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            ),
                        ),
                        'orderby' => 'post_title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                    );
                    $loop = new WP_Query($args);
                    if ( $loop->have_posts() ) :
                        echo '<li><a href="#'  . $custom_term->slug . '">' . $custom_term->name . '</a></li>';
                        echo "\n";
                    endif;
                endforeach;
            ?>
            </ul>

            <section class="places-complete-list">
            <?php
                foreach( $custom_terms as $custom_term ) :
                    wp_reset_query();
                    $args = array(
                        'post_type' => 'places',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'place_category',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            ),
                        ),
                        'orderby' => 'post_title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                    );

                    add_filter('posts_fields', 'wpcf_create_temp_column'); // Add the temporary column filter
                    add_filter('posts_orderby', 'wpcf_sort_by_temp_column'); // Add the custom order filter

                    $loop = new WP_Query($args);

                    remove_filter('posts_fields','wpcf_create_temp_column'); // Remove the temporary column filter
                    remove_filter('posts_orderby', 'wpcf_sort_by_temp_column'); // Remove the temporary order filter 

                    if ( $loop->have_posts() ) :
                        echo "\n";
                        echo '<h3 class="place-category" id="'  . $custom_term->slug . '"><a href="/places/category/' . $custom_term->slug . '/">' . $custom_term->name . '</a></h3>';
                        echo "\n";
                        echo '<ul>';
                        while($loop->have_posts()) : $loop->the_post();
                            if ( get_field( 'closed' ) == false && get_field( 'hide_from_listings' ) == false  ) :
                                echo "\n\t";
                                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a>';
                                $date = strtotime( get_field( 'new_in_town' ) );
                                $today = strtotime( date( 'Y-m-d' ) );
                                if ( $date != null && $date > $today ) : 
                                    echo ' <span class="new-in-town">New!</span>';
                                endif;
                                echo '</li>';
                            endif;
                        endwhile;
                        echo "\n";
                        echo '</ul>';
                    endif;
                endforeach;
            ?>
            </section>
        </section>
    </div>
    <div class="main-footer-container container">
        <footer class="main-footer">
            <?php if ( function_exists('yoast_breadcrumb') ) : ?><p class="post-breadcrumbs"><?php yoast_breadcrumb(); ?></p><?php elseif ( function_exists( 'bcn_display' ) ) : ?><p class="post-breadcrumbs"><?php bcn_display(); ?></p><?php endif;?>
        </footer>
    </div>
</main>
<?php get_footer(); ?>