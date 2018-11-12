<?php 
/**
 * @author William Sergio Minossi
 * @copyright 2017
 */
 

/*
 update_option('fordummies_optin', '');
 $activated =  get_option('fordummies_optin', '');
 die('act:'.$activated);
*/
 
// $activated = '';

ob_start();

$fordummies_old = get_site_option('fordummies_update_theme', '0');

if (isset($_COOKIE["bill_update_vm"]) ) {
    $host_name = trim(strip_tags($_SERVER['HTTP_HOST']));
    $host_name = strtolower($host_name);   
    $mycookie = $_COOKIE["bill_update_vm"];
    $pieces = explode("-", $mycookie);
    $cookie_domain = strip_tags(trim($pieces[1]));
    $fordummies_update_theme = '';
    if (!empty($cookie_domain)) {
        $pos = strpos($cookie_domain, $host_name);
        if ($pos !== false)
            $fordummies_update_theme = strip_tags($pieces[0]);
    }
    if ($fordummies_update_theme !== $fordummies_old) {
        if (get_option('fordummies_update_theme') !== false) {
            // The option already exists, so we just update it.
            update_option('fordummies_update_theme', $fordummies_update_theme);
        } else {
            // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
            add_option('fordummies_update_theme', $fordummies_update_theme);
        }
    }
    

} // Cookie exist


//  $fordummies_update_theme = '';
  
if ( get_option( 'fordummies_optin' ) !== false ) {
   $activated =  get_option('fordummies_optin', '') ;
} 


if (isset($_COOKIE["bill_activated_vm"]) and $activated != '1') {
    $host_name = trim(strip_tags($_SERVER['HTTP_HOST']));
    $host_name = strtolower($host_name);   
    $mycookie = $_COOKIE["bill_activated_vm"];
    $pieces = explode("-", $mycookie);
    $cookie_domain = strip_tags(trim($pieces[1]));
    $activated = '';
    if (!empty($cookie_domain)) {
        $pos = strpos($cookie_domain, $host_name);
        if ($pos !== false)
            $activated = strip_tags($pieces[0]);
    }
    if ($activated == '0' or $activated == '1') {
        if (get_option('fordummies_optin') !== false) {
            // The option already exists, so we just update it.
            update_option('fordummies_optin', $activated);
        } else {
            // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
            add_option('fordummies_optin', $activated);
        }
    }

} // Cookie exist


 //  $activated = '';


