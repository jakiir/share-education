<?php /*Template Name: News and Events  */get_header(); ?>
<div id="wrapper-header-inner">
  <div id="wrapper-header-shadowline">
    <div id="header-inner">
      <h1 class="pagetitle">
        <?php the_title(); ?>
      </h1>
    </div>
    <!-- end header-inner --> </div>
  <!-- end wrapper-header-shadowline --> </div>
<!-- end wrapper-header -inner-->
<div id="wrapper-content">
  <div id="content-container-inner">
    <div id="sidecontent" class="positionleft">
  <div id="sidebar">
        <ul>
          <?php


if (is_page( )) {

  $page = $post->ID;

  if ($post->post_parent) {

    $page = $post->post_parent;

  }

  $children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );

  if ($children) {

    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=<h2></h2>');

  }

}

echo $output;

?>
          <li class="widget-container" id="searchwidget">
            <form action="#" method="post">
              <div>
                <input type="text" size="32" />
                <input type="submit" value="Search" class="button2"/>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
    <div id="content" class="positionright">
     
 <?php query_posts('post_type=news&category_name=News&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>
  <?php if(have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <div class="post-entry">
          <h2 class="posttitle"><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a></h2>
          <span class="entry-utility">
          <?php the_time('F j, Y') ?>
          | Posted by: <a href="#">
          <?php the_author() ?>
          </a> | <a href="#">
          <?php comments_number(); ?>
          comments</a></span>
          <div class="entry-content">
            <?php                 $news_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news_events_img', false, '' );                  ?>
            <img src="<?php echo $news_image_src[0] ?>" alt="<?php the_title_attribute(); ?>" class="shadowimg" width="580px" height="270px" />
            <p><?php echo substr(get_the_excerpt(), 0,150); ?>...</p>
            <a href="<?php the_permalink(); ?>" class="more">Read More</a>
            <div class="clear"></div>
            <!-- clear float --> </div>
          <!-- end .entry-content --> </div>
        <!-- end .post-entry --> </div>
      <!-- end .post1 -->
     <?php endwhile; ?>
      <div class="pagenavi"> <a href="#" class="page">1</a><span class="current">2</span><a href="#" class="nextpostslink">&raquo;</a> </div>
      
      <?php endif; ?>
      <!-- end pagenavi -->
      <div class="clear"></div>
      <!-- clear float --> </div>
    <!-- end content -->
    <div class="clear"></div>
    <!-- end clear --> </div>
  <!-- end content-container-inner --> </div>
<?php get_footer();?>
