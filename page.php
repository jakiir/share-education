<?php get_header(); ?>

<div id="wrapper-header-inner">
  <div id="wrapper-header-shadowline">
    <div id="header-inner">
      <h1 class="pagetitle">
        <?php the_title(); ?>
      </h1>
    </div>
    <!-- end header-inner --> 
    
  </div>
  <!-- end wrapper-header-shadowline --> 
  
</div>
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
  echo '<li class="pagenav">';
    wp_nav_menu( array( 'menu' => 'knowledge-sidemenu') );
  echo '</li>';
  /*$children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );

  if ($children) {

    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=<h2></h2>');

  }*/

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
    <!-- end sidecontent -->
    
    <div id="content" class="positionright  pagecontent">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
        <?php the_content(); ?>
   
      <?php endwhile; else: ?>
   
        <?php _e('Sorry, no posts matched your criteria.'); ?>
      <?php endif; ?>
      <div class="clear"></div>
      <!-- clear float --> 
      
    </div>
    <!-- end content -->
    
    <div class="clear"></div>
    <!-- end clear --> 
    
  </div>
  <!-- end content-container-inner --> 
  
</div>
<?php get_footer();?>
