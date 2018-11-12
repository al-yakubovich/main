<?php Namespace ThemeForDummies_activate{
    if( is_multisite())
       return;
    


       
    if ( __NAMESPACE__ == 'BoatDealerPlugin_activate')
    {
        define(__NAMESPACE__ .'\PRODCLASS', "boat_dealer_plugin" );
        define(__NAMESPACE__ .'\VERSION', BOATDEALERPLUGINVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://BoatDealerPlugin.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Boat Dealer Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "LANGUAGE" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
     //   define(__NAMESPACE__ .'\OPTIN', "boat_dealer_plugin_optin" );
        define(__NAMESPACE__ .'\URL', BOATDEALERPLUGINURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_LANGUAGEplugin" );
    }
     elseif ( __NAMESPACE__ == 'AntiHacker_activate')
    {
        define(__NAMESPACE__ .'\PRODCLASS', "anti_hacker" );
        define(__NAMESPACE__ .'\VERSION', ANTIHACKERVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://AntiHackerPlugin.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Anti Hacker Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "antihacker" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
    //    define(__NAMESPACE__ .'\OPTIN', "anti_hacker_optin" );
        define(__NAMESPACE__ .'\URL', ANTIHACKERURL);
    //    define(__NAMESPACE__ .'\DINSTALL', "bill_installed_antihacker" );
    }
     elseif ( __NAMESPACE__ == 'ReportAttacks_activate')
    {
          
        define(__NAMESPACE__ .'\PRODCLASS', "report_attacks" );
        define(__NAMESPACE__ .'\VERSION', REPORTATTACKSVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://ReportAttacks.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Report Attacks Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "reportattacks" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
     //   define(__NAMESPACE__ .'\OPTIN', "report_attacks_optin" );
        define(__NAMESPACE__ .'\URL', REPORTATTACKSURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_reportattacks" );
    }
     elseif ( __NAMESPACE__ == 'StopBadBots_activate')
    {
          
        define(__NAMESPACE__ .'\PRODCLASS', "stop_bad_bots" );
        define(__NAMESPACE__ .'\VERSION', STOPBADBOTSVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://StopBadBots.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Stop Bad Bots Plugin" );
        define(__NAMESPACE__ .'\LANGUAGE', "stopbadbots" );
        define(__NAMESPACE__ .'\PAGE', "settings" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', STOPBADBOTSURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    }
      elseif ( __NAMESPACE__ == 'ThemeForDummies_activate')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'ACTIVATED_FORDUMMIES' );
        define(__NAMESPACE__ .'\VERSION', FORDUMMIESVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://ThemeForDummies.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme For Dummies" );
        define(__NAMESPACE__ .'\LANGUAGE', 'fordummies' );
        define(__NAMESPACE__ .'\PAGE', "for_dummies" );
        define(__NAMESPACE__ .'\OPTIN', "fordummies_optin" );
        define(__NAMESPACE__ .'\URL', FORDUMMIESURL);
    }  
      elseif ( __NAMESPACE__ == 'ThemeVerticalMenu_activate')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'ACTIVATED_VERTICALMENU' );
        define(__NAMESPACE__ .'\VERSION', VERTICALMENUVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://VerticalMenu.eu" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Vertical Menu" );
        define(__NAMESPACE__ .'\LANGUAGE', 'verticalmenu' );
        define(__NAMESPACE__ .'\PAGE', "vertical_menu" );
        define(__NAMESPACE__ .'\OPTIN', "verticalmenu_optin" );
        define(__NAMESPACE__ .'\URL', VERTICALMENUURL);
    } 
         elseif ( __NAMESPACE__ == 'ThemeBoatDealer_activate')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'ACTIVATED_BOATDEALER' );
        define(__NAMESPACE__ .'\VERSION', BOATDEALERVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://BoatDealerThemes.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Boat Dealer" );
        define(__NAMESPACE__ .'\LANGUAGE', 'boatdealer' );
        define(__NAMESPACE__ .'\PAGE', "boat_dealer" );
        define(__NAMESPACE__ .'\OPTIN', "boatdealer_optin" );
        define(__NAMESPACE__ .'\URL', BOATDEALERURL);
    }   

class Bill_Activate {
	function __construct() {
	   
		add_action( 'admin_menu', array( __CLASS__, 'init' ) );
	 	// add_action( 'wp_ajax_feedback',  array( __CLASS__, 'feedback' ) );
	}
	public static function init() {

   
        if(isset($_GET['page'] ))
        {
           $page = strip_tags($_GET['page'] );
           if ($page !=PAGE)
              return;
        }
        else
         return; 
         
         
   $activated = '';
   if(isset($_COOKIE[PRODCLASS]))
     {
      $host_name = trim(strip_tags($_SERVER['HTTP_HOST']));
      $host_name = strtolower($host_name);
      $mycookie = strip_tags($_COOKIE[PRODCLASS]);
      $pieces = explode("-", $mycookie);
      $cookie_domain = strip_tags(trim($pieces[1]));
      $activated = '';
          if(! empty($cookie_domain))
          {
            $pos = strpos($cookie_domain,$host_name);
            if( $pos !== false)
              $activated = strip_tags($pieces[0]);
          }
        
        // die($activated);
          
        if($activated == '0' or $activated == '1' )
        {
            if ( get_option( OPTIN ) !== false ) {
                // The option already exists, so we just update it.
                update_option( OPTIN, $activated );
            } else {
                // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                add_option( OPTIN, $activated );
            }
        }
     } // Cookie exist
     else
     {
           if ( get_option( OPTIN ) !== false ) {
                $activated =  get_option(OPTIN, '') ;
            } 
     }

 //  $activated = '';
 // die('activated: '.$activated);

 
  if ( $activated != '' )
     return; 

		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}
	public static function register() {
       
      $xpos =  stripos(PRODUCTNAME , 'theme');
      if($xpos === false)
       {
              wp_register_script( PRODCLASS.'_js', URL.'includes/feedback/activated-manager.js' , array(), VERSION , true );
              wp_register_style( PRODCLASS , URL.'includes/feedback/feedback-plugin.css');
       }
       else
       {
             wp_register_script( PRODCLASS.'_js', URL.'/js/activated-manager.js' , array(), VERSION , true );
       	     wp_register_style( PRODCLASS , URL.'/css/feedback-plugin.css');
       }
       
     //  die(PRODCLASS);
       
	}
    
	public static function enqueue() {
		wp_enqueue_script( PRODCLASS.'_js' );
  		wp_enqueue_style( PRODCLASS);

	}
    
    /*
	public static function feedback() {
		$feedback = sanitize_key( $_GET['feedback'] );
        // http://boatplugin.com/wp-admin/admin-ajax.php?action=vote&vote=no
		if ( !is_user_logged_in() || !in_array( $feedback, array( '0', '1' ) ) ) die( 'error' );
		$r = update_option( OPTIN, $feedback );
        if(!$r)
  	    	 add_option( OPTIN, $feedback );
     
		wp_die( 'OK: ' . $feedback  );
            
	}
    */
    
    
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
    $theme = wp_get_theme( );
    $themeversion = $theme->version ;
    $memory['limit'] = (int) ini_get('memory_limit') ;	
    $memory['usage'] = function_exists('memory_get_usage') ? round(memory_get_usage() / 1024 / 1024, 0) : 0;
    if (defined('WP_MEMORY_LIMIT')) 
        $memory['wplimit'] =  WP_MEMORY_LIMIT ;
    else
        $memory['wplimit'] = '';
 
 
   $xactivated =  get_option(OPTIN, '') ;
  
  
       
  ?>
  <div class="<?php echo PRODCLASS;?>"  style="display:none" >
              <div class="bill-vote-gravatar"><a href="http://profiles.wordpress.org/sminozzi" target="_blank"><img src="https://en.gravatar.com/userimage/94727241/31b8438335a13018a1f52661de469b60.jpg?size=100" alt="Bill Minozzi" width="70" height="70"></a></div>
		    	<div class="bill-vote-message">
                 <h4>Hey  <?php echo strtoupper($username);?></h4>
                 <br />
                 <?php _e("Hi, my name is Bill Minozzi, and I am developer of","fordummies");
                 echo ' '.PRODUCTNAME.'.'; ?>
                 <br />
                 Please help us improve our plugin.
                 If you opt-in, some not sensitive data about your usage of the plugin
                 will be sent to us just one time. If you skip this, that's okay!
                 <?php echo ' '.PRODUCTNAME.''; ?>
                 will still work just fine. 
                 <br /><br />             
                 <strong><?php _e("Thank You!","fordummies");?></strong>
                 <br /><br /> 
                 <br /><br /> 			
		    			<a href="#" class="button button-primary <?php echo PRODCLASS;?>-close-submit"><?php _e("Yes, Submit","fordummies");?></a>
                        <img alt="aux" src="/wp-admin/images/wpspin_light-2x.gif" id="imagewait" style="display:none" />
		    			<a href="#" class="button button-Secondary <?php echo PRODCLASS;?>-close-dialog"><?php _e("Skip","fordummies");?></a>
                        <input type="hidden" id="version" name="version" value="<?php echo $themeversion;?>" />
		                <input type="hidden" id="email" name="email" value="<?php echo $email;?>" />
		                <input type="hidden" id="username" name="username" value="<?php echo $username;?>" />
		                <input type="hidden" id="produto" name="produto" value="<?php echo PRODUCTNAME;?>" />
		                <input type="hidden" id="wpversion" name="wpversion" value="<?php echo $wpversion;?>" />
		                <input type="hidden" id="limit" name="limit" value="<?php echo $memory['limit'];?>" />
		                <input type="hidden" id="wplimit" name="wplimit" value="<?php echo $memory['wplimit'];?>" />
   		                <input type="hidden" id="usage" name="usage" value="<?php echo $memory['usage'];?>" />
		                <input type="hidden" id="billclass" name="billclass" value="<?php echo PRODCLASS;?>" />
		                <input type="hidden" id="xactivated" name="xactivated" value="<?php echo $xactivated;?>" />

                 <br /><br />
               </div>
    </div>
		<?php
	}
}
new Bill_Activate;
} // end Namespace ?>