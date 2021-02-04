<?php
/**
 * Deregister admin styles on the front end when using ACF forms
 *
 * ACF makes sure that admin styles are queued when it loads its head, this almost always causes problems with front end forms and isn't needed for our purpose
 */
add_action( 'wp_print_styles', 'custom_acf_deregister_styles', 100 );
function custom_acf_deregister_styles()
{
    if (! is_admin() )
    {
        wp_deregister_style( 'wp-admin' );
    }
}

/**
 * Save ACF field as post_content / post_title for front-end posting
 */
add_action( 'acf/save_post', 'custom_acf_save_post' );
function custom_acf_save_post( $post_id )
{
    if (! is_admin() && 'acf' != get_post_type( $post_id ) ) // Don't run if adding/updated fields/field-groups in wp-admin
    {
        $post_title   = get_post_meta( $post_id, 'form_post_title', true );
        $post_content = get_post_meta( $post_id, 'form_post_content', true );
        $post         = get_post($post_id);
        if ( ($post_title && $post_title != $post->post_title) || ($post_content && $post_content != $post->post_content) )
        {
            $post_data = array(
                'ID' => $post_id,
            );
            if ( $post_content ) $post_data['post_content'] = $post_content;
            if ( $post_title )   $post_data['post_title']   = $post_title;

            remove_action( 'acf/save_post', 'custom_acf_save_post' );
            wp_update_post( $post_data );
            add_action( 'acf/save_post', 'custom_acf_save_post' );
        }
    }
}

/**
 * Load existing post_title
 */
add_filter( 'acf/load_value/name=form_post_title', 'custom_acf_load_value_form_post_title', 10, 3 );
function custom_acf_load_value_form_post_title( $value, $post_id, $field )
{
    $value   = get_the_title($post_id);
    return $value;
}

/**
 * Load existing post_content
 */
add_filter( 'acf/load_value/name=form_post_content', 'custom_acf_load_value_form_post_content', 10, 3 );
function custom_acf_load_value_form_post_content( $value, $post_id, $field )
{
    $post    = get_post($post_id);
    $value   = $post->post_content;
    return $value;
}

/**
 *  Install Add-ons (This adds two field groups that you can use to edit title and content)
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */ 

// Fields 
add_action('acf/register_fields', 'my_register_fields');

/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_form-post-title',
        'title' => 'Form Post Title',
        'fields' => array (
            array (
                'key' => 'field_25',
                'label' => 'Title',
                'name' => 'form_post_title',
                'type' => 'text',
                'default_value' => '',
                'formatting' => 'html',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'block_events',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => -2,
    ));
    register_field_group(array (
        'id' => 'acf_form-post-content',
        'title' => 'Form Post Content',
        'fields' => array (
            array (
                'key' => 'field_13',
                'label' => 'Content',
                'name' => 'form_post_content',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'block_events',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => -1,
    ));
}