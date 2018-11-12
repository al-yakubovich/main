<?php  Namespace ForDummies_last_feedback{
    if( is_multisite())
       return;

    if ( __NAMESPACE__ == 'BoatDealerPlugin_last_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', "boat_dealer_plugin" );
        define(__NAMESPACE__ .'\VERSION', BOATDEALERPLUGINVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://BoatDealerPlugin.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Boat Dealer Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "fordummies" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
        define(__NAMESPACE__ .'\OPTIN', "boat_dealer_plugin_optin" );
        define(__NAMESPACE__ .'\URL', BOATDEALERPLUGINURL);
    }
     elseif ( __NAMESPACE__ == 'AntiHacker_last_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', "anti_hacker" );
        define(__NAMESPACE__ .'\VERSION', ANTIHACKERVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://AntiHackerPlugin.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Anti Hacker Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "antihacker" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
        define(__NAMESPACE__ .'\OPTIN', "anti_hacker_optin" );
        define(__NAMESPACE__ .'\URL', ANTIHACKERURL);
    }
     elseif ( __NAMESPACE__ == 'ReportAttacks_last_feedback')
    {
          
        define(__NAMESPACE__ .'\PRODCLASS', "report_attacks" );
        define(__NAMESPACE__ .'\VERSION', REPORTATTACKSVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://ReportAttacks.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Report Attacks Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "reportattacks" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
        define(__NAMESPACE__ .'\OPTIN', "report_attacks_optin" );
        define(__NAMESPACE__ .'\URL', REPORTATTACKSURL);
    }
     elseif ( __NAMESPACE__ == 'StopBadBots_last_feedback')
    {
          
        define(__NAMESPACE__ .'\PRODCLASS', "stop_bad_bots" );
        define(__NAMESPACE__ .'\VERSION', STOPBADBOTSVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://StopBadBots.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Stop Bad Bots Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "stopbadbots" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
        define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', STOPBADBOTSURL);
    }
    elseif ( __NAMESPACE__ == 'ForDummies_last_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', "for_dummies" );
        define(__NAMESPACE__ .'\VERSION', FORDUMMIESVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://ThemeForDummies.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme For Dummies" );
        define(__NAMESPACE__ .'\LANGUAGE', "fordummies" );
     //   define(__NAMESPACE__ .'\PAGE', "for_dummies" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', FORDUMMIESURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    } 
    elseif ( __NAMESPACE__ == 'VerticalMenu_feedback_last')
    { 
        define(__NAMESPACE__ .'\PRODCLASS', "vertical_menu" );
        define(__NAMESPACE__ .'\VERSION', VERTICALMENUVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://VerticalMenu.eu" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Vertical Menu" );
        define(__NAMESPACE__ .'\LANGUAGE', "verticalmenu" );
     //   define(__NAMESPACE__ .'\PAGE', "for_dummies" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', VERTICALMENUURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    }
     elseif ( __NAMESPACE__ == 'BoatDealer_feedback_last')
    { 
        define(__NAMESPACE__ .'\PRODCLASS', "boat_dealer" );
        define(__NAMESPACE__ .'\VERSION', BOATDEALERVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://BoatDealerThemes.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Boat Dealer" );
        define(__NAMESPACE__ .'\LANGUAGE', "fordummies" );
     //   define(__NAMESPACE__ .'\PAGE', "for_dummies" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', BOATDEALERURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    }
 class Bill_Config {
    
     protected static $namespace = __NAMESPACE__;
     protected static $bill_plugin_url = URL;
     protected static $bill_class = PRODCLASS;
     protected static $bill_prod_veersion = VERSION;
 
	function __construct() {
		add_action( 'admin_menu', array( __CLASS__, 'init' ) );
	 //	add_action( 'wp_ajax_bill_feedback',  array( __CLASS__, 'feedback' ) );
	}
	public static function init() {
		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}
	public static function register() {
   
   
       $productname = strtolower(PRODUCTNAME);
       $pos =  strpos($productname,'theme');
       if($pos !== false)
       {
       	   wp_enqueue_style( PRODCLASS , URL.'/css/feedback-plugin.css');
     	   wp_register_script( PRODCLASS, URL.'/js/feedback-last-theme.js' , array( 'jquery' ), VERSION , true );
 
       }
       else
       {
       	   wp_enqueue_style( PRODCLASS , URL.'includes/feedback/feedback-plugin.css');
     	   wp_register_script( PRODCLASS, URL.'includes/feedback/feedback-last.js' , array( 'jquery' ), VERSION , true );
       }
	}
	public static function enqueue() {
		wp_enqueue_style( PRODCLASS );
		wp_enqueue_script( PRODCLASS );
	}
   	public static function message() {
        
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
    $memory['limit'] = (int) ini_get('memory_limit') ;	
    $memory['usage'] = function_exists('memory_get_usage') ? round(memory_get_usage() / 1024 / 1024, 0) : 0;
    if(defined('WP_MEMORY_LIMIT'))
       $memory['wplimit'] =  WP_MEMORY_LIMIT ;
    else
       $memory['wplimit'] = '';
    $theme = wp_get_theme( );
    $themeversion = $theme->version ;
?>  
		   <div class="<?php echo PRODCLASS;?>-wrap-deactivate" style="display:none">
              <div class="bill-vote-gravatar"><a href="http://profiles.wordpress.org/sminozzi" target="_blank"><img src="https://en.gravatar.com/userimage/94727241/31b8438335a13018a1f52661de469b60.jpg?size=100" alt="Bill Minozzi" width="70" height="70"></a></div>
		    	<div class="bill-vote-message">
                 <h4><?php _e("If you have a moment, Please, let us know you and why you are deactivating.","fordummies");?></h4>
                 <?php _e("Hi, my name is Bill Minozzi, and I am developer of","fordummies");
                 echo ' ' . PRODUCTNAME;
                 echo '. ';                
                 ?>
                 <br />
                 <?php _e("If you Kindly tell us the reason so we can improve it and maybe give some support by email to you.","fordummies");?>
                 <br /><br />             
                 <strong><?php _e("Thank You!","fordummies");?></strong>
                 <br /><br /> 
                 <textarea rows="4" cols="50" id="<?php echo PRODCLASS;?>-explanation" name="explanation" placeholder="<?php _e("type here yours sugestions ...","fordummies");?>" ></textarea>
                 <br /><br /> 
                 <input type="checkbox" class="anonymous" value="anonymous" /><small>Participate anonymous <?php _e("(In this case, we are unable to email you)","fordummies");?></small>
                 <br /><br /> 			
		    			<a href="#" class="button button-primary <?php echo PRODCLASS;?>-close-submit"><?php _e("Yes, Submit and Deactivate","fordummies");?></a>
                        <img src="/wp-admin/images/wpspin_light-2x.gif" id="imagewaitfbl" style="display:none" />
		    			<a href="#" class="button <?php echo PRODCLASS;?>-close-dialog"><?php _e("Cancel Deactivation","fordummies");?></a>
		    			<a href="#" class="button <?php echo PRODCLASS;?>-deactivate"><?php _e("No, Just Deactivate it","fordummies");?></a>
                        <input type="hidden" id="<?php echo PRODCLASS;?>-version" name="version" value="<?php echo VERSION;?>" />
		                <input type="hidden" id="email" name="email" value="<?php echo $email;?>" />
		                <input type="hidden" id="username" name="username" value="<?php echo $username;?>" />
		                <input type="hidden" id="wpversion" name="wpversion" value="<?php echo $wpversion;?>" />
		                <input type="hidden" id="limit" name="limit" value="<?php echo $memory['limit'];?>" />
		                <input type="hidden" id="wplimit" name="wplimit" value="<?php echo $memory['wplimit'];?>" />
   		                <input type="hidden" id="usage" name="usage" value="<?php echo $memory['usage'];?>" />
		                <input type="hidden" id="billclass" name="billclass" value="<?php echo PRODCLASS;?>" />
		                <input type="hidden" id="billlanguage" name="billlanguage" value="<?php echo LANGUAGE;?>" />
		                <input type="hidden" id="produto" name="produto" value="<?php echo PRODUCTNAME;?>" />
		                <input type="hidden" id="tversion" name="tversion" value="<?php echo $themeversion;?>" />
                 <br /><br />
               </div>
         </div> 
		<?php
	}
 }
 new Bill_Config;
} // End Namespace ...
?>