add_action( 'admin_menu', 'fordummies_add_admin_menu' );
add_action( 'admin_init', 'fordummies_settings_init' );
function fordummies_enqueue_scripts() {

          
        
        if(memory_status())
        {
           	wp_register_script( 'help-manager',FORDUMMIESURL.'/js/help-manager.js' , array( 'jquery' ), FORDUMMIESVERSION, true );
    		wp_enqueue_script( 'help-manager' );
         
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-dialog');
            wp_register_style( 'bill-jquery-help', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '20120208', 'all' );
            wp_enqueue_style( 'bill-jquery-help' );

        }
                   
        wp_register_script( 'fix-config-manager',FORDUMMIESURL.'/js/fix-config-manager.js' , array( 'jquery' ), FORDUMMIESVERSION, true );
    	wp_enqueue_script( 'fix-config-manager' );
 
        
      	wp_enqueue_style( 'bill-help' , FORDUMMIESURL.'/css/help.css');

    	wp_register_script( 'bill-lib',FORDUMMIESURL.'/js/bill-lib.js' , array( 'jquery' ), FORDUMMIESVERSION );
		wp_enqueue_script( 'bill-lib' );
        wp_register_style( 'bill-lib-css',FORDUMMIESURL.'/css/bill-lib.css', array(), '20170404');
        wp_enqueue_style( 'bill-lib-css' );
}
add_action('admin_init', 'fordummies_enqueue_scripts');
function fordummies_add_admin_menu(  ) { 
    global $vmtheme_hook;
    $vmtheme_hook = add_theme_page( 'For Dummies', 'For Dummies Help', 'manage_options', 'for_dummies', 'fordummies_options_page' );
    add_action('load-'.$vmtheme_hook, 'vmtheme_contextual_help');     
}
function fordummies_settings_init(  ) { 
	register_setting( 'fordummies', 'fordummies_settings' );
}
function fordummies_options_page(  ) { 
    global $activated, $fordummies_update_theme;
 
            $wpversion = get_bloginfo('version');
            $current_user = wp_get_current_user();
            $plugin = plugin_basename(__FILE__); 
            $email = $current_user->user_email;
            $username =  trim($current_user->user_firstname);
            $user = $current_user->user_login;
            $user_display = trim($current_user->display_name);
            if(empty($username))
               $username = $user;
            if(empty($username))
               $username = $user_display;
            $theme = wp_get_theme( );
            $themeversion = $theme->version ; 
            $memory['limit'] = (int) ini_get('memory_limit') ;	
            $memory['usage'] = function_exists('memory_get_usage') ? round(memory_get_usage() / 1024 / 1024, 0) : 0;
            $memory['wplimit'] =  WP_MEMORY_LIMIT ;
         
            $fordummiesmypath = FORDUMMIESURL.'/inc/fixconfig.php';
            $verticalmeurlkey = urlencode(substr(NONCE_KEY,0,10));
            $fordummiesmyrestore = FORDUMMIESURL.'/public/restore-config.php?key='.$verticalmeurlkey;
             
  ?>
  
    <!-- ///////////// Fix Config /////////////////  -->


    <div id="themefix-wpconfig" style="display: none;">
    <div class="bill-faq-fordummies-wrap" style="">
    <div class="themefix-message" style="">
     
     If your server allow us, we can try to fix your file wp-config.php to release more memory.
     <br />
     <strong>Please, copy the url blue below to safe place before to proceed.</strong>
     
     <br />  
     Use the url only to undo this operation if you've problem accessing your site after the update.
     <br />
     <br />
     After Copy the URL, click UPDATE to proceed or Cancel to abort.
     <br />   <br />
     <textarea rows="3" id="restore_wpconfig" name="restore_wpconfig" style="width:100%; color: blue;" ><?php echo $fordummiesmyrestore;?></textarea>
     <textarea rows="6" id="feedback_wpconfig" name="feedback_wpconfig" style="width:100%; font-weight: bold;" ></textarea>

                 <?php
                 if($activated != '1' )
                 {
  ?>
                    <br /><br /> 
                 <!--    <input type="checkbox" class="anonymous20" value="anonymous" /><small>Participate anonymous <?php _e("(In this case, we are unable to email you)","fordummies");?></small> -->
           <?php } ?>  
                 <br /><br /> 			
		    			<a href="#" class="button button-primary button-close-wpconfig"><?php _e("Update","fordummies");?></a>
		    			<a href="#" class="button button-primary button-cancell-wpconfig"><?php _e("Cancel","fordummies");?></a>

                        <img alt="aux" src="/wp-admin/images/wpspin_light-2x.gif" id="bill-imagewait20" />
		                <input type="hidden" id="email" name="email" value="<?php echo $email;?>" />
   		                <input type="hidden" id="url_config" name="url_config" value="<?php echo $fordummiesmypath;?>" />
  		                <input type="hidden" id="verticalmeurlkey" name="verticalmeurlkey" value="<?php echo $verticalmeurlkey;?>" />


                 <br /><br />
     </div>
    </div>
  </div>
<!-- ///////////// End Fix config /////////////////  -->


    <!-- Support -->

  
  <div class="bill-support-fordummies" style="display:none">
              <div class="bill-vote-gravatar"><a href="http://profiles.wordpress.org/sminozzi" target="_blank"><img src="https://en.gravatar.com/userimage/94727241/31b8438335a13018a1f52661de469b60.jpg?size=100" alt="Bill Minozzi" width="70" height="70"></a></div>
		    	<div class="bill-vote-message">
                 <h4><?php _e("Send  messages to our Technical Support","fordummies");?></h4>
                 <?php _e("Please, follow this instructions:","fordummies");?>
                 <br />
                 <?php _e("1- No javascript, php or html code.","fordummies");?>
                 <br />
                 <?php _e("2- Try to explain as clearly as you can the issue you are having and what you were trying to do when the problem occurred.","fordummies");?>
                 <br /><br />
                 <?php _e("Our support center works Monday - Friday (9:00 to 17:00) and we are in Europe (London time zone) Please give us 1 business day to answer.","fordummies");?>
                 <br /><br />
 
                 <strong>
                 
                 <?php _e("* Check your email account","fordummies"); echo ': '.$email;?>
                 <br />
                 <?php _e("(also SPAM FOLDER) for our response.","fordummies");?>
              
                 
                 </strong>
                 <br /><br /> 
                 <textarea rows="4" cols="50" id="explanation" name="explanation" placeholder="<?php _e("type here your question...","fordummies");?>" ></textarea>
  
                 <br /><br /> 			
		    			<a href="#" class="button button-primary button-close-spsubmit"><?php _e("Yes, Submit","fordummies");?></a>
                        <img alt="aux" src="/wp-admin/images/wpspin_light-2x.gif" id="fordummies-imagewait3" style="visibility:hidden" />
		    			<a href="#" class="button button-Secondary button-close-spdialog"><?php _e("Cancel","fordummies");?></a>
                        <input type="hidden" id="version" name="version" value="<?php echo $themeversion;?>" />
		                <input type="hidden" id="email" name="email" value="<?php echo $email;?>" />
		                <input type="hidden" id="username" name="username" value="<?php echo $username;?>" />
		                <input type="hidden" id="produto" name="produto" value="fordummies" />
		                <input type="hidden" id="wpversion" name="wpversion" value="<?php echo $wpversion;?>" />
   		                <input type="hidden" id="activated" name="activated" value="<?php echo $activated;?>" />
		                <input type="hidden" id="limit" name="limit" value="<?php echo $memory['limit'];?>" />
		                <input type="hidden" id="wplimit" name="wplimit" value="<?php echo $memory['wplimit'];?>" />
   		                <input type="hidden" id="usage" name="usage" value="<?php echo $memory['usage'];?>" />
                 <br /><br />
               </div>
    </div>
    
    <!-- Feedback -->
      
      <div class="bill-feedback-fordummies" style="display:none">
              <div class="bill-vote-gravatar"><a href="http://profiles.wordpress.org/sminozzi" target="_blank"><img src="https://en.gravatar.com/userimage/94727241/31b8438335a13018a1f52661de469b60.jpg?size=100" alt="Bill Minozzi" width="70" height="70"></a></div>
		    	<div class="bill-vote-message">
                 <h4><?php _e("Please, let us know you, your site and your feedback.","fordummies");?></h4>
                 <?php _e("Hi, my name is Bill Minozzi, and I am developer of theme fordummies.","fordummies");?>
                 <br />
                 <?php _e("We appreciate your help in making our theme better.","fordummies");?>
                 <br />
                 <?php _e("We are building the best service we can for you but we can't promise it will be perfect or if we will include all suggestions.","fordummies");?>
                 <br /><br />             
                 <strong><?php _e("Thank You!","fordummies");?></strong>
                 <br /><br /> 
                 <textarea rows="4" cols="50" id="explanationfb" name="explanation" placeholder="<?php _e("type here yours sugestions ...","fordummies");?>" ></textarea>
                 <?php

                 if($activated != '1' )
                 {
                    
  ?>
                    <br /><br /> 
                    <input type="checkbox" class="anonymous2" value="anonymous" /><small>Participate anonymous <?php _e("(In this case, we are unable to email you)","fordummies");?></small>
           <?php } ?>  
                 <br /><br /> 			
		    			<a href="#" class="button button-primary button-close-fbsubmit"><?php _e("Yes, Submit","fordummies");?></a>
                        <img alt="aux" src="/wp-admin/images/wpspin_light-2x.gif" id="fordummies-imagewait2" style="visibility:hidden" />
		    			<a href="#" class="button button-Secondary button-close-fbdialog"><?php _e("Cancel","fordummies");?></a>
                        <input type="hidden" id="version" name="version" value="<?php echo $themeversion;?>" />
		                <input type="hidden" id="email" name="email" value="<?php echo $email;?>" />
		                <input type="hidden" id="username" name="username" value="<?php echo $username;?>" />
		                <input type="hidden" id="produto" name="produto" value="fordummies" />
		                <input type="hidden" id="wpversion" name="wpversion" value="<?php echo $wpversion;?>" />
		                <input type="hidden" id="limit" name="limit" value="<?php echo $memory['limit'];?>" />
		                <input type="hidden" id="wplimit" name="wplimit" value="<?php echo $memory['wplimit'];?>" />
   		                <input type="hidden" id="usage" name="usage" value="<?php echo $memory['usage'];?>" />
                 <br /><br />
               </div>
    </div>
    
    <!-- Begin Page -->
    
<div id = "fordummies-theme-help-wrapper">   
  
   
     <div id="fordummies-not-activated"></div>
         
     <div id="fordummies-logo">
       <img  alt="aux" id="fordummies-logo-image" src="<?php echo get_template_directory_uri()?>/images/logo.png" />
     </div>
     <div id="fordummies_help_title">
         Help and Support Page
     </div> 
     
    
 <?php
if( isset( $_GET[ 'tab' ] ) ) 
    $active_tab = strip_tags($_GET[ 'tab' ]);
else
   $active_tab = 'dashboard';
?>
    
    <h2 class="nav-tab-wrapper">
    <a href="?page=for_dummies&tab=dashboard" class="nav-tab">Dashboard</a>
    <a href="?page=for_dummies&tab=faq" class="nav-tab">Faq</a>
    <a href="?page=for_dummies&tab=memory" class="nav-tab">Memory</a>
    <a href="?page=for_dummies&tab=freebies" class="nav-tab">Freebies</a>

    </h2>
 
    
<?php  if($active_tab == 'memory') {     

   require_once (FORDUMMIESPATH . '/inc/memory.php');
	
} 
elseif($active_tab == 'faq')
{ 
    require_once (FORDUMMIESPATH . '/inc/faq.php');
}
elseif($active_tab == 'freebies')
{ 
    require_once (FORDUMMIESPATH . '/inc/freebies.php');
}
else
{ 
    require_once (FORDUMMIESPATH . '/inc/dashboard.php');
}



 echo '</div> <!-- "fordummies-theme_help-wrapper"> -->';

} // end Function fordummies_options_page

