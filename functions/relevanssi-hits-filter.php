<?php
add_filter('relevanssi_hits_filter', 'rlv_cull_recurring_events'); 
function rlv_cull_recurring_events($hits) { 
    $ok_results = array(); 
    $posts_seen = array(); 
    $index_by_title = array(); 
    $date_by_title = array(); 
    $i = 0; 
    foreach ($hits[0] as $hit) { 
        if (!isset($posts_seen[$hit->post_title])) { 
            $ok_results[] = $hit; 
            $date_by_title[$hit->post_title] = get_post_meta($hit->ID, '_EventStartDate', true); 
            $index_by_title[$hit->post_title] = $i; 
            $posts_seen[$hit->post_title] = true; 
            $i++; 
        } 
        else { 
            if (get_post_meta($hit->ID, '_EventStartDate', true) < $date_by_title[$hit->post_title]) { 
                if (strtotime(get_post_meta($hit->ID, '_EventStartDate', true)) < time()) continue; // Skips events that are in the past.
                $date_by_title[$hit->post_title] = get_post_meta($hit->ID, '_EventStartDate', true); 
                $ok_results[$index_by_title[$hit->post_title]] = $hit;
            } 
        } 
       } 
    $hits[0] = $ok_results;
    return $hits;
}
?>