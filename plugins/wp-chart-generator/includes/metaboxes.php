<?php 
add_meta_box('wpchartgeneratorshortcode',__('Shortcode généré','wcg'),'wpchartgenerator_shortcode','graphique','side','core');
	add_meta_box('wpchartgeneratordata',__('Données du graphique','wcg'),'wpchartgenerator_metaboxe','graphique','normal','high');
	
	/**
	Fonction permettant d'afficher le rendu html de la metabox
	**/
	function wpchartgenerator_metaboxe($object){
		wp_nonce_field('wpchartgenerator','wpchartgenerator_nonce');
		?>
		<input type="hidden" value="" id="wpchart_countdata" name="wpchart_countdata">
		<input type="hidden" value="<?php echo admin_url('admin-ajax.php'); ?>" id="admin-ajax-url" name="admin-ajax-url">
		<input type="hidden" value="<?php echo get_the_ID(); ?>" id="post_id_chart" name="post_id_chart">
		<div class="data-content">
		<?php 
		//$meta = get_post_meta( get_the_ID());
		$meta_values = get_post_meta(get_the_ID(), 'wpchartgenerator_data', true);
		$number_meta = sizeof($meta_values);
		$i = 1;
		if(!empty($meta_values)):
		foreach ($meta_values as $key => $value) {
		?>
		<div class="wp-chart-groupfield" id="<?php echo $i; ?>">
			<div class="wp-chart-titlefield">
				<?php _e('Donnée','wcg'); ?> <?php echo $i; ?>
				<span id="wp-chart-deletefield"><a href="#"><?php _e('Supprimer','wcg'); ?></a></span>
			</div>
			<div class="line">
				<label for="wpchartgenerator_legende_<?php echo $i; ?>"><?php _e('Légende *','wcg'); ?></label>
				<input type="text" id="wpchartgenerator_legende_<?php echo $i; ?>" name="wpchartgenerator_legende_<?php echo $i; ?>" style="width:100%;" value="<?= esc_attr($value[0]); ?>">
			</div>

			<div class="line">
					<label for="wpchartgenerator_value_<?php echo $i; ?>"><?php _e('Valeur *','wcg'); ?></label>
					<input type="number" id="wpchartgenerator_value_<?php echo $i; ?>" name="wpchartgenerator_value_<?php echo $i; ?>" style="width:100%;" value="<?= esc_attr($value[1]); ?>">
			</div>

			<div class="line">
					<label for="wpchartgenerator_color_<?php echo $i; ?>"><?php _e('Couleur *','wcg'); ?></label>
					<input class="color-picker" type="text" id="wpchartgenerator_color_<?php echo $i; ?>" name="wpchartgenerator_color_<?php echo $i; ?>" style="width:100%;" value="<?= esc_attr($value[2]); ?>">
			</div>
		</div>
			<?php
			$i++;
		}
		endif;
		?>
		</div>
		<div class="button-add-wp-chart-groupfield">
			<a href="#"><?php _e('Ajouter une nouvelle donnée au graphique','wcg') ?></a>
		</div>
		<?php
	}

	function wpchartgenerator_shortcode($object){
		?>
		<div class="meta-box-item-content">
			<?php if(get_post_meta($object->ID,'wpchartgenerator_shortcode_result',true) != ''): ?>
				<p>
				<i><?php _e('Copiez-collez ce shortcode dans un de vos articles et il affichera un graphique correspondant aux valeurs ci-contre','wcg'); ?></i>
				</p>
			<?php else: ?>
				<p>
				<i><?php _e('Le shortcode se générera automatiquement lorsque vous aurez sauvegardez les informations relatives au graphiqe.','wcg'); ?></i>
				</p>
			<?php endif; ?>
			<textarea id="wpchartgenerator_shortcode" rows="4" readonly style="width:98%" name="wpchartgenerator_shortcode"><?= esc_attr(get_post_meta($object->ID,'wpchartgenerator_shortcode_result',true)); ?></textarea>
			<p><a href="#" class="wpchart-copyshortcode"><?php _e('Copier le shortcode','wcg'); ?></a></p>
		</div>
		<?php
	}
?>