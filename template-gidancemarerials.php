<?php /*Template Name: Guidance materials for teachers  */get_header(); ?><div id="wrapper-header-inner">	<div id="wrapper-header-shadowline">			<div id="header-inner">								<h1 class="pagetitle"><?php the_title(); ?></h1>			</div><!-- end header-inner -->	</div><!-- end wrapper-header-shadowline -->	</div> <!-- end wrapper-header -inner-->	<div id="wrapper-content">			<div id="content-container-inner">                            <div id="sidecontent" class="positionleft">					<?php get_template_part('sidemenu'); ?>									</div>				<div id="content" class="positionright">                                <?php query_posts('post_type=knowledgecentre&category_name=awareness-raising&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>						<?php get_template_part('post-loop'); ?>                                                                     <!-- end .post1 -->										<div class="clear"></div><!-- clear float -->				</div><!-- end content -->								<div class="clear"></div><!-- end clear -->			</div><!-- end content-container-inner -->	</div>		<?php get_footer();?>