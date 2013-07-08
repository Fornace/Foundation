<?php
/**
 * Category template for the theme
 *
 * @package Wordpress
 * @subpackage Furnace
 * @since 0.0.1
 */
get_header();
?>
<section id="primary" class="site-content">
        <div id="content" role="main">

        <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'furnace' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

            <?php if ( category_description() ) : // Show an optional category description ?>
                <div class="archive-meta"><?php echo category_description(); ?></div>
            <?php endif; ?>
            </header><!-- .archive-header -->

            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                get_template_part( 'loop', get_post_format() );

            endwhile;
            ?>

        <?php else : ?>
            <?php get_template_part( 'loop', 'none' ); ?>
        <?php endif; ?>

        </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>