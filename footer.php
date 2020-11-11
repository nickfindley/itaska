<?php
/**
 * The template for displaying the site footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 * 
 ********* NOTE ********
 * When multisite sidebars update, they need to be manually refreshed
 * by saving the sidebar twice.
 * 
 */

?>
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<section class="site-footer-section">
				<?php
                // if ( is_active_sidebar( 'footer-1' ) ) :
                //     dynamic_sidebar( 'footer-1');
                // endif;
                dutchtown_multisite_sidebar( 'footer-1' );
                ?>
				</section>
				<section class="site-footer-section">
				<?php 
                // if ( is_active_sidebar( 'footer-2' ) ) :
                //     dynamic_sidebar( 'footer-2');
                // endif;
                dutchtown_multisite_sidebar( 'footer-2' );
                ?>
				</section>
				<section class="site-footer-section">
				<?php 
                // if ( is_active_sidebar( 'footer-3' ) ) :
                //     dynamic_sidebar( 'footer-3');
                // endif;
                dutchtown_multisite_sidebar( 'footer-3' );
                ?>
				</section>
			</div>
		</div>
	</footer>
    
<div class="modal fade" id="navSearch" data-keyboard="false" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="searchform" role="search" action="/" method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel" aria-label="s">Search <?php bloginfo( 'name' ); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" aria-labelled-by="searchModalLabel">
                    <!-- <button id="searchsubmit" type="submit" name="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-bold btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="navMore" data-keyboard="false" tabindex="-1" aria-labelledby="moreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="moreModalLabel" aria-label="s">More on <?php bloginfo( 'name' ); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="nav-more">
                            <h5><a href="/resources/">Resources</a></h5>
                            <p>Check out our extensive list of <a href="/resources/">neighborhood resources</a> along with our guides:</p>
                            <ul>
                                <li><a href="/resources/citizens-service-bureau/">Citizens' Service Bureau</a></li>
                                <li><a href="/resources/neighborhood-improvement-specialist/">Neighborhood Improvement Specialists</a></li>
                                <li><a href="/resources/police/">Police: Who, Where, and When to Call</a></li>
                            </ul>
                        </div>
                        <div class="nav-more">
                            <h5><a href="/places/">Places Directory</a></h5>
                            <p>Visit our <a href="/places/">directory of places in Dutchtown</a> including restaurants, bars, shops, services, and more!</p>

                            <h5><a href="/godutch/">Go Dutch!</a></h5>
                            <p>Find information geared towards real estate professionals about <a href="/godutch/">buying and selling in Dutchtown</a>.</p>
                        </div>
                        <div class="nav-more">
                            <h5><a href="/amp/">Allies of Marquette Park</a></h5>
                            <p>Help <a href="/amp/">AMP</a> reactivate Marquette Park!</p>

                            <h5><a href="/dwna/">Dutchtown West Neighborhood Association</a></h5>
                            <p>Find out about <a href="/dwna/">DWNA</a>, a neighborhood group catering to those west of Grand.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>