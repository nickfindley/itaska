<?php
global $blog_id;
if ( $blog_id == 6 ) :
    function cptui_register_my_cpts_board_member()
    {
        /**
         * Post Type: Board Members.
         */

        $labels = [
            "name" => __( "Board Members", "dutchtown" ),
            "singular_name" => __( "Board Member", "dutchtown" ),
            "menu_name" => __( "DT2 Board", "dutchtown" ),
        ];

        $args = [
            "label" => __( "Board Members", "dutchtown" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => [ "slug" => "board-members", "with_front" => false ],
            "query_var" => true,
            "supports" => [ "title" ],
            "taxonomies" => [ "post_tag" ],
        ];

        register_post_type( "board_member", $args );
    }

    add_action( 'init', 'cptui_register_my_cpts_board_member' );

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5f9dc954f3419',
            'title' => 'Board Members',
            'fields' => array(
                array(
                    'key' => 'field_5f9dc955092ee',
                    'label' => 'Member Order',
                    'name' => 'member_order',
                    'type' => 'number',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 6,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => 1,
                ),
                array(
                    'key' => 'field_5f9dc9550931f',
                    'label' => 'Member First Name',
                    'name' => 'member_first_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5f9dc95509366',
                    'label' => 'Member Last Name',
                    'name' => 'member_last_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5f9dc955093be',
                    'label' => 'Member Title',
                    'name' => 'member_title',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'Resident' => 'Resident',
                        'Business Owner' => 'Business Owner',
                        'Resident/Business Owner' => 'Resident/Business Owner',
                        'Secretary' => 'Secretary',
                        'Treasurer' => 'Treasurer',
                        'Vice President' => 'Vice President',
                        'President' => 'President',
                    ),
                    'default_value' => 'Resident',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f9dc95509401',
                    'label' => 'Member Organization',
                    'name' => 'member_organization',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5f9dc9550943f',
                    'label' => 'Member Organization Link',
                    'name' => 'member_organization_link',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_5f9dc9550947c',
                    'label' => 'Member Bio',
                    'name' => 'member_bio',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_5f9dc955094ba',
                    'label' => 'Member Photo',
                    'name' => 'member_photo',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'id',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'board_member',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

    endif;
endif;
?>