<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header();
?>
<main class="main-index" id="content">
    <?php
    if ( get_current_blog_id() == 1 ) :
        if ( have_posts() ) :
            $count = 0;
            while ( have_posts() ) :
                the_post();
                $count++;
                if ( $count > 1 || is_paged() ) :
                    get_template_part( 'content/post' );
                else :
                    get_template_part( 'content/post' );
                endif;
                // $blog_id = get_current_blog_id();
                // if ( $count == 1 && ! is_paged() && $blog_id == 1 ) :
                //     get_template_part( 'content/instagram' );
                // endif;
            endwhile;
            echo bootstrap_pagination();
        else : 
            get_template_part( 'template-parts/content', 'none' );
        endif;
    else :
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'content/post' );
            endwhile;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
    endif;
	?>
</main>
<?php get_footer(); ?>