function vmtheme_contextual_help()
{
    if(!memory_status())
      return;
    
    
    $screen = get_current_screen();
    $myhelp = '<br><big>';
    $myhelp .= __('For Dummies is a responsive and not intimidating, easy-to-use WordPress theme.',
        'fordummies');
    $myhelp .= '<br />';
    $myhelp .= __('You can find also our complete Theme OnLine Guide', 'fordummies').' ';
    $myhelp .= '<a href="http://themefordummies.com/help/index.html" target="_self"> ';
    $myhelp .= __('here', 'fordummies');
    $myhelp .= '.</a></big>';
    $options = '<big><br />';  
    $options.= __('Theme For Dummies has an advanced panel that is loaded with options.', 'fordummies');
    $options .= '<br />';
    $options .= __("Go to Appearance > Customize and take a look. We've organized them into logical sets and have given  descriptions for items that need it, most things are self explanatory. Be sure to hit Save Changes to save your settings once you are done.", 'fordummies');
    $options .= '<br /></big>';
    $home = '<big><br />';  
    $home .= __("Once you have created your home page, you need to select it to show up as the home page. To do this, follow the steps below.", 'fordummies');
    $home .= '<br />';
    $home .= __("Navigate to Settings > Reading", 'fordummies');
    $home .= '<br />';
    $home .= __("Select A Static Page for Front Page Displays", 'fordummies');
    $home .= '<br />';
    $home .= __("Select your new home page for the Front Page", 'fordummies');
    $home .= '<br />';
    $home .= __("This is also the same spot you select the Blog page", 'fordummies');
    $home .= '<br />';
    $home .= __("Save", 'fordummies');
    $home .= '<br /></big>'; 
    $menu = '<big><br />';  
    $menu .= __("Go to Dashboard  Appearence => Customize  => Menus and setup the menu.", 'fordummies');
    $menu .= '<br />';
    $menu .= __("Here is the wordpress help:", 'fordummies');
    $menu .= '<br />';
    $menu .= '<a href="https://codex.wordpress.org/WordPress_Menu_User_Guide">';
    $menu .= __("https://codex.wordpress.org/WordPress_Menu_User_Guide", 'fordummies');
    $menu .= '</a><br /></big>';    
    $logo = '<big><br />';  
    $logo .= __("Go to Dashboard  Appearence => Customize  => Site Identity and setup the logo.", 'fordummies');
    $logo .= '<br />';
    $topinfo = '<big><br />';  
    $topinfo .= __("Go to Dashboard  Appearence => Customize => Theme  Options => Top Page Settings.", 'fordummies');
    $topinfo .= '<br />';
    $footer = '<big><br />';  
    $footer .= __("Go to Dashboard  Appearence => Customize => Theme Options => Footer Copyright.", 'fordummies');
    $footer .= '<br />';
    $screen->add_help_tab(array(
        'id' => 'bd-overview-tab',
        'title' => __('Overview', 'fordummies'),
        'content' => '<p>' . $myhelp . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab2',
        'title' => __('Theme Options', 'fordummies'),
        'content' => '<p>' . $options . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab4',
        'title' => __('Setting up the Home', 'fordummies'),
        'content' => '<p>' . $home . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab5',
        'title' => __('Setting up the Menu', 'fordummies'),
        'content' => '<p>' . $menu . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab6',
        'title' => __('Setting up te Logo', 'fordummies'),
        'content' => '<p>' . $logo . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab7',
        'title' => __('Setting Top Info', 'fordummies'),
        'content' => '<p>' . $topinfo . '</p>',
        ));
        $screen->add_help_tab(array(
        'id' => 'bd-overview-tab8',
        'title' => __('Footer Copyright', 'fordummies'),
        'content' => '<p>' . $footer . '</p>',
        ));
 }
ob_end_clean();
?>
