<?php
/**
 * Template used when there is no post to show.
 *
 * @package Wordpress
 * @subpackage Furnace
 * @since  0.0.1
 */
 ?>
<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Nothing Found', 'furnace' ); ?></h1>
    </header>

    <div class="entry-content">
        <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'furnace' ); ?></p>
        <?php get_search_form(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 -->