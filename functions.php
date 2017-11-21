<?php

/* This code is for menu */
add_theme_support( 'menus' );
/* This code for Featured Image Support */

add_theme_support( 'post-thumbnails', array( 'post','slider','news','knowledgecentre') );
add_image_size( 'slider-image', 500, 280, true );
add_image_size( 'news_events_img', 580, 270, true );


/* This code for readmore */

function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'>Read More</a>";
echo $excerpt;
}



/* This is code for custom Post*/

    /* Register Custom Post Types********************************************/
     
            add_action( 'init', 'create_custom_slider' );
            function create_custom_slider() {
                    register_post_type( 'slider',
                            array(
                                    'labels' => array(
                                            'name' => __( 'Slider' ),
                                            'singular_name' => __( 'Slider' ),
                                            'add_new' => __( 'Add New Slider' ),
                                            'add_new_item' => __( 'Add New Slider' ),
                                            'edit_item' => __( 'Edit New Slider' ),
                                            'new_item' => __( 'New New Slider' ),
                                            'view_item' => __( 'View New Slider' ),
                                            'not_found' => __( 'Sorry, we couldn\'t find the Slider you are looking for.' )
                                    ),
                            'public' => true,
                            'publicly_queryable' => true,
                            'exclude_from_search' => true,
                            'menu_position' => 4,
                            'has_archive' => true,
                            'taxonomies' => array('category', 'post_tag'),
                            'hierarchical' => false,
                            'capability_type' => 'page',
                            'rewrite' => array( 'slug' => 'slider' ),
                            'supports' => array( 'title', 'editor', 'thumbnail', 'tags' )
                            )
                    );
                    
            }

add_action( 'init', 'create_custom_news_events' );
function create_custom_news_events() {
                    register_post_type( 'news',
                            array(
                                    'labels' => array(
                                            'name' => __( 'News & Events' ),
                                            'singular_name' => __( 'News & Event' ),
                                            'add_new' => __( 'Add New News & Event' ),
                                            'add_new_item' => __( 'Add New News & Event' ),
                                            'edit_item' => __( 'Edit New News & Event' ),
                                            'new_item' => __( 'New New News & Event' ),
                                            'view_item' => __( 'View' ),
                                            'not_found' => __( 'Sorry, we couldn\'t find the News & Events you are looking for.' )
                                    ),
                            'public' => true,
                            'publicly_queryable' => true,
                            'exclude_from_search' => true,
                            'menu_position' => 5,
                            'has_archive' => true,
                             'taxonomies' => array('category', 'post_tag'),
                            'hierarchical' => false,
                            'capability_type' => 'page',
                            'rewrite' => array( 'slug' => 'news'),
                            'supports' => array( 'title', 'editor', 'thumbnail', 'tags'  )
                            )
                    );
                    
            }
  
add_action( 'init', 'create_custom_centre' );
function create_custom_centre() {
                    register_post_type( 'knowledgecentre',
                            array(
                                    'labels' => array(
                                            'name' => __( 'Knowledge Centre' ),
                                            'singular_name' => __( 'Knowledge Centre' ),
                                            'add_new' => __( 'Add New Knowledge Centre' ),
                                            'add_new_item' => __( 'Add New Knowledge Centre' ),
                                            'edit_item' => __( 'Edit New Knowledge Centre' ),
                                            'new_item' => __( 'New New Knowledge Centre' ),
                                            'view_item' => __( 'View' ),
                                            'not_found' => __( 'Sorry, we couldn\'t find the Knowledge Centre you are looking for.' )
                                    ),
                            'public' => true,
                            'publicly_queryable' => true,
                            'exclude_from_search' => true,
                            'menu_position' => 5,
                            'has_archive' => true,
                             'taxonomies' => array('category', 'post_tag'),
                            'hierarchical' => false,
                            'capability_type' => 'page',
                            'rewrite' => array( 'slug' => 'knowledgecentre'),
                            'supports' => array( 'title', 'editor', 'thumbnail', 'tags'  )
                            )
                    );
                    
            }      
/*********footer Widgets**********/            
function share_widgets_init() {
register_sidebar( array(
		'name' => __( 'Tags' ),
		'id' => 'home_tag',
		'before_widget' => '<div class="featured-block">',
		'after_widget' => '</div>',
                'before_title' => '<h3 class="icon_title2">',
                'after_title' => '</h3>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widgets' ),
		'id' => 'footer_widgets',
		'before_widget' => '',
		'after_widget' => '',
                'before_title' => '',
                'after_title' => ''
	) );

    }

add_action( 'widgets_init', 'share_widgets_init' );  
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
?>
    <style type="text/css" media="screen">
        #menu-posts-slider .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/slides.png) no-repeat 6px 7px!important;
        }
        #menu-posts-knowledgecentre .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/microformats.png) no-repeat 6px 7px!important;
        }
        #menu-posts-goodpractices .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/sticky-note--plus.png) no-repeat 6px 7px!important;
        }
        #menu-posts-news .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/newspaper--plus.png) no-repeat 6px 7px!important;
        }
        #menu-posts .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/pencil--plus.png) no-repeat 6px 7px!important;
        }
        #menu-pages .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/blueprint--plus.png) no-repeat 6px 7px!important;
        }
        
        
        #menu-posts-slider:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/slides.png) no-repeat 6px -17px !important;
        }
        #menu-posts-knowledgecentre:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/microformats.png) no-repeat 6px -17px !important;
        }
        #menu-posts-goodpractices:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/sticky-note--plus.png) no-repeat 6px -17px !important;
        }
        #menu-posts-news:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/newspaper--plus.png) no-repeat 6px -17px !important;
        }
        #menu-posts:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/pencil--plus.png) no-repeat 6px -17px !important;
        }
        #menu-pages:hover .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/blueprint--plus.png) no-repeat 6px -17px !important;
        }
    </style>
<?php } 
  

   