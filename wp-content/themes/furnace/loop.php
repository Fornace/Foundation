<?php
/**
 * Default loop template
 */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php if(is_single()) : ?>
            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
        <?php else:  ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <p>Written by <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?> in <?php the_category(', '); ?></p>
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
<section class="entry">
    <?php the_content(); ?>
</section>

</article>