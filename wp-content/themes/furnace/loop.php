<?php
/**
 * Default loop template
 */

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                <p><small><?php wp_meta(); ?></small></p>
            </header>
            <section>
                <?php the_content(); ?>
            </section>
        </article>