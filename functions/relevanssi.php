<?php
// add_filter( 'relevanssi_modify_wp_query', 'rlv_orderby' );
// function rlv_orderby( $query ) {
//     $query->set( 'orderby', array( 'relevance', 'esd' ) );
//     return $query;
// }

// add_filter('relevanssi_hits_filter', 'order_the_results');
// function order_the_results($hits) {
//     global $wp_query;
 
// 	switch ($wp_query->query_vars['orderby']) {
// 		case 'esd':
// 	        $esd = array();
//     		foreach ($hits[0] as $hit) {
//         		$esd_count = get_post_meta($hit->ID, '_EventStartDate', true);
// 	        	if (!isset($esd[$esd_count])) $esd[$esd_count] = array();
//     	    			array_push($esd[$esd_count], $hit);
//         		}
 
// 			if ($wp_query->query_vars['order'] == 'asc') {
// 				ksort($esd);
// 			} else {
// 				krsort($esd);
// 			}
 
// 	      		$sorted_hits = array();
// 			foreach ($esd as $esd_count => $year_hits) {
//    	     		$sorted_hits = array_merge($sorted_hits, $year_hits);
// 	        }
// 		$hits[0] = $sorted_hits;
// 		break;
    
//         case 'relevance':
//             //do nothing
//             break;
 
// 	}
//     return $hits;
// }


add_filter( 'relevanssi_do_not_index', 'rlv_no_past_events', 10, 2 );
add_filter( 'relevanssi_post_ok', 'rlv_no_past_events', 10, 2 );
 
/**
 * Blocks past events from search results and indexing.
 *
 * @param boolean $status  Should the post be indexed/searched or not?
 * @param int     $post_id The post ID.
 *
 * @return boolean For relevanssi_post_ok, return false if the event has passed.
 *                 For relevanssi_do_not_index, return true if the event has passed.
 */
function rlv_no_past_events( $status, $post_id ) {
	$end_date = get_post_meta( $post_id, '_EventEndDate', true );
	if ( $end_date ) {
		if ( strtotime( $end_date ) < time() ) {
			if ( 'relevanssi_post_ok' === current_filter() ) {
				$status = false;
			} else {
				$status = true;
			}
		}
	}
	return $status;
}

add_filter( 'get_search_form', 'dutchtown_search_form' );
function dutchtown_search_form( $form ) {
	$form = '<div class="search-form" role="search">
        <form method="get" action="/">
            <label>
                <span class="sr-only">Search for:</span>
            </label>
            <div class="input-group">
                <input type="search" class="search-field form-control" placeholder="Search&hellip;" value="" name="s">
                <div class="input-group-append">
                    <button type="submit" class="search-submit btn btn-primary">
                        <i class="fas fa-search" aria-hidden="true"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>';
	return $form;
}
?>