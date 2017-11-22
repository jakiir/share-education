 <?php if(have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>   <div class="post">

						<div class="post-entry">

                                                    <div class="post-entry_left">

                                                        

                                                        <div class="entry-content-left">

                                                            <h2 class="posttitle"><?php the_title(); ?></h2>

                                                            <span class="entry-utility"><b>Project:</b> <?php the_field('project'); ?> | <b>Language:</b> <?php the_field('language'); ?>  |   <b>Published Date:</b> 

                                                                <?php $dateformatstring = "l d F, Y";$unixtimestamp = strtotime(get_field('published_date')); echo date_i18n($dateformatstring, $unixtimestamp); ?>

               </span>

							<div class="entry-content">

                                                               	<p><?php the_content(); ?></p>

                                                                

                                                                <div class="clear"></div><!-- clear float -->

							</div><!-- end .entry-content -->

                                                        </div>

                                                        <div class="entry-content-right">

                                                            <?php 



                                                                $news_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news_events_img', false, '' ); 

                                                                ?>

                    <img src="<?php echo $news_image_src[0] ?>" alt="<?php the_title_attribute(); ?>" class="shadowimg" width="118px" height="150px" />

                    <a  href="<?php the_field('file_upload_knowledge'); ?>" target="_blank" class="more2" >Download File</a>

                                                               

                                                        </div>

                                                    </div>

					

						</div><!-- end .post-entry -->

					</div>	



                                        <?php endwhile; ?>   

<div class="pagenavi">



						<a href="#" class="page">1</a><span class="current">2</span><a href="#" class="nextpostslink">&raquo;</a>



					</div>

					<?php endif; ?>