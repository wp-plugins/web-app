<?php
/**
 * Plugin Name: Web App
 * Description: Create your splash screens for web apps at a glance
 * Version: 1.0.6
 * Author: Pixelonce
 * Author URI: http://www.pixelonce.com
 * Text Domain: web-app
 * Domain Path: localization/
 */

defined('ABSPATH') or die("No script kiddies please!");

/* Register de Plugin in the Admin Menu */
add_action( 'admin_menu', 'web_app_menu' );
function web_app_menu(){
	add_menu_page('Web App', 'Web App', 'manage_options', 'web-app-apple', 'display_admin_page', 'dashicons-smartphone');
	add_submenu_page( 'web-app-apple', 'Apple Web App Splashes', 'Apple', 'manage_options', 'web-app-apple', 'display_admin_page' );
	/*
add_submenu_page( 'web-app-apple', 'Android Web App Splashes', 'Android', 'manage_options', 'web-app-android', 'display_admin_page' );
	add_submenu_page( 'web-app-apple', 'Windows Phone Web App Splashes', 'Windows Phone', 'manage_options', 'web-app-windows', 'display_admin_page' );
*/
}
/*  Register settings link */
add_filter('plugin_action_links', 'web_app_settings_link', 2, 2);
function web_app_settings_link($actions, $file) {
	if(false !== strpos($file, 'web-app'))
		$actions['settings'] = '<a href="admin.php?page=web-app-apple">'.__('Settings','web-app').'</a>';
	return $actions;
}



