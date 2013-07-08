<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header>
        <hgroup>
            <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <span class="right radius success label"><?php echo get_post_format(); ?></span>
            <h6>Written by <?php the_author_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
        </hgroup>
    </header>
<?php if (fsThumbnail()) : ?>
   <figure>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb_link">
            <?php
                $thumb = fsThumbnail();
                echo $thumb['thumb_img'];
             ?>
        </a>
        <figcaption>
            <?php echo $thumb['thumb_title']; ?>
        </figcaption>
    </figure>
<?php endif; ?>

    <?php the_excerpt(); ?>

</article>