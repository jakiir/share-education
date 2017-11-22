<?php 
	$type = get_post_type_object($post->post_type);
	if(!current_user_can($type->cap->edit_post))
	{
		return $post_id;
	}

	if(!wp_verify_nonce($_POST['wpchartgenerator_nonce'],'wpchartgenerator'))
	{
		return $post_id;
	}

    $data_size = $_POST['wpchart_countdata'];
    $data = array();
    for($i=1; $i <= $data_size; $i++){
    	if(empty($_POST['wpchartgenerator_legende_'.$i.'']) 
    		|| empty($_POST['wpchartgenerator_value_'.$i.''])
    			|| empty($_POST['wpchartgenerator_color_'.$i.''])
    	)
    	{
    		break;
    	}
    	else{
    		/*update_post_meta($post_id,'_wpchartgenerator_legende_'.$i.'',$_POST['wpchartgenerator_legende_'.$i.'']);
    		update_post_meta($post_id,'_wpchartgenerator_value_'.$i.'',$_POST['wpchartgenerator_value_'.$i.'']);
    		update_post_meta($post_id,'_wpchartgenerator_color_'.$i.'',$_POST['wpchartgenerator_color_'.$i.'']);*/
            $wpchart_the_data = array($_POST['wpchartgenerator_legende_'.$i.''],$_POST['wpchartgenerator_value_'.$i.''],$_POST['wpchartgenerator_color_'.$i.'']);
            array_push($data, $wpchart_the_data);
    	}	
    }

    update_post_meta($post_id,'wpchartgenerator_data',$data);

    generate_shortcode();

    function generate_shortcode(){
    	 $post_id = get_the_ID();
    	 $meta = get_post_meta($post_id, 'wpchartgenerator_data', true);
         if(!empty($meta)):
    	 foreach ($meta as $key => $value) {
    	 
            // Traite uniquement les valeurs pour le graphique

    	 		$data .= $value[1].',';

    	 		$legende .= $value[0].',';

    	 		$color .= $value[2].',';
    	 }

    	 $data = substr($data, 0, -1);
    	 $legende = substr($legende, 0, -1);
    	 $color = substr($color, 0, -1);
    	 $titlegraf = get_the_title();

    	 $shortcode = '[wpchart title="'.$titlegraf.'" data="'.$data.'" legende="'.$legende.'" color="'.$color.'" size=400x300 ]';
    	 update_post_meta($post_id,'wpchartgenerator_shortcode_result',$shortcode);
         endif;
    }

   // [chart data=&nbsp;»41.52,37.79,20.67,0.03″ bg=&nbsp;»F7F9FA&nbsp;» labels=&nbsp;»Reffering+sites|Search+Engines|Direct+traffic|Other&nbsp;» colors=&nbsp;»058DC7,50B432,ED561B,EDEF00″ size=&nbsp;»488×200″ title=&nbsp;»Traffic Sources&nbsp;» type=&nbsp;»pie&nbsp;»]
?>