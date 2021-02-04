<?php
/**
 * Template Name: Admin
 * The template to manage posts from the frontend
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header();
?>
<main class="main-single" id="content">
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="main-header main-has-featured-image">
        <div class="main-header-image-container container">
            <div class="main-header-image">
                <?php the_post_thumbnail( 'xl', ['class' => 'no-lazyload'] ); ?>
            </div>
        </div>
        <div class="main-header-container container">
            <h1><a href="<?php the_permalink(); ?>"><?php bloginfo( 'name' ); ?> Admin</a></h1>
    <?php else : ?>
    <header class="main-header">
        <div class="main-header-container container">
            <h1><a href="<?php the_permalink(); ?>"><?php bloginfo( 'name' ); ?> Admin</a></h1>
    <?php endif; ?>
        </div>
    </header>
    <section class="main-content">
        <div class="main-content-container container">
        <?php
        if ( is_user_logged_in() ) :
            $user = wp_get_current_user();
        ?>
            <p class="alert-message">Welcome, <?php echo $user->user_firstname; ?>.</p>
        <?php
            $args = array(
                'public'   => true
            );            
            $output = 'objects';
            $operator = 'and';
            
            $post_types = get_post_types( array( 'public' => true ), 'objects', 'and' );
            unset( $post_types['attachment'] );

            if ( $post_types ) :
        ?>
                <h2>Create New Post</h2>
                <ul>
        <?php
                foreach ( $post_types as $p ) :
        ?>
                    <li><a href="<?php echo get_site_url(); ?>/admin/create?posttype=<?php echo $p->name; ?>">Create a new <?php echo $p->labels->singular_name; ?></a></li>
        <?php
                endforeach;
        ?>
                </ul>

                <h2>Edit Posts</h2>
                <ul class="details-list">
        <?php
                foreach ( $post_types as $p ) :
        ?>
                    <li>
                        <details>
                            <summary>
                                Edit <?php echo $p->labels->name; ?>
                            </summary>
        <?php
                    $today = date( 'Y-m-d' );
                    if ( $p->name == 'block_events' ) :
                        $args = array(
                            'post_type' => 'block_events',
                            'orderby' => array(
                                'block_event_date_time' => 'DESC'
                            ),
                            'posts_per_page' => -1,
                        );
                        $block_event_query = new WP_Query( $args );

                        global $wp;
                        $edit_link = home_url( add_query_arg( array(), $wp->request ) );

                        if ( $block_event_query->have_posts() ) :
                        ?>
                            <ul class="post-links">
                        <?php
                            while ( $block_event_query->have_posts() ) :
                                $block_event_query->the_post();
                                $print_date = date( 'F jS, Y', strtotime( get_field( 'block_event_date_time' ) ) );
                                if ( current_user_can( 'edit_post', get_the_ID() ) ) :
                        ?>
                                <li>
                                    <a href="<?php echo $edit_link; ?>?postid=<?php echo get_the_ID(); ?>">
                                        <?php the_title(); ?> <span class="small muted"><?php echo $print_date; ?></span>
                                    </a>
                                </li>
                        <?php
                                endif;
                            endwhile;
                        ?>
                            </ul>
                    <?php
                        endif;

                    else :
                    
                        if ( $p->name == 'page' ) :
                            $sort_by = 'title';
                            $sort_order = 'ASC';
                        else :
                            $sort_by = 'post_date';
                            $sort_order = 'DESC';
                        endif;

                        $args = array(
                            'post_type' => $p->name,
                            'orderby' => array(
                                $sort_by => $sort_order
                            ),
                            'posts_per_page' => -1,
                        );
                        $post_query = new WP_Query( $args );

                        $edit_link = home_url( add_query_arg( array(), $wp->request ) );

                        if ( $post_query->have_posts() ) :
                        ?>
                            <ul class="post-links">
                        <?php
                            $editable_posts = array();
                            while ( $post_query->have_posts() ) :
                                $post_query->the_post();
                                $print_date = get_the_date( 'F jS, Y' );
                                if ( current_user_can( 'edit_post', get_the_ID() ) ) :
                                    $editable_posts[] = $post;
                                endif;
                            endwhile;
                            
                            foreach ( $editable_posts as $ep ) :
                                $print_date = date( 'F jS, Y', strtotime( $ep->post_date ) );
                        ?>
                                <li>
                                    <a href="<?php echo $edit_link; ?>?postid=<?php echo $ep->ID; ?>">
                                        <?php echo $ep->post_title; ?> <span class="small muted"><?php echo $print_date; ?></span>
                                    </a>
                                </li>
                        <?php
                                    endforeach;
                            //     endif;
                            // endwhile;
                        ?>
                                <pre><?php print_r( $editable_posts ); ?></pre>
                            </ul> 
                    <?php
                        endif;
                    endif;
            ?>
                        </details>
                    </li>
        <?php
                endforeach;
        ?>
                </ul>
        <?php
            endif;

        else :
        ?>
            <p class="alert-message">You must <a href="<?php echo esc_url( wp_login_url( $_SERVER['REQUEST_URI'] ) ); ?>">log in</a> to manage this site.</p>
        <?php
        endif;
        ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>