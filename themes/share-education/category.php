<?php 
get_header(); ?>

<div id="wrapper-header-inner">
	<div id="wrapper-header-shadowline">
			<div id="header-inner">
				
				<h1 class="pagetitle"><?php $categories = get_the_category(); echo $categories[0]->name;?></h1>
			</div><!-- end header-inner -->
	</div><!-- end wrapper-header-shadowline -->
	</div> <!-- end wrapper-header -inner-->
	<div id="wrapper-content">
			<div id="content-container-inner">
                            <div id="sidecontent" class="positionleft">
					<?php get_template_part('sidemenu'); ?>					
				</div>
				<div id="content" class="positionright">
                                     <?php query_posts( array(
     'post_type' => array( 'post', 'knowledgecentre' ),
     'showposts' => 12 )
     ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
						<div class="post-entry">
                                                    
					
							<h2 class="posttitle" style="font-size: 15px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-content">
                                                                	<p><?php the_content(); ?></p>
                                                                
                                                                
                                                                <div class="clear"></div><!-- clear float -->
							</div><!-- end .entry-content -->
						</div><!-- end .post-entry -->
                        <?php endwhile; ?>
					</div><!-- end .post1 -->


						<div class="clear"></div><!-- clear float -->
                        
				</div><!-- end content -->
				
				<div class="clear"></div><!-- end clear -->
			</div><!-- end content-container-inner -->
	</div>		
<?php get_footer();?>