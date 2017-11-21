<?php 
/*
Template Name: news and events single
  */
get_header(); ?>

<div id="wrapper-header-inner">
	<div id="wrapper-header-shadowline">
			<div id="header-inner">
				
				<h1 class="pagetitle"><?php the_title(); ?></h1>
			</div><!-- end header-inner -->
	</div><!-- end wrapper-header-shadowline -->
	</div> <!-- end wrapper-header -inner-->
	<div id="wrapper-content">
			<div id="content-container-inner">
                            <div id="sidecontent" class="positionleft">
					<?php get_template_part('sidemenu'); ?>					
				</div><!-- end sidecontent -->
				<div id="content" class="positionright">
                                    <?php while ( have_posts() ) : the_post(); ?>
					<div class="post">
						<div class="post-entry">
                                                    
					
							<h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span class="entry-utility"><?php the_time('F j, Y') ?> | Posted by: <a href="#"><?php the_author() ?> </a> |    <a href="#"><?php comments_number(); ?> comments</a></span>
							<div class="entry-content">
                                                                <?php 
                                                                $news_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news_events_img', false, '' ); 
				
                                                                ?>
                                                            <img src="<?php echo $news_image_src[0] ?>" alt="<?php the_title_attribute(); ?>" class="shadowimg" width="580px" height="270px" />
								<p><?php the_content(); ?></p>
                                                               
                                                                    <?php wp_reset_postdata(); ?>

<?php endwhile;?>  
                                                                
                                                                <div class="clear"></div><!-- clear float -->
							</div><!-- end .entry-content -->
						</div><!-- end .post-entry -->
					</div><!-- end .post1 -->
 
				
					<div class="clear"></div><!-- clear float -->
				</div><!-- end content -->
				
				<div class="clear"></div><!-- end clear -->
			</div><!-- end content-container-inner -->
	</div>
		
<?php get_footer();?>