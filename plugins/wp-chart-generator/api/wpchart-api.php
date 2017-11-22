<?php
/**
Affiche le graphique correpondant à l'id du graphique passé en paramètre
Paramètre : graph_id -> Id du graphique à afficher
**/
function the_graphique($graph_id){
	if($graph_id != ''){
		$the_shortcode = get_post_meta($graph_id, 'wpchartgenerator_shortcode_result', true);
		echo do_shortcode($the_shortcode);
	}
}

?>