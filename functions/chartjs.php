<?php
    function dutchtown_chartjs()
    {
        if ( is_page( 13617 ) ) :
            wp_register_script( 'chartjs', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js', false, '2.9.3', false );
            wp_enqueue_script( 'chartjs' );
        endif;
    }

    add_action( 'wp', 'dutchtown_chartjs' );
?>