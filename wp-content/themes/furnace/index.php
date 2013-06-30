<?php
get_header();

$l = furnaceLoop('posts_per_page=1');
var_dump(get_queried_object());
while($l->have_posts()) : $l->the_post();
    the_title('<h2>', '</h2>');
    the_content();
endwhile;