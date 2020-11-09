<?php
/**
 * The template file for displaying tag archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header(); ?>
<main class="main-archive" id="content">
    <header class="main-header">
        <div class="main-header-container container">
            <?php
            $id = 'category_' . get_queried_object_id();
            $image = get_field( 'category_image', $id );
            $size = 'full';
            if ( $image ) :
            ?>
            <div class="main-header-image">
                <?php echo wp_get_attachment_image( $image, $size ); ?>
            </div>
            <?php endif; ?>
            <h1><?php the_archive_title(); ?></h1>
            <?php if ( tag_description() ) :?>
            <section class="main-header-content">
                <?php echo tag_description(); ?>
            </section>
            <?php endif; ?>
        </div>
    </header>
    <div class="archive-container container">
        <div class="archive-tag">
            <section class="archive-past-posts">
                <?php
                $paged  = get_query_var('paged') ? get_query_var('paged') : 1;
                $tag = get_queried_object();
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => 10,
                    'tag' => $tag->slug
                );

                $posts_query = new WP_Query( $args );
                
                if ( $posts_query->have_posts() ) :
                    while ( $posts_query->have_posts() ) :
                        $posts_query->the_post();
                        get_template_part( 'content/archive' );
                    endwhile;
                    echo bootstrap_pagination( $posts_query );
                    wp_reset_postdata();	
                endif;
                ?>
            </section>

            
            <section class="archive-upcoming-events container">
            <?php 
                if ( function_exists( 'tribe_is_event' ) ) :
            ?>
                <header class="archive-upcoming-events-header">
                    <h2>Upcoming Events</h2>
                </header>
                <?php
                    $args = array(
                        'post_type' => array(Tribe__Events__Main::POSTTYPE),
                        'posts_per_page' => -1,
                        'tag' => $tag->slug,
                        'meta_key' => '_EventStartDate',
                        'tribeHideRecurrence' => true,
                        'meta_query' => array(
                            array (
                                'key' => '_EventStartDate',
                                'value' => date( 'Y-m-d G:i:s'),
                                'compare' => '>=',
                                'type' => 'DATE'
                            )
                        ),
                    );

                    $upcoming_events_query = new WP_Query( $args );
                    
                    if ( $upcoming_events_query->have_posts() ) :
                        while ( $upcoming_events_query->have_posts() ) :
                            $upcoming_events_query->the_post();
                            get_template_part( 'content/archive-upcoming-event' );
                        wp_reset_postdata();
                        endwhile;
                    else :
                        ?><p>We didn't find any upcoming events tagged &ldquo;<?php single_tag_title(); ?>.&rdquo; Visit our <a href="/calendar/">Dutchtown Calendar</a> to find more events.</p><?php
                    endif;
                else : 
                    echo get_search_form();
                endif;
            ?>
            </section>
        </div>
    </div>
    <div class="main-footer-container container">
        <footer class="main-footer">
            <?php if ( function_exists('yoast_breadcrumb') ) : ?><p class="post-breadcrumbs"><?php yoast_breadcrumb(); ?></p><?php elseif ( function_exists( 'bcn_display' ) ) : ?><p class="post-breadcrumbs"><?php bcn_display(); ?></p><?php endif;?>
        </footer>
    </div>
</main>
<?php get_footer(); ?>