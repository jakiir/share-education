<?php get_header(); ?>
<div id="wrapper-header">
  <div id="wrapper-header-shadowline">
<?php get_template_part('slider'); ?>
  </div>
  <!-- end wrapper-header-shadowline --> 
  
</div>
<!-- end wrapper-header -->

<div id="wrapper-content">
  <div id="content-container">
    <div class="clear"></div>
    <!-- end clear -->
    
    <div class="secondary-block">
      <div class="full-block">
        <div class="block-con">
          <div class="two_third">
            <div class="featured-block">
              <h3 class="icon_title2">
                <?php _e("<!--:bn-->শিক্ষক প্রশিক্ষণ উপকরণ<!--:--><!--:en-->Info Graph<!--:-->"); ?>
              </h3>
              <ul>
                <li>
                 <p>Students Enrolled 2012-2016</p>
                    <a href="http://emis.share-education.org/school_2016.html" target="_blank">
<img class="aligncenter" width="290px" height="140px" alt="progress_report" src="http://share-education.org/wp-content/uploads/2017/09/school_new.png">
                    </a>
                  
                </li>
                 <li>
<p>Graduated Students 2012-2016</p>
                    <a href="http://emis.share-education.org/graduated_2016.html" target="_blank">
<img class="aligncenter" width="290px" height="140px" alt="psc" src="http://share-education.org/wp-content/uploads/2017/09/student_new1.png">
</a>
                </li>
               
              </ul>
              </div>
            <div class="featured-block">
              <h3 class="icon_title">
                <?php _e("<!--:bn-->ইন্টারেক্টিভ ম্যাপ<!--:--><!--:en-->Interactive Map<!--:-->"); ?>
              </h3>
              <a href="http://emis.share-education.org/emis/index.php/map" target="_blanck"><img class="intractive_img" src="http://share-education.org/wp-content/uploads/2016/01/emis_f.png" alt="Intarective map" /></a> </div>
            
              <div class="featured-block">
              <h3 class="icon_title2">
                <?php _e("<!--:bn-->ট্যাগ<!--:--><!--:en-->Tags<!--:-->"); ?>
              </h3>
              <p>
               <?php dynamic_sidebar( 'Tags' ); ?>
              </p>
            </div>
            <div class="featured-block">
              <h3 class="icon_title2">
                <?php _e("<!--:bn-->ছাত্র শিক্ষার উপকরণ<!--:--><!--:en-->Learning materials<!--:-->"); ?>
              </h3>
              <ul>
                <li>
                  <?php query_posts('post_type=knowledgecentre&post_status=publish&posts_per_page=2&paged='. get_query_var('paged')); ?>
                  <?php if(have_posts()) : ?>
                  <?php while (have_posts()) : the_post(); ?>
                  <div class="block-left">
                    <?php 

                                                                $news_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news_events_img', false, '' ); 

				

                                                                ?>
                    <img src="<?php echo $news_image_src[0] ?>" alt="<?php the_title_attribute(); ?>" class="shadowimg" width="81px" height="81px" /> <a class="read_more3" href="<?php the_permalink(); ?>" title="read more">Read More</a></div>
                  <div class="block-right">
                    <h2>
                      <?php the_title(); ?>
                    </h2>
                    <p><?php echo substr(get_the_excerpt(), 0,80); ?>...</p>
                  </div>
                </li>
                <?php

                                 endwhile; endif; 

                                

                                ?>
              </ul>
            </div>
          </div>
          <div class="one_third last">
            <div class="featured-block" style="width: 280px; border-bottom: none; margin-right: 0px">
              <h3 class="icon_title">
                <?php _e("<!--:bn-->ফেসবুক লেগেছে<!--:--><!--:en-->Facebook<!--:-->"); ?>
              </h3>
              <div class="like_box_facebook">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fshare.education.bangladesh&amp;width=280&amp;height=800&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=true&amp;appId=614808498567823" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:800px;" allowTransparency="true"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="sponsor">
          <ul>
            <li><a href="#"><img src="http://share-education.org/wp-content/uploads/2015/07/european_union_logo.png" width="100px" height="60px" alt="Partners" /></a></li>
            <li><a href="#"><img src="<?php bloginfo( 'template_url' )?>/images/1.png" width="60px" height="60px" alt="Partners" /></a></li>
            <li style="margin-left: 12px; margin-right:103px;"><a href="#"><img src="<?php bloginfo( 'template_url' )?>/images/1212.png" width="150px" height="60px" alt="Partners" /></a></li>
            <li><a href="#"><img src="<?php bloginfo( 'template_url' )?>/images/3.png" width="50px" height="60px" alt="Partners" /></a></li>
            <li><a href="#"><img src="<?php bloginfo( 'template_url' )?>/images/22121.png" width="150px" height="60px" alt="Partners" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end content-container --> 
  
</div>
<!-- end wrapper-content -->

<?php get_footer();?>

