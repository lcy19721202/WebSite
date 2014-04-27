<?php
/**
 *
  Template Name: Contact Page
 *
 */
?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
$captcha_option = inkthemes_get_option('inkthemes_recaptcha_option'); // captcha on or off
$captcha_option_on = "on";
if ($captcha_option === $captcha_option_on) {
    require_once('functions/recaptchalib.php');
    $privatekey = inkthemes_get_option('recaptcha_private');

    if (isset($_POST["recaptcha_response_field"])) {
        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
        if (!$resp->is_valid) {
            $captchaError = 'The captcha was incorrect.';
            $hasError = true;
        }
    }
} else {
    
} //captcha on-off and end captcha
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[Wordpress] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>
<?php get_header(); ?>

<!-- blog title -->
<div class="homepage_nav_title section" id="contact">
    <div class="container_24">
        <div class="index_titles blog single"><?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?></div>
    </div>
</div>
<div class="clear"></div>
<!-- blog title ends -->

<div class="blog_pages_wrapper default_bg">
    <div class="container_24">
        <div class="grid_24">
            <div class="grid_16 alpha">
                <!-- Start the Loop. -->

                <!--post start-->
                <div class="content-bar">
                    <div class="contact_page"> 
                        <h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php if (isset($emailSent) && $emailSent == true) { ?>
                            <div class="thanks">
                                <p>Thanks, your email was sent successfully.</p>
                            </div>
<?php } else { ?>
    <?php if (isset($hasError) || isset($captchaError)) { ?>
                                <p class="error">Sorry, an error occured. </p>
                            <?php } ?>
                            <form class="contactform" id="contactForm" action="<?php the_permalink(); ?>" method="post">
                                <label>Name <span class="required"></span></label>
                                <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName']))
                            echo $_POST['contactName'];
                        ?>" class="text required requiredField" />
                                       <?php if ($nameError != '') { ?>
                                    <span class="error"> <?php echo $nameError; ?> </span>                           
                                       <?php } ?>
                                <br/>
                                <label>Email <span class="required"></span></label>
                                <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))
                                       echo $_POST['email'];
                                   ?>" class="text required requiredField email" />
                                       <?php if ($emailError != '') { ?>
                                    <span class="error"> <?php echo $emailError; ?> </span>                            
                                <?php } ?>

                                <br/>
                                <label class="last-label">Your Message <span class="required"></span></label>
                                <textarea name="comments" id="commentsText" rows="10" cols="25" class="required requiredField message"><?php
                                if (isset($_POST['comments'])) {
                                    if (function_exists('stripslashes')) {
                                        echo stripslashes($_POST['comments']);
                                    } else {
                                        echo $_POST['comments'];
                                    }
                                }
                                ?></textarea>
                                    <?php if ($commentError != '') { ?>
                                    <span class="error"> <?php echo $commentError; ?> </span>
                                <?php } ?>
                                <br/>
                                <?php
                                $captcha_option = inkthemes_get_option('inkthemes_recaptcha_option'); // captcha on or off
                                $captcha_option_on = "on";
                                if ($captcha_option === $captcha_option_on) {
                                    require_once('functions/recaptchalib.php');
                                    $publickey = inkthemes_get_option('recaptcha_public'); // you got this from the signup page
                                    echo recaptcha_get_html($publickey);
                                    ?>
                                    <?php if ($captchaError != '') { ?>
                                        <span class="error"> <?php echo $captchaError; ?> </span>                            
                                    <?php }
                                } else {
                                    
                                } //captcha on-off and end captcha  ?>
                                <input  class="btnSubmit" type="submit" name="submit" value="Submit"/>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                            </form>  
<?php } ?>		  
                    </div>
                </div>
                <!--End Post-->
                <div class="clear"></div>
            </div>
            <!--Sidebar-->
            <div class="grid_8 omega">
                <!--Start Sidebar-->
<?php get_sidebar(); ?>
                <!--End Sidebar-->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>