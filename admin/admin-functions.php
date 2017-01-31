<?php

/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/

function tz_head() { do_action( 'tz_head' ); }


/*-----------------------------------------------------------------------------------*/
/* Get the style path currently selected */
/*-----------------------------------------------------------------------------------*/

function tz_style_path() {
    $style = $_REQUEST['style'];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = get_option('tz_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}


/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','tz_option_setup');
}

function tz_option_setup(){

	//Update EMPTY options
	$tz_array = array();
	add_option('tz_options',$tz_array);

	$template = get_option('tz_template');
	$saved_options = get_option('tz_options');
	
	foreach($template as $option) {
		if($option['type'] != 'heading'){
			$id = $option['id'];
			$std = $option['std'];
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$tz_array[$c_id] = $c_std; 
					}
				} else {
					update_option($id,$std);
					$tz_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$tz_array[$id] = $db_option;
			}
		}
	}
	update_option('tz_options',$tz_array);
}

?>