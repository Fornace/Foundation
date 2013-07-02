<?php
/**
 * Default loop template
 */
$loop = furnaceLoop(apply_filters('fs_loop_default_args', NULL));

if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                <p><small><?php wp_meta(); ?></small></p>
            </header>
            <section>
                <?php the_content(); ?>
            </section>
        </article>

    <?php endwhile;
    else :
    get_404_template();
endif;
?>