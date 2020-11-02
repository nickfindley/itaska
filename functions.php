<?php
global $blog_id;

require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/widgets-init.php';
require get_template_directory() . '/functions/scripts.php';
require get_template_directory() . '/functions/acf-blocks.php';
require get_template_directory() . '/functions/acf-fields.php';
require get_template_directory() . '/functions/archive-title.php';
require get_template_directory() . '/functions/autoversion.php';
// require get_template_directory() . '/functions/block-club-contact-form.php';
// require get_template_directory() . '/functions/block-committee-members.php';
require get_template_directory() . '/functions/block-events.php';
require get_template_directory() . '/functions/board-members.php';
require get_template_directory() . '/functions/body-classes.php';
require get_template_directory() . '/functions/bootstrap-navwalker.php';
require get_template_directory() . '/functions/broadcast.php';
require get_template_directory() . '/functions/comments.php';
require get_template_directory() . '/functions/chartjs.php';
if ( $blog_id == 1 ) :
    require get_template_directory() . '/functions/events-calendar.php';
endif;
require get_template_directory() . '/functions/excerpt.php';
require get_template_directory() . '/functions/fonts.php';
require get_template_directory() . '/functions/gravity-forms.php';
require get_template_directory() . '/functions/gravity-forms-bootstrap.php';
require get_template_directory() . '/functions/multisite-widgets.php';
require get_template_directory() . '/functions/numbers-to-words.php';
require get_template_directory() . '/functions/oxford-categories.php';
require get_template_directory() . '/functions/pagination.php';
require get_template_directory() . '/functions/paypal-donation.php';
require get_template_directory() . '/functions/places.php';
require get_template_directory() . '/functions/posted-date.php';
require get_template_directory() . '/functions/primary-term.php';
require get_template_directory() . '/functions/relevanssi.php';
require get_template_directory() . '/functions/site-notice.php';
require get_template_directory() . '/functions/social-links.php';
require get_template_directory() . '/functions/temp-table.php';
// require get_template_directory() . '/functions/yoast.php';