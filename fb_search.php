<?php
/*
  Plugin Name: fb search
  Plugin URI: http://none.none
  Description: creates a link for FB search.
  Version: 1.0.3
  Author: Crock
  Author URI: http://none.none
 */
function init_scripts() {
wp_enqueue_script( 'fb', plugin_dir_url( __FILE__ ) . 'fb.js', array( 'jquery' ));
wp_register_style( 'prefix-style', plugins_url('fb.css', __FILE__) );
wp_enqueue_style( 'prefix-style' );
//wp_localize_script( 'fb', 'fb_searchajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	
	
	
	
}
add_action('wp_enqueue_scripts','init_scripts');


add_action('admin_menu', 'admin_menu');

function admin_menu() {
	add_menu_page('registration', 'FB search', 'manage_options', __FILE__, 'admin_page');
}

add_action( "wp_ajax_myaction", "return_form_function" );
add_action( "wp_ajax_nopriv_myaction", "return_form_function" );



function admin_page () {
  echo '<div class="wrap">';
	echo '<p>shortcode: [fb_search]  or for use in Themes php code: echo do_shortcode("[fb_search]"); </p>';
	echo '</div>';
}



function _form() {
   
    echo '<div>
    <input id="create" type="submit" name="submit" value="Открыть генератор"/>
	</div>
  <form id="fb" action="">
<div>    
	<div class="born">
    <label for="born1"> Рожденные с</label>
    <input id="born1" type="text" name="born1" value="">
	</div>
	<div class="born">
	<label  for="born2"> Рожденные до</label>
    <input id="born2" type="text" name="born2" value="">
    </div>
</div>   
    <div>
    <label for="sex">Пол</label>
    <select id="sex" name="sex">
		<option value="dnm">Не важно</option>
		<option value="females">Женский</option>
		<option value="males">Мужской</option>
		
	</select>
    </div>
  
	
<div>
    <div class="pre_footer">
    <label for="time1">Time</label>
    <select id="time1" name="time1">
		<option value="prORpa">Не важно</option>
		<option value="present">Сейчас</option>
		<option value="past">В прошлом</option>
		
	</select>
    </div>
    <div class="pre_footer">
    <label for="param1">Параметр</label>
    <select id="param1" name="param1">
		<option value="students">Студент</option>
		<option value="major/students">Специализация</option>
		<option value="employees">Должность</option>
		<option value="visitor">Посетитель</option>
		<option value="speakers">Говорящий</option>
		<option value="likes">Нравится</option>
		<option value="resident">Проживает</option>
		<option value="home-resident">Родной город</option>
	</select>
	</div>
	<div  class="pre_footer"><input id="incl_param1" type="text" name="incl_param1" value=""></div>
</div>

<div>
	<div class="pre_footer">
    <label for="time2">Время</label>
    <select id="time2" name="time2">
		<option value="prORpa">Не важно</option>
		<option value="present">Сейчас</option>
		<option value="past">В прошлом</option>
		
	</select>
    </div>
	<div class="pre_footer">
	<label for="param2">Параметр</label>
    <select id="param2" name="param2">
		<option value="students">Студент</option>
		<option value="major/students">Специализация</option>
		<option value="employees">Должность</option>
		<option value="visitor">Посетитель</option>
		<option value="speakers">Говорящий</option>
		<option value="likes">Нравится</option>
		<option value="resident">Проживает</option>
		<option value="home-resident">Родной город</option>
	</select>
	</div>
	<div  class="pre_footer"><input id="incl_param2" type="text" name="incl_param2" value=""></div>
</div>
<div>	
	<div class="pre_footer">
    <label for="time3">Время</label>
    <select id="time3" name="time3">
		<option value="prORpa">Не важно</option>
		<option value="present">Сейчас</option>
		<option value="past">В прошлом</option>
		
	</select>
    </div>
	<div class="pre_footer">
	<label for="param3">Параметр</label>
    <select id="param3" name="param3">
		<option value="students">Студент</option>
		<option value="major/students">Специализация</option>
		<option value="employees">Должность</option>
		<option value="visitor">Посетитель</option>
		<option value="speakers">SГоворящий</option>
		<option value="likes">Нравится</option>
		<option value="resident">Проживает</option>
		<option value="home-resident">Родной город</option>
	</select>
	</div>
	<div  class="pre_footer"><input id="incl_param3" type="text" name="incl_param3" value=""></div>
</div >

 </form>
    ';
	echo '<div  id="result_link"></div>';
	echo '<div id="buttons" style="display:none"><button id="copy_btn" type="button">Скопировать ссылку</button><button id="open_btn" type="button">Открыть ссылку в другом окне</button></div>';
}




// Register a new shortcode: [fb_search]
add_shortcode( 'fb_search', 'fb_search_shortcode' );
 
// The callback function that will replace [book]
function fb_search_shortcode() {
    ob_start();
    _form();
    return ob_get_clean();
}

?>
