<?php
/**
 * Template Name: Create
 * The template to create posts from the frontend
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */
if ( isset( $_GET['posttype'] ) ) :
    $post_type_slug = $_GET['posttype'];
    $post_type = get_post_type_object( $_GET['posttype'] );
    $post_type_title = $post_type->labels->singular_name;
endif;

acf_form_head();
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
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> New <?php echo $post_type_title; ?></a></h1>
    <?php else : ?>
    <header class="main-header">
        <div class="main-header-container container">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> New <?php echo $post_type_title; ?></a></h1>
    <?php endif; ?>
        </div>
    </header>

    <div class="container">
    <?php
    if ( current_user_can( 'edit_posts' ) ) :
        if ( isset( $_GET['posttype'] ) ) :
            acf_form( array(
                'post_id'		=> 'new_post',
                'post_title'	=> true,
                'post_content'	=> true,
                'new_post'		=> array(
                    'post_type'		=> $post_type_slug,
                    'post_status'	=> 'publish'
                ),
                'submit_value' => 'Create New ' . $post_type_title,
                'updated_message' => $post_type_title . ' created. <a href="' . get_the_permalink( $_GET['postid'] ) . '">View your ' . $post_type_title . '</a>.',
                'html_updated_message' => '<p class="alert-message">%s</p>'
            ));
        else :
    ?>
        <h2>What would you like to create?</h2>
        <ul>
            <li><a href="./?posttype=post">New blog post</a></li>
            <li><a href="./?posttype=block_events">New block event</a></li>
        </ul>
    <?php
        endif;
    else : 
    ?>
        <p class="alert-message">You&rsquo;re not allowed in here. <a href="<?php echo esc_url( wp_login_url( $_SERVER['REQUEST_URI'] ) ); ?>">Log in</a> or <a href="<?php echo get_site_url(); ?>">go home</a>.</p>
    <?php
    endif;
    ?>
    </div>
</main>
<?php get_footer(); ?>