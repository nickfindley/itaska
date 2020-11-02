<?php
if ( strpos( get_bloginfo( 'name' ), 'Block Club' ) ) :
    add_action( 'admin_init', 'block_club_contact_form' );
    function block_club_contact_form()
    {
        if ( ! is_plugin_active( ABSPATH . 'wp-content/plugins/block-club-contact-form/block-club-contact-form.php' ) ) :
            activate_plugins( array(
                ABSPATH . 'wp-content/plugins/block-club-contact-form/block-club-contact-form.php'
            ), '', false, false );
        endif;
    }
endif;
?>