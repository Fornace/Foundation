<?php
get_header();

$l = furnaceLoop('posts_per_page=1');

while($l->have_posts()) : $l->the_post();
    the_title();
    the_content();
endwhile;