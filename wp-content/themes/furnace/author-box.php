<?php if ( get_the_author_meta('description') ) : ?>


<section>
    <div>

        <div>
            <a href="<?php get_the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'),'60' ); ?></a>
            <h5><?php _e('About', 'furnace' ); ?> <?php the_author_link(); ?></h5>
            <p>
                <?php echo get_the_author_meta('description'); ?>
            </p>
        </div>

    </div>
</section>

<?php endif; ?>