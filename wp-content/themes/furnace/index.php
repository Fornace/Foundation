<?php
get_header();

furnaceLoop('posts_per_page=-1');
/*
while($l->have_posts()) : $l->the_post();
    the_title('<h2>', '</h2>');
    the_content();
endwhile;*/