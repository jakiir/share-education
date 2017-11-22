<?php
	$labels = array(
	    'name' => __('Graphiques','wcg'),
	    'singular_name' => __('Graphique','wcg'),
	    'add_new' => __('Créér un graphique','wcg'),
	    'add_new_item' => __('Créér un nouveau graphique','wcg'),
	    'edit_item' => __('Editer le graphique','wcg'),
	    'new_item' => __('Nouveau graphique','wcg'),
	    'all_items' => __('Tous les graphiques','wcg'),
	    'view_item' => __('Voir le graphique','wcg'),
	    'search_items' => __('Rechercher un graphique','wcg'),
	    'not_found' =>  __('Aucun graphique','wcg'),
	    'not_found_in_trash' => __('Aucun graphique dans la corbeille','wcg'), 
	    'parent_item_colon' => '',
	    'menu_name' => __('Graphiques','wcg')
	);

	register_post_type('graphique',array(
		'public' => true,
		'publicly_queryable' => false,
		'labels' => $labels,
		'menu_position' => 100,
		'capability_type' => 'post',
		'supports' => array('title'),
		'menu_icon' => plugins_url(). '/wp-chart-generator/images/chart.png',  // URL de l'image
    ));
?>