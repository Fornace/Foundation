<?php
/**
 * Default loop template
 */

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <?php if(is_single()) : ?>
                    <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                <?php else:  ?>
                    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                <?php endif; ?>
                <p><small><?php wp_meta(); ?></small></p>
            </header>
            <section>
                <?php the_content(); ?>
            </section>
        </article>