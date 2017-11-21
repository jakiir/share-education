<div id="header-slider"> 
 <div id="slider-container">   
 <div id="slider2">      
<?php query_posts('post_type=slider&post_status=publish&posts_per_page=20&orderby=menu_order&order=ASC') ?>     
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
  <?php 				
$slider_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-image', false, '' ); 				          
 ?>      
<img src="<?php echo $slider_img_src[0] ?>"  alt="<?php the_title_attribute(); ?>" title="#htmlcaption-<?php the_ID();?>" /></a>     
 <?php endwhile; else: endif;  ?>  
  </div>   
 <!-- end #slider2 -->      
  <?php query_posts('post_type=slider&posts_per_page=20&orderby=menu_order&order=ASC') ?>   
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
<div id="htmlcaption-<?php the_ID(); ?>" class="nivo-html-caption">     
 <h2>        <?php the_title(); ?>      </h2>     
 <p><?php echo substr(get_the_excerpt(), 0,150); ?></p>     
 <a class="project_button" href="<?php get_home_url();?>/overview" target="_blank">Project Button</a> 
</div>    <?php endwhile; else: endif; wp_reset_query(); ?>
  </div>  <!-- end #slider-container -->   </div><!-- end header-slider -->