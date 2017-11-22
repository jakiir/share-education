<?php
/*
Plugin Name: Wp chart generator

Description: Plugin permettant de générer facilement des graphiques à intégrer au sein de votre blog. Les graphiques de type "Pie Chart" uniquement utilise l'API de google.
Version: 1.0.4
Author: Emilien Laborde
Author URI: http://emilien-laborde.fr
License: GPLv2
*/

/**
 Définition de quelques constantes utiles
 **/
define('PLUGIN_DIR', ABSPATH . 'wp-content/plugins/wp-chart-generator');
define('INCLUDES', PLUGIN_DIR.'/includes');

add_action('init','wpchartgenerator_init');
add_action('add_meta_boxes','wpchartgenerator_metaboxes');
add_action('save_post','wpchartgenerator_generateshortcode',10,2);
add_shortcode('wpchart','wpchartgenerator_displayshortcode');

load_plugin_textdomain('wcg', false, dirname(plugin_basename(__FILE__)) . '/lang');

add_action( 'wp_ajax_nowdeletemeta', 'wpchart_deletepostmeta' );
function wpchart_deletepostmeta(){
  //require_once (INCLUDES . '/save-chart.php');
  $post_id = $_POST['postid'];
  $i = $_POST['iddonnee'];
  $nonce = $_POST['nonce'];
  if ( ! wp_verify_nonce( $nonce, 'wpchartgenerator' ) ){
     die();
  }
  if(isset($post_id) && $post_id != ''){
    //echo $iddonnee;

    $meta_values = get_post_meta($post_id, 'wpchartgenerator_data', true);
    $number_meta = sizeof($meta_values);
    $data = array();
    unset($meta_values[$i - 1]);

    update_post_meta($post_id,'wpchartgenerator_data',$meta_values);

  }
  die();
}

require_once(PLUGIN_DIR . '/api/wpchart-api.php');

/**
 Permet d'initialiser les fonctionnalités liées aux graphiques
**/
function wpchartgenerator_init()
{
  require_once (INCLUDES . '/post-type.php');
  // Localization
  
}

function wpchartgenerator_metaboxes()
{
  require_once (INCLUDES . '/metaboxes.php');
  require_once (INCLUDES . '/save-chart.php');
  generate_shortcode();
}

function wpchartgenerator_generateshortcode($post_id,$post)
{
  require_once (INCLUDES . '/save-chart.php');
}

function array_combine_($keys, $values)
{
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
    return    $result;
}

wp_enqueue_script(
    'wp-chart-script',
    plugins_url() . '/wp-chart-generator/js/wp-chart-script.js',
    array( 'jquery' )
);

wp_localize_script( 'wp-chart-script', 'objectL10n', array(
  'DonneeT' => __('Donnée','wcg'),
  'LegendeT' => __('Légende *','wcg'),
  'valeurT' => __('Valeur *','wcg'),
  'couleurT' => __('Couleur *','wcg'),
  'supprimerT' => __('Supprimer','wcg'),
  'copieokT' => __('Shortcode copié dans le presse papier','wcg'),
  'copieT' => __('Copier le shortcode','wcg')
) );

wp_enqueue_script(
    'spectrum',
    plugins_url() . '/wp-chart-generator/js/spectrum.js',
    array( 'jquery' )
);

wp_enqueue_script(
    'wp-chart-zclip',
    plugins_url() . '/wp-chart-generator/js/jquery.zclip.min.js',
    array( 'jquery' )
);

wp_enqueue_script(
    'wp-chart-deletemeta',
    plugins_url() . '/wp-chart-generator/js/delete-metabox.js',
    array( 'jquery' )
);

function posttype_admin_css() {
global $post_type;
if($post_type == 'graphique') {
echo '<style type="text/css">#edit-slug-box,#view-post-btn,#post-    preview,.updated p a{display: none;}</style>';
}
}
add_action('admin_head', 'posttype_admin_css');


// register acf styles
$styles = array(
  'wpchart' => plugins_url() . '/wp-chart-generator/css/wp-chart.css',
  'wpchart-field-group' => plugins_url() . '/wp-chart-generator/css/wp-chart-fields.css',
  'spectrum' => plugins_url() . '/wp-chart-generator/css/spectrum.css',
);
    
foreach( $styles as $k => $v )
{
  wp_register_style( $k, $v, false, '1.0' );
  wp_enqueue_style( $k ); 
}

// register acf styles
$styles = array(
  'wpchart' => plugins_url() . '/wp-chart-generator/css/wp-chart.css',
  'wpchart-field-group' => plugins_url() . '/wp-chart-generator/css/wp-chart-fields.css',
);
    
foreach( $styles as $k => $v )
{
  wp_register_style( $k, $v, false, '1.0' );
  wp_enqueue_style( $k ); 
}

function wpchartgenerator_displayshortcode($atts)
{
  extract(shortcode_atts(array( 
    'data' =>'', 
    'color' => '', 
    'size' => '400x200', 
    'title' => '', 
    'legende' => '')
  ,$atts));

  $datas = explode(",", $data);

  $legendes = explode(",", esc_attr($legende));

  $colors = explode(',', $color);
  //$c = array_combine($legendes,$datas);
  $c = array();
    foreach ($legendes as $i => $key) {
    $c[] = array($key => $datas[$i]);
  }

  ?>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
        <?php
        foreach ($c as  $in => $v) {
          foreach ($v as  $k => $value){ ?>
            [<?php echo "'$k'" ?>, <?php echo $value ?>],
          <?php }
        } ?>
        ]);

        // Set chart options
        var options = {'title': <?php echo "'$title'" ?>,
                 'legend':'right',
                 'colors': [<?php foreach ($colors as  $k => $value) { echo "'$value',"; }?>],
                 'is3D':true,
                       'width':400,
                       'height':300};

        var id_graph = "chart_div_<?php echo strtolower(str_replace(' ', '_',$title)) ?>";

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById(id_graph));
        chart.draw(data, options);
      }
    </script>

    <div class="wp_chart" id="chart_div_<?php echo strtolower(str_replace(' ', '_',$title)) ?>"></div>
    <?php
}
