<div class="tagline">
    <?php $the_query = new WP_Query( 'pagename=tagline' );
                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <h2>&#8220;<?php the_field('tagtitle'); ?>&#8221;</h2>
            <p><?php the_content(); ?></p>
           <?php endwhile;
                wp_reset_postdata(); ?>
</div>