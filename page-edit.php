<?php
/**
 * Template Name: Edit
 * The template to edit posts from the frontend
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

if ( isset( $_GET['postid'] ) && current_user_can( 'edit_post', $_GET['postid'] ) ) :
    $post_to_edit = $_GET['postid'];
    acf_form_head();
endif;

if ( isset( $_GET['posttype'] ) || isset( $_GET['postid'] ) ) :
    if ( isset( $_GET['postid'] ) ) :
        $post_type_slug = get_post_type( $_GET['postid'] );
        $post_type = get_post_type_object( get_post_type( $_GET['postid'] ) );
        $post_type_title = $post_type->labels->singular_name;
    else :
        $post_type_slug = $_GET['posttype'];
        $post_type = get_post_type_object( $_GET['posttype'] );
        $post_type_title = $post_type->labels->name;
    endif;
else :
    $post_type = 'All Items';
endif;

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
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo $post_type_title; ?></a></h1>
    <?php else : ?>
    <header class="main-header">
        <div class="main-header-container container">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo $post_type_title; ?></a></h1>
    <?php endif; ?>
        </div>
    </header>
    <section class="main-content">
        <div class="main-content-container container">
        <?php
        if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_post', $post_to_edit ) ) :
            if ( ! $post_to_edit ) :
                $today = date( 'Y-m-d' );
                if ( ! $post_type_slug || $post_type_slug == 'block_events' ) :
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
                        <h2>Select an Event To Edit</h2>
                        <ul class="post-links">
                    <?php
                        while ( $block_event_query->have_posts() ) :
                            $block_event_query->the_post();
                            $print_date = date( 'F jS, Y', strtotime( get_field( 'block_event_date_time' ) ) ); 
                    ?>
                            <li>
                                <a href="<?php echo $edit_link; ?>?postid=<?php echo get_the_ID(); ?>">
                                    <?php the_title(); ?> <span class="small muted"><?php echo $print_date; ?></span>
                                </a>
                            </li>
                    <?php
                        endwhile;
                    ?>
                        </ul>

                        <p><a class="btn btn-primary" href="../create?posttype=block_events">Create New Event</a></p> 
                <?php
                    endif;
                endif;

                if ( ! $post_type_slug || $post_type_slug == 'post' ) :
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => array(
                            'post_date' => 'DESC'
                        ),
                        'posts_per_page' => -1,
                    );
                    $post_query = new WP_Query( $args );

                    $edit_link = home_url( add_query_arg( array(), $wp->request ) );

                    if ( $post_query->have_posts() ) :
                    ?>
                        <h2>Select a Post To Edit</h2>
                        <ul class="post-links">
                    <?php
                        while ( $post_query->have_posts() ) :
                            $post_query->the_post();
                            $print_date = get_the_date( 'F jS, Y' ); 
                    ?>
                            <li>
                                <a href="<?php echo $edit_link; ?>?postid=<?php echo get_the_ID(); ?>">
                                    <?php the_title(); ?> <span class="small muted"><?php echo $print_date; ?></span>
                                </a>
                            </li>
                    <?php
                        endwhile;
                    ?>
                        </ul>

                        <p><a class="btn btn-primary" href="../create?posttype=post">Create New Post</a></p> 
                <?php
                    endif;
                endif;
            endif;

            if ( isset( $post_to_edit ) && current_user_can( 'edit_post', $post_to_edit ) ) :
                acf_form( array(
                    'post_id'		=> $post_to_edit,
                    'post_title'	=> true,
                    'post_content'	=> true,
                    'new_post'		=> array(
                        'post_type'		=> $post_type_slug,
                        'post_status'	=> 'publish'
                    ),
                    'uploader' => 'basic',
                    'submit_value' => 'Update &ldquo;' . get_the_title( $_GET['postid'] ) . '&rdquo;',
                    'updated_message' => $post_type_title . ' updated. <a href="' . get_the_permalink( $_GET['postid'] ) . '">View your ' . strtolower( $post_type_title ) . '</a> or <a href="' . get_the_permalink() . '?posttype=' . $post_type_slug . '">select a different ' . strtolower( $post_type_title ) . ' to edit</a>.',
                    'html_updated_message' => '<p class="alert-message">%s</p>'
                ));
            endif;
        else :
        ?>
            <p class="alert-message">You&rsquo;re not allowed in here.</p>
        <?php
        endif;
        ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>