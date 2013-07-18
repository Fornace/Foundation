<?php

get_header();
var_dump(get_query_var('s'));
if(have_posts()) : while (have_posts()) : the_post();

get_template_part('loop');

endwhile;

else: ?>

<h1>No post</h1>

<?php endif; ?>

<?php get_footer(); ?>