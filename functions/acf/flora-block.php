<?php
if ( function_exists( 'acf_register_block_type' ) ) :
    function dutchtown_acf_init_flora_block()
    {
        acf_register_block_type(array(
            'name'              => 'flora_block',
            'title'             => __('Flora Block'),
            'description'       => __('A block featuring the Flora Crown.'),
            'render_template'   => 'blocks/block-flora.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'block', 'masonry', 'flora' ),
            'supports'          => array ('align' => false ),
            'mode'              => 'edit'
        ));
    }
    add_action('acf/init', 'dutchtown_acf_init_flora_block');
endif;

if ( function_exists( 'acf_add_local_field_group' ) ) :
    
endif;