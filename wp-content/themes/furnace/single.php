<?php
get_header();
$loop = furnaceLoop();
if ($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();
get_template_part('loop', 'single');
endwhile;

endif;
get_sidebar();
get_footer();