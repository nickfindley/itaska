<div class="card-wrapper">
    <div class="card">
        <?php if ( get_field( 'member_photo' ) ) : $image = get_field( 'member_photo' ); echo wp_get_attachment_image( $image, 'xs', false, array( 'class' => 'card-img-top' ) ); endif; ?>
        <div class="card-body">
            <h3 class="card-title"><?php echo get_field( 'member_first_name' ) . ' ' . get_field( 'member_last_name' ); ?></h3>
            <?php if ( get_field( 'member_organization' ) ) : ?>
            <p class="card-text"><?php if ( get_field( 'member_organization_link' ) ) : ?><a href="<?php the_field( 'member_organization_link' ); ?>"><?php endif; ?><?php the_field( 'member_organization' ); ?><?php if ( get_field( 'member_organization_link' ) ) : ?></a><?php endif; ?></p>
            <?php endif; ?>  
        </div>     
        <div class="card-footer">
            <?php if ( get_field( 'member_bio_link' ) ) : ?>
            <a href="<?php the_field( 'member_bio_link' ); ?>">Read <?php the_field( 'member_first_name' ); ?>&apos;s bio</a>
            <?php endif;?> 
        </div>
    </div>
</div>