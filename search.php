<?php
/**
 * The template file for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header(); ?>
<main class="main-search" id="content">
    <header class="main-header">
		<div class="main-header-container container">
			<h1><span><?php echo $wp_query->found_posts; ?> <?php _e( 'Search results for', 'dutchtown' ); ?> </span><?php the_search_query(); ?>
</h1></h1>
		</div>
    </header>
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
	<div class="main-footer-container container">
        <footer class="main-footer">
            <?php if ( function_exists('yoast_breadcrumb') ) : ?><p class="post-breadcrumbs"><?php yoast_breadcrumb(); ?></p><?php elseif ( function_exists( 'bcn_display' ) ) : ?><p class="post-breadcrumbs"><?php bcn_display(); ?></p><?php endif;?>
        </footer>
    </div>
</main>
<?php get_footer(); ?>