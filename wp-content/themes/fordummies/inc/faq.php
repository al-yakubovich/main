<?php
/**
 * @author William Sergio Minossi
 * @copyright 2017
 */
 
 if(! memory_status())
 {
    echo '<h3>Theme for Dummies Running in Save Memory Mode.</h3>';
    return;
  }   
      
?>
    <div id="fordummies-faq-page">
        <div class="fordummies-block-title"> 
               Faq Page
        </div>
    <div class="bill-faq-fordummies-wrap" style="">
     <div class="bill-faq-fordummies" style="">
     Please, help us to create this FAQ (Frequent Asked Questions) page.
     <br /><br />
     Just add your question, we will send you the response by email and add here next version.
     <br />
     Please, give us 1 business day and check your email:&nbsp;<b><?php echo $email;?></b>
     <br />
     Check also your spam folder.
     <br />
     We are in West Europe (London time). Our business hours: 9 to 17H. (Monday-Friday)
     <br /><br />
     <textarea rows="6" id="explanationfaq" name="explanation" placeholder="<?php _e("type here your question ...","fordummies");?>" style="width:100%;" ></textarea>
                 <?php
                 if($activated != '1' )
                 {
  ?>
                    <br /><br /> 
                    <input type="checkbox" class="anonymous20" value="anonymous" /><small>Participate anonymous <?php _e("(In this case, we are unable to email you)","fordummies");?></small>
           <?php } ?>  
                 <br /><br /> 			
		    			<a href="#" class="button button-primary button-close-faqsubmit"><?php _e("Submit","fordummies");?></a>
                        <img alt="aux" src="/wp-admin/images/wpspin_light-2x.gif" id="fordummies-imagewait20" style="visibility:hidden" />
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
  </div>