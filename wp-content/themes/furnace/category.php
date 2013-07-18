<?php
/**
 * Category template for the theme
 *
 * @package Wordpress
 * @subpackage Furnace
 * @since 0.0.1
 */
get_header();
$vl = get_queried_object();
var_dump($vl);
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
            do_action('fs_before_cat_loop');
            while ( have_posts() ) : the_post();
                get_template_part( 'loop', get_post_format() );

            endwhile;
            do_action('fs_after_cat_loop');
            if (function_exists('fsPagination'))
            {
                fsPagination();
            }
            ?>

        <?php else : ?>
            <?php get_template_part( 'loop', 'none' ); ?>
        <?php endif; ?>

        </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>