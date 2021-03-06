<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php if(is_single()) : ?>
            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
        <?php else:  ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <p><?php _e('Written by', 'furnace' );?> <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?></p>
    </header>
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
    <section class="entry">
        <?php the_content(); ?>
    </section>
    <footer>

        <p><?php wp_link_pages(); ?></p>

        <h6><?php _e('Posted Under:', 'furnace' );?> <?php the_category(', '); ?></h6>
        <?php the_tags('<span">','</span><span>','</span>'); ?>

        <?php get_template_part('author-box'); ?>

        <?php comments_template(); ?>

    </footer>
</article>