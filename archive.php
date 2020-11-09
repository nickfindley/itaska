<?php
/**
 * The template for displaying archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header();
?>
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
            <?php if ( category_description() ) :?>
            <section class="main-header-content">
                <?php echo category_description(); ?>
            </section>
            <?php endif; ?>
        </div>
    </header>
    <div class="archive-container container">
        <div class="archive-category">
            <section class="archive-past-posts">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'content/archive' );
                    endwhile;
                    echo bootstrap_pagination();
                else : 
                    get_template_part( 'template-parts/content', 'none' );
                endif;		
                ?>
            </section>
            <section class="archive-category-list">
                <header class="archive-category-list-header">
                    <h2>All Posts</h2>
                </header>
                <ul class="list-unstyled"><?php 
                    $args = array(
                        'type' => 'monthly'
                    );
                    wp_get_archives( $args);
                ?></ul>
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