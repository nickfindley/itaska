<?php
/**
 * Template part for displaying posts on archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */
?>

<article>
    <div class="item-container container">
        <?php if ( has_post_thumbnail() ) : ?>
        <header class="item-header item-has-featured-image">
            <div class="item-header-image">
                <?php the_post_thumbnail(); ?>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php else : ?>
        <header class="item-header">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endif; ?>
            <section class="item-meta">
                <ul>
                    <li>
                    <?php if ( get_post_type( get_the_ID() ) == 'places' ) : ?>
                        <i class="fas fa-map-marker-alt"></i><a href="<?php the_permalink(); ?>">Dutchtown Places</a>
                    <?php else : ?>
                        <?php
                        if ( function_exists( 'tribe_is_event' ) ) : 
                            if ( tribe_is_event() ) :  ?>
                            <i class="far fa-fw fa-calendar-alt"></i>
                            <?php else : ?>
                            <i class="fas fa-fw fa-file"></i>
                            <?php endif;
                        endif;
                        dutchtown_posted_on();
                    endif; ?></li>
                    <?php dutchtown_header_social_links(); ?>
                </ul>
                <?php if ( comments_open() || get_comments_number() > 0 ) : ?>
                <ul class="item-comment-links">
                <?php
                dutchtown_comment_link( array(
                    'before_list'	=> '<li><i class="fas fa-fw fa-comments"></i>',
                    'after_list'	=> '</li> ',
                    'before_form'	=> '<li><i class="fas fa-fw fa-comment-alt"></i>',
                    'after_form'	=> '</li>',
                    'count_args'	=> array(
                        'cap'		=> true,
                        'there'		=> false
                        )
                    )
                );
                ?>
                </ul>
                <?php endif; ?>
            </section>
        </header>
        <section class="item-content">
            <?php if ( function_exists( 'ThreeWP_Broadcast' ) ) : if ( broadcasted_from() ) : echo broadcasted_from(); endif; endif; ?>
            <?php the_excerpt(); ?>
        </section>
    </div>
</article>