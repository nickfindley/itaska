<?php
/**
 * Template Name: Members Template
 * The template for a page listing members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header(); ?>
<main class="main-members" id="content">
    <article>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'content/page-members' );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;		
    ?>
    </article>
</main>
<?php get_footer(); ?>