/* SETTINGS */
add_action( 'admin_init', 'register_web_app_settings' );
function register_web_app_settings() {
  register_setting('web_app_options','web_app_options');

	add_settings_section('web_app_general', __('General Options','web-app'), 'web_app_general', 'web-app-apple');
	add_settings_field('web_app_general_text',__('Title','web-app'), 'web_app_text_input', 'web-app-apple', 'web_app_general', array('id' => 'web_app_general_text'));

	add_settings_section('web_app_icon', 'iOS Icon', 'web_app_icon', 'web-app-apple');
	add_settings_field('web_app_ios_icon_60', 'Icon 60px', 'web_app_image_input', 'web-app-apple', 'web_app_icon', array('id' => 'web_app_ios_icon_60', 'size' => '60x60'));
	add_settings_field('web_app_ios_icon_60_2x', 'Icon 60px @2x', 'web_app_image_input', 'web-app-apple', 'web_app_icon', array('id' => 'web_app_ios_icon_60_2x', 'size' => '120x120'));
	add_settings_field('web_app_ios_icon_60_3x', 'Icon 60px @3x', 'web_app_image_input', 'web-app-apple', 'web_app_icon', array('id' => 'web_app_ios_icon_60_3x', 'size' => '180x180'));
	add_settings_field('web_app_ios_icon_76', 'Icon 76px', 'web_app_image_input', 'web-app-apple', 'web_app_icon', array('id' => 'web_app_ios_icon_76', 'size' => '76x76'));
	add_settings_field('web_app_ios_icon_76_2x', 'Icon 76px @2x', 'web_app_image_input', 'web-app-apple', 'web_app_icon', array('id' => 'web_app_ios_icon_76_2x', 'size' => '152x152'));

	add_settings_section('web_app_iphone_splash', 'iPhone Splash', 'web_app_iphone_splash', 'web-app-apple');
	add_settings_field('web_app_ios_splash_iphone3', 'iPhone 3 | 3G', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone3', 'size' => '320x460'));
	add_settings_field('web_app_ios_splash_iphone4', 'iPhone 4 | 4S', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone4', 'size' => '640x920'));
	add_settings_field('web_app_ios_splash_iphone5', 'iPhone 5 | 5S', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone5', 'size' => '640x1096'));
	add_settings_field('web_app_ios_splash_iphone6_portrait', 'iPhone 6 Portrait', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone6_portrait', 'size' => '750x1294'));
	add_settings_field('web_app_ios_splash_iphone6_landscape', 'iPhone 6 Landscape', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone6_landscape', 'size' => '710x1334'));
	add_settings_field('web_app_ios_splash_iphone6plus_portrait', 'iPhone 6+ Portrait', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone6plus_portrait', 'size' => '1242x2148'));
	add_settings_field('web_app_ios_splash_iphone6plus_landscape', 'iPhone 6+ Landscape', 'web_app_image_input', 'web-app-apple', 'web_app_iphone_splash', array('id' => 'web_app_ios_splash_iphone6plus_landscape', 'size' => '1182x2208'));

	add_settings_section('web_app_ipad_splash', 'iPad Splash', 'web_app_ipad_splash', 'web-app-apple');
	add_settings_field('web_app_ios_splash_ipad_portrait', 'iPad Portrait', 'web_app_image_input', 'web-app-apple', 'web_app_ipad_splash', array('id' => 'web_app_ios_splash_ipad_portrait', 'size' => '768x1004'));
	add_settings_field('web_app_ios_splash_ipad_landscape', 'iPad Landscape', 'web_app_image_input', 'web-app-apple', 'web_app_ipad_splash', array('id' => 'web_app_ios_splash_ipad_landscape', 'size' => '748x1024'));
	add_settings_field('web_app_ios_splash_ipad_retina_portrait', 'iPad Retina Portrait', 'web_app_image_input', 'web-app-apple', 'web_app_ipad_splash', array('id' => 'web_app_ios_splash_ipad_retina_portrait', 'size' => '1536x2008'));
	add_settings_field('web_app_ios_splash_ipad_retina_landscape', 'iPad Retina Landscape', 'web_app_image_input', 'web-app-apple', 'web_app_ipad_splash', array('id' => 'web_app_ios_splash_ipad_retina_landscape', 'size' => '1496x2048'));
}

/* description text */
function web_app_general(){
	?>
	<?php
}
function web_app_icon(){
	?>
	<?php
}
function web_app_iphone_splash(){
	?>
	<?php
}
function web_app_ipad_splash(){
	?>
	<?php
}


/* INPUTS */
function web_app_text_input(array $args){
	$options = get_option('web_app_options');
	$url = (isset($options[$args['id']])) ? $options[$args['id']] : '';
	$url = esc_textarea($url); //sanitise output
?>
	<input id="<?php echo $args['id']?>" type="text" size="36" name="web_app_options[<?php echo $args['id']?>]" value="<?php echo $url; ?>" />
<?php
}

function web_app_image_input(array $args){
	$options = get_option('web_app_options');
	$url = (isset($options[$args['id']])) ? $options[$args['id']] : '';
	$url = esc_textarea($url); //sanitise output
?>
	<input id="<?php echo $args['id']?>" type="text" size="36" name="web_app_options[<?php echo $args['id']?>]" value="<?php echo $url; ?>" />
 	<input class="img_button" data-rel="<?php echo $args['id']?>" type="button" value="<?php _e('Upload Image','web-app');?>" />
 	<span class="size"><?php echo $args['size'];?>px</span>
<?php
}


/* ADMIN PAGE */
function my_admin_scripts() {
	wp_enqueue_media();
	wp_register_script('web-app',  plugins_url().'/web-app/web-app.js', array('jquery'));
	wp_enqueue_script('web-app');
}
function my_admin_styles() {
	wp_register_style('web-app',  plugins_url().'/web-app/web-app.css', array());
	wp_enqueue_style('web-app');
}

if (isset($_GET['page'])) {
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}

$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain('web-app','wp-content/plugins/'.$plugin_dir.'/localization',$plugin_dir.'/localization');


function display_admin_page(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}?>
	<div id="web-app" class="wrap">
		<?php screen_icon();?>
		<a href="http://www.pixelonce.com" target="_blank">
			<h1>
				<span class="logo">pixel<span style="color:#bada55;">o</span><span style="color:#95ad4b;">n</span><span style="color:#708239;">c</span><span style="color:#4a5625;">e</span>
			</h1>
		</a>
		<?php	if (isset($_GET['page']) & $_GET['page']=='web-app-apple'){?>
			<form id="web_app_options" action="options.php" method="post">
			<?php
				settings_fields('web_app_options');
				do_settings_sections($_GET['page']);
				submit_button(__('Save options','web-app'), 'primary', 'web_app_options_submit');
			?>
			</form>
		<?php }	else{ ?>
			<div><?php _e('Coming soon','web-app'); ?></div>
		<?php }	?>
	</div>
	<?php
}

/* WORDPRESS HEAD HOOK */
add_action('wp_head', 'web_app_add_meta');
function web_app_add_meta(){

	$options = get_option('web_app_options');

	/* GENERAL */
	$general_title = (isset($options['web_app_general_text'])) ? $options['web_app_general_text'] : '';

	/* ICON */
	$icon60 = (isset($options['web_app_ios_icon_60'])) ? $options['web_app_ios_icon_60'] : '';
	$icon60_2x = (isset($options['web_app_ios_icon_60_2x'])) ? $options['web_app_ios_icon_60_2x'] : '';
	$icon60_3x = (isset($options['web_app_ios_icon_60_3x'])) ? $options['web_app_ios_icon_60_3x'] : '';
	$icon76 = (isset($options['web_app_ios_icon_76'])) ? $options['web_app_ios_icon_76'] : '';
	$icon76_2x = (isset($options['web_app_ios_icon_76_2x'])) ? $options['web_app_ios_icon_76@_2x'] : '';

	/* IPHONE */
	$iphone3 = (isset($options['web_app_ios_splash_iphone3'])) ? $options['web_app_ios_splash_iphone3'] : '';
	$iphone4 = (isset($options['web_app_ios_splash_iphone4'])) ? $options['web_app_ios_splash_iphone4'] : '';
	$iphone5 = (isset($options['web_app_ios_splash_iphone5'])) ? $options['web_app_ios_splash_iphone5'] : '';
	$iphone6_portrait = (isset($options['web_app_ios_splash_iphone6_portrait'])) ? $options['web_app_ios_splash_iphone6_portrait'] : '';
	$iphone6_landscape = (isset($options['web_app_ios_splash_iphone6_landscape'])) ? $options['web_app_ios_splash_iphone6_landscape'] : '';
	$iphone6plus_portrait = (isset($options['web_app_ios_splash_iphone6plus_portrait'])) ? $options['web_app_ios_splash_iphone6plus_portrait'] : '';
	$iphone6plus_landscape = (isset($options['web_app_ios_splash_iphone6plus_landscape'])) ? $options['web_app_ios_splash_iphone6plus_landscape'] : '';

	/* IPAD */
	$ipad_portrait = (isset($options['web_app_ios_splash_ipad_portrait'])) ? $options['web_app_ios_splash_ipad_portrait'] : '';
	$ipad_landscape = (isset($options['web_app_ios_splash_ipad_landscape'])) ? $options['web_app_ios_splash_ipad_landscape'] : '';
	$ipad_retina_portrait = (isset($options['web_app_ios_splash_ipad_retina_portrait'])) ? $options['web_app_ios_splash_ipad_retina_portrait'] : '';
	$ipad_retina_landscape = (isset($options['web_app_ios_splash_ipad_retina_landscape'])) ? $options['web_app_ios_splash_ipad_retina_landscape'] : '';

	wp_register_script('web-app-navigation',  plugins_url().'/web-app/navigation.min.js', array('jquery'));
	wp_enqueue_script('web-app-navigation');

	?>

	<!-- Load It Like A Native App -->
	<?php if ($general_title != '') { ?><meta name="apple-mobile-web-app-title" content="<?php echo $general_title;?>"><?php } ?>
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- ICONOS IPHONE/IPAD WEB APP -->
	<?php if ($icon60 != '') { ?><link href="<?php echo esc_attr($icon60); ?>" sizes="60x60" rel="apple-touch-icon-precomposed"/><?php } ?>
	<?php if ($icon60_2x != '') { ?><link href="<?php echo esc_attr($icon60_2x); ?>" sizes="120x120" rel="apple-touch-icon-precomposed"/><?php } ?>
	<?php if ($icon60_3x != '') { ?><link href="<?php echo esc_attr($icon60_3x); ?>" sizes="180x180" rel="apple-touch-icon-precomposed"/><?php } ?>
	<?php if ($icon76 != '') { ?><link href="<?php echo esc_attr($icon76); ?>" sizes="76x76" rel="apple-touch-icon-precomposed"/><?php } ?>
	<?php if ($icon76_2x != '') { ?><link href="<?php echo esc_attr($icon76_2x); ?>" sizes="152x152" rel="apple-touch-icon-precomposed"/><?php } ?>

	<!-- /* iPad Retina */ -->
	<?php if ($ipad_retina_portrait != '') { ?><link href="<?php echo esc_attr($ipad_retina_portrait); ?>" rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<?php if ($ipad_retina_landscape != '') { ?><link href="<?php echo esc_attr($ipad_retina_landscape); ?>" rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<!-- /* iPad Non-Retina */ -->
	<?php if ($ipad_portrait != '') { ?><link href="<?php echo esc_attr($ipad_portrait); ?>" rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" ><?php } ?>
	<?php if ($ipad_landscape != '') { ?><link href="<?php echo esc_attr($ipad_landscape); ?>" rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)"><?php } ?>

	<!-- iPhone 6 Retina -->
	<?php if ($iphone6_portrait != '') { ?><link href="<?php echo esc_attr($iphone6_portrait); ?>" rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<?php if ($iphone6_landscape != '') { ?><link href="<?php echo esc_attr($iphone6_landscape); ?>" rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<!-- iPhone 6 Plus Retina -->
	<?php if ($iphone6plus_portrait != '') { ?><link href="<?php echo esc_attr($iphone6plus_portrait); ?>" rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 3)"><?php } ?>
	<?php if ($iphone6plus_landscape != '') { ?><link href="<?php echo esc_attr($iphone6plus_landscape); ?>" rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 3)"><?php } ?>

	<!-- /* iPhone 5 Retina */ -->
	<?php if ($iphone5 != '') { ?><link href="<?php echo esc_attr($iphone5); ?>" rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<!-- /* iPhone 4 Retina */ -->
	<?php if ($iphone4 != '') { ?><link href="<?php echo esc_attr($iphone4); ?>" rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"><?php } ?>
	<!-- /* iPhone 3 and 4 Non-Retina */ -->
	<?php if ($iphone3 != '') { ?><link href="<?php echo esc_attr($iphone3); ?>" rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)"><?php } ?>

	<?php
}
