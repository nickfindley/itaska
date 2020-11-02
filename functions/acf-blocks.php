<?php
function dutchtown_acf_init_block_types()
{
    if ( function_exists( 'acf_register_block_type' ) ) :
        acf_register_block_type(array(
            'name'              => 'masonry_block',
            'title'             => __('Masonry Block'),
            'description'       => __('A block in a masonry layout.'),
            'render_template'   => 'blocks/block-masonry.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'block', 'masonry' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'front_page_block',
            'title'             => __('Front Page Block'),
            'description'       => __('A block for the front page layout.'),
            'render_template'   => 'blocks/block-front-page.php',
            'category'          => 'formatting',
            'keywords'          => array( 'front page', 'image', 'masonry' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'front_page_social',
            'title'             => __('Front Page Social'),
            'description'       => __('Display social media links.'),
            'render_template'   => 'blocks/block-front-page-social.php',
            'category'          => 'formatting',
            'keywords'          => array( 'front page', 'social' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'front_page_posts',
            'title'             => __('Front Page Posts'),
            'description'       => __('Display blog posts on the front page.'),
            'render_template'   => 'blocks/block-front-page-posts.php',
            'category'          => 'formatting',
            'keywords'          => array( 'front page', 'posts' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'steering_committee_card',
            'title'             => __('Steering Committee Card'),
            'description'       => __('Show a card for a Steering Committee member.'),
            'render_template'   => 'blocks/block-steering-committee-card.php',
            'category'          => 'formatting',
            'keywords'          => array( 'steering committe', 'member', 'card' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'masonry_block_open',
            'title'             => __('Masonry Block Open'),
            'description'       => __('Opening div for masonry blocks.'),
            'render_template'   => 'blocks/block-masonry-open.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'div', 'row', 'masonry' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'masonry_block_close',
            'title'             => __('Masonry Block Close'),
            'description'       => __('Closing div for masonry blocks.'),
            'render_template'   => 'blocks/block-masonry-close.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'div', 'row', 'masonry' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'card_open',
            'title'             => __('Card Open'),
            'description'       => __('Opening block for a group of cards.'),
            'render_template'   => 'blocks/block-card-open.php',
            'category'          => 'formatting',
            'keywords'          => array( 'open', 'card' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'card_close',
            'title'             => __('Card Close'),
            'description'       => __('Closing block for a group of cards.'),
            'render_template'   => 'blocks/block-card-close.php',
            'category'          => 'formatting',
            'keywords'          => array( 'close', 'card' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));

        acf_register_block_type(array(
            'name'              => 'committee_member',
            'title'             => __('Comittee Member'),
            'description'       => __('Card for a committee member.'),
            'render_template'   => 'blocks/block-committee-member.php',
            'category'          => 'formatting',
            'keywords'          => array( 'card', 'member', 'committee' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));
    endif;
}
add_action('acf/init', 'dutchtown_acf_init_block_types');
?>