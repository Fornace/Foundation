<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php if(is_single()) : ?>
            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
        <?php else:  ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <p><small><?php wp_meta(); ?></small></p>
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
</article>