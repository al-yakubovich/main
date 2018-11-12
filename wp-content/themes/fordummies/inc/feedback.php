<?php  Namespace ForDummies_feedback{
    
    if( is_multisite())
       return;
       
    if ( __NAMESPACE__ == 'BoatDealerPlugin_feedback')
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
     elseif ( __NAMESPACE__ == 'AntiHacker_feedback')
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
     elseif ( __NAMESPACE__ == 'ReportAttacks_feedback')
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
     elseif ( __NAMESPACE__ == 'StopBadBots_feedback')
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
      elseif ( __NAMESPACE__ == 'ForDummies_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'fordummies' );
        define(__NAMESPACE__ .'\VERSION', FORDUMMIESVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://ThemeForDummies.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme For Dummies" );
        define(__NAMESPACE__ .'\LANGUAGE', 'fordummies' );
        define(__NAMESPACE__ .'\PAGE', "for_dummies" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', FORDUMMIESURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    } 
      elseif ( __NAMESPACE__ == 'VerticalMenu_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'vertical_menu' );
        define(__NAMESPACE__ .'\VERSION', VERTICALMENUVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://VerticalMenu.eu" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Vertical Menu" );
        define(__NAMESPACE__ .'\LANGUAGE', 'verticalmenu' );
        define(__NAMESPACE__ .'\PAGE', "vertical_menu" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', VERTICALMENUURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    } 
      elseif ( __NAMESPACE__ == 'BoatDealer_feedback')
    {
        define(__NAMESPACE__ .'\PRODCLASS', 'boat_dealer' );
        define(__NAMESPACE__ .'\VERSION', BOATDEALERVERSION );
        define(__NAMESPACE__ .'\PLUGINHOME', "http://BoatDealerThemes.com" );
        define(__NAMESPACE__ .'\PRODUCTNAME', "Theme Boat Dealer" );
        define(__NAMESPACE__ .'\LANGUAGE', 'fordummies' );
        define(__NAMESPACE__ .'\PAGE', "boat_dealer" );
     //   define(__NAMESPACE__ .'\OPTIN', "stop_bad_bots_optin" );
        define(__NAMESPACE__ .'\URL', BOATDEALERURL);
     //   define(__NAMESPACE__ .'\DINSTALL', "bill_installed_stopbadbots" );
    }    
       
     
    // somente um, por enquanto
    define(__NAMESPACE__ .'\OPTIN', "bill-vote" );
    define(__NAMESPACE__ .'\DINSTALL', "bill_installed" );
    
class Bill_Vote {
	function __construct() {
		add_action( 'admin_menu', array( __CLASS__, 'init' ) );
	 	add_action( 'wp_ajax_vote',  array( __CLASS__, 'vote' ) );
	}
	public static function init() {
        if(isset($_GET['page'] ))
        {
           $page = strip_tags($_GET['page'] );
           if ($page != PAGE)
              return;
        }
        else
         return;
         
	$vote = get_option( OPTIN );
        // $vote = '';
        // die('vote: '.$vote);
        // yes
		$timeout = time() > ( get_option( 'bill_installed' ) + 60*60*24*3 );
 		if ( in_array( $vote, array( 'yes', 'no', 'tweet' ) ) || !$timeout ) return;
		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}
	public static function register() {
      $xpos =  stripos(PRODUCTNAME , 'theme');
      if($xpos === false)
       {
   	         wp_register_script( PRODCLASS.'_js', URL.'includes/feedback/feedback.js' , array(), VERSION , true );
             wp_register_style( PRODCLASS , URL.'includes/feedback/feedback-plugin.css');
       }
       else
       {
           wp_register_script( PRODCLASS.'_js', URL.'/js/feedback.js' , array(), VERSION , true );
       	   wp_register_style( PRODCLASS , URL.'/css/feedback-plugin.css');
       }
	}
	public static function enqueue() {
		wp_enqueue_script( PRODCLASS.'_js' );
  		wp_enqueue_style( PRODCLASS);

	}
	public static function vote() {
		$vote = sanitize_key( $_GET['vote'] );
        // http://boatplugin.com/wp-admin/admin-ajax.php?action=vote&vote=no
		if ( !is_user_logged_in() || !in_array( $vote, array( 'yes', 'no', 'later' ) ) ) die( 'error' );
		$r = update_option( OPTIN, $vote );
        if(!$r)
  	    	 add_option( OPTIN, $vote );
     
    	if ( $vote === 'later' ) update_option( DINSTALL, time() );
		      wp_die( 'OK: ' . $vote );
            
	}
	public static function message() {
?>
		<div class="<?php echo PRODCLASS;?>-wrap-vote" style="display:none">
				<div class="bill-vote-gravatar"><a href="http://profiles.wordpress.org/sminozzi" target="_blank"><img src="https://en.gravatar.com/userimage/94727241/31b8438335a13018a1f52661de469b60.jpg?size=100" alt="<?php echo __( 'Bill Minozzi', 'fordummies' ); ?>" width="70" height="70"></a></div>
				<div class="bill-vote-message">
					<p>
                    <?php 
                       echo __( 'Hello, my name is Bill Minozzi, and I am developer of', 'fordummies');
                       echo ' ' . PRODUCTNAME;
                       echo '. ';
                       echo __( 'If you like this product, please write a few words about it. It will help other people find this useful plugin more quickly.<br><b>Thank you!</b>', 'fordummies'); ?></p>
					<p>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=vote&amp;vote=yes" class="bill-vote-action button button-medium button-primary" data-action="<?php echo PLUGINHOME;?>/share/"><?php echo __( 'Rate or Share', 'fordummies' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=vote&amp;vote=no" class="bill-vote-action button button-medium"><?php echo __( 'No, dismiss', 'fordummies'); ?></a>
<span><?php echo __( 'or', 'fordummies'); ?></span>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=vote&amp;vote=later" class="bill-vote-action button button-medium"><?php echo __( 'Remind me later', 'fordummies'); ?></a>
				        <input type="hidden" id="billclassvote" name="billclassvote" value="<?php echo PRODCLASS;?>" />
				        <input type="hidden" id="billclassvote" name="billclassvote" value="<?php echo PRODCLASS;?>" />
                    </p>
				</div>
		</div>
		<?php
	}
}
new Bill_Vote;
}