<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
       <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
    </header>
<?php if (fsThumbnail()): ?>
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
    <section class="entry">
        <?php the_content(); ?>
    </section>
</article>