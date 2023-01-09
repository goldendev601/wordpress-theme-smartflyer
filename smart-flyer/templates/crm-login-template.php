<?php
/*
Template Name: CRM Login Template
*/
?>
 <?php  get_header(); ?>
<style>
    .wp-container { background-size: cover; background-position: center; text-align: center; position: relative; z-index: 1; }
    .wp-container:after { content: ''; background-color: #1D3C86; mix-blend-mode: multiply; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1; }
    body { margin: 0; box-sizing: border-box; }
    .coming-soon-title-wrapper { width: 100%; margin-top: 22vh; text-align: center; }
    .coming-soon-title { font-family: 'Canela'; font-style: normal; font-weight: 300; font-size: 64px; line-height: 78px; text-align: center; letter-spacing: 0.03em; color: #FFFFFF; }
    .coming-soon-footer { margin-top: 48px; width: 100%; text-align: center; }
    .coming-soon-footer-text { font-family: 'Trade Gothic LT Pro'; font-style: normal; font-weight: 700; font-size: 10px; line-height: 8px; text-align: center; color: #FFFFFF; }
    .social-icons-container { width: 100%; text-align: center; }
    .social-icons-wrapper { display: flex; justify-content: space-between; width: 100px; margin: 0 auto; }
    .login-footer { position: absolute; bottom: 20px; }
    .main-wrap-container { display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; }
    .main-wrap-container .logo-wrapper { position: absolute; top: 5%; width: 100%; text-align: center; }
    .login-form-section ul li { list-style: none; }
    header { position: absolute; top: 0; left: 0; right: 0; }
    .wp-container { height: 100vh; }
    .login-form-section ul { padding: 0; margin: 0; border-top: 12px solid #1D3C86; background: #FFFFFF; box-shadow: 0px 10px 70px rgba(0, 0, 0, 0.25); width: 100%; max-width: 598px; margin: 0 auto; }
    .login-form-section { width: 100%; }
    .login-form-section form { text-align: left; margin: 0; }
    ::-webkit-input-placeholder {   /* Edge */
    color: rgb(0 0 0 / 20%); }
    :-ms-input-placeholder {    /* Internet Explorer 10-11 */
    color: rgb(0 0 0 / 20%); }
    ::placeholder { color: rgb(0 0 0 / 20%); }
    .login-form-section label { letter-spacing: 0.14em; text-transform: uppercase; color: #000000; opacity: 0.7; font-family: 'Trade Gothic LT Pro Cn'; font-style: normal; font-weight: 700; font-size: 14px; line-height: 17px; width: 100%; display: inline-block; }
    .login-form-section ul { padding: 50px; }
    .login-form-section input[type="text"], .login-form-section input[type="password"] { width: 100%; border: none; border-bottom: 1px solid rgb(0 0 0 / 60%); font-family: 'Trade Gothic LT Pro Cn'; font-style: normal; font-weight: 700; font-size: 14px; line-height: 17px; padding: 15px 15px 15px 32px; background-color: #fff !important; color: rgb(0 0 0) !important; }
    .input-type { display: flex; align-items: center; position: relative; }
    .input-type img { position: absolute; }
    .login-form-section h1 { font-size: 34px; line-height: 48px; padding-bottom: 32px; color: #242424; }
    .input-type #togglePassword, .forgot-pass a { cursor: pointer; position: absolute; color: #1D3C86; letter-spacing: 0.14em; text-transform: uppercase; right: 0; font-family: Trade Gothic LT Pro Cn; font-style: normal; font-weight: 700; font-size: 14px; line-height: 17px; }
    .forgot-pass a { position: inherit; padding-top: 3px; }
    .forgot-pass { text-align: right; padding-top: 26px; display: flex; align-items: center; justify-content: space-between; }
    input:-internal-autofill-selected { background-color: #fff !important; }
     .login-form-section .submit-btns a{background: #1D3C86;width: 114px;cursor: pointer;height: 41px;text-align: center;font-family: 'Trade Gothic LT Pro Cn';font-style: normal;font-weight: 700;font-size: 14px;line-height: 17px;color: #FFFFFF;letter-spacing: 0.12em;text-transform: uppercase;border: none;padding: 15px 15px 12px 18px;display: inline-block;}
    .login-form-section .submit-btns { text-align: right; padding-top: 53px; }
    .login-form-section .user-anme { padding-bottom: 50px; }
    .form-group input { padding: 0; height: initial; width: initial; margin-bottom: 0; display: none; cursor: pointer; }
    .form-group label { position: relative; cursor: pointer; padding-left: 10px; }
    .form-group label:before { left: -10px; content: ""; -webkit-appearance: none; background-color: transparent; border: 1px solid rgba(0, 0, 0, 0.7); box-shadow: 0 1px 2px rgb(0 0 0 / 5%), inset 0px -15px 10px -12px rgb(0 0 0 / 5%); padding: 6px; display: inline-block; position: relative; vertical-align: middle; cursor: pointer; margin-right: 5px; top: -2px; }
    .form-group input:checked + label:after { content: ""; display: block; position: absolute; top: 1px; left: 5px; width: 3px; height: 7px; border: solid rgba(0, 0, 0, 0.7); border-width: 0 2px 2px 0; transform: rotate(45deg); }

    /*.login-form-section input[type="password"] {color: transparent !important;}*/
    .input-type-password span#dummy { position: absolute; top: 12px; left: 33px; font-size: 38px; }
    .bi-eye-slash.bi-eye:after { content: 'hide'; }
    .bi-eye-slash { font-size: 0; }
    .bi-eye-slash:after { content: 'Show'; font-size: 14px; }
    .bi-eye-slash:before { font-size: 14px; }
    .bi-eye-slash { font-size: 0px !important; }
    .input-type img { filter: grayscale(1); }
    .error label { color: #F02323; opacity: 1; }
    .error #togglePassword { color: #F02323; }
    .error  input[type="text"], .error  
    input[type="password"] { border-color: #F02323; }
    .error .forgot-pass label { color: #000000; opacity: 0.7; }
    .error-massage { max-width: 380px; background: #F02323; box-shadow: 0px 10px 70px rgba(0, 0, 0, 0.25); text-align: center; margin: 0 auto 30px; letter-spacing: 0.14em; text-transform: uppercase; color: #FFFFFF; font-weight: 700; font-size: 14px; line-height: 17px; font-family: 'Trade Gothic LT Pro Cn'; padding: 12px 0 8px; }
    .page-template-crm-login-template .logo-wrap .logo {
        padding-top: 3px;
    }

    
    @media (max-width:1600px) {
        .forgot-pass { padding-top: 26px; }
        .login-form-section h1 { padding-bottom: 20px; }
        .login-form-section .user-anme { padding-bottom: 30px; }
        .login-form-section form { }
        .login-form-section ul { padding: 21px 40px 30px; }
        .login-form-section .submit-btns { padding-top: 33px; }
    }

    @media (max-width:767px) {
        .login-form-section { padding: 24px; }
        .login-form-section ul { padding: 21px 20px 30px; }
    }

    @media(max-width:540px) {
        .form-group label:before { left: 0; }
        .form-group label { padding-left: 0; }
        .login-form-section label { letter-spacing: 0.5px; }
        .input-type #togglePassword, .forgot-pass a { letter-spacing: 0; }
        .error-massage { max-width: 100%; }
    }



    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    @-webkit-keyframes rotate {
      from { -webkit-transform: rotate(0deg); }
      to { -webkit-transform: rotate(360deg); }
    }
    .authenticating a:before {content: '';display: inline-block;width: 15px;height: 15px;margin: 0 auto 0;border: solid 2px #585858;border-radius: 100%;border-right-color: transparent;border-bottom-color: transparent;-webkit-transition: all 0.5s ease-in;-webkit-animation-name: rotate;-webkit-animation-duration: 1s;-webkit-animation-iteration-count: infinite;-webkit-animation-timing-function: linear;transition: all 0.5s ease-in;animation-name: rotate;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;position: absolute;left: -30px;top: 10px;}

    .submit-btns.authenticating {
        position: relative;
    }

    .submit-btns.authenticating a {
        position: relative;
    }

</style>
<?php 

if ( is_user_logged_in() ) {
    wp_redirect( site_url('insurance-addon-information') );die();
}

?>
<div class="wp-container" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/Login-bg.png);">
    <div class="main-wrap-container">
        <div class="login-form-section">
            <form name="crm_agent_login" class="crm_agent_login" id="crm_agent_login" action="">
                <div class="error-massage" style="display:none;">INCORRECT USERNAME OR PASSWORD</div>     
                <ul> <!-- class="error" --> 
                    <li><h1>Login</h1></li>
                    <li class="user-anme">
                        <label for="uname">USERNAME</label>
                        <div class="input-type"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/login/user-red.png"><input type="text" placeholder="Enter username" name="email" id="username" autocomplete="nope" required=""></div>
                    </li>
                    <li class="password ">
                        <label for="pw">Password</label><br>
                        <div class="input-type"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/login/lock-red.png">
                            <input name="password" class="stylishPassword" type="password" placeholder="Enter your password" id="password">
                            <i class="bi bi-eye-slash" id="togglePassword">show</i>
                        </div>
                        <div class="forgot-pass">
                            <div class="form-group">
                                <input type="checkbox" name="rememberme" id="rememberme">
                                <label for="rememberme">remember me</label>
                            </div>
                            <a href="#">Forgot my password</a>
                        </div>
                    </li>
                    <li class="submit-btns" style="display: flex; justify-content: flex-end;align-items: center;">
                        <!-- <input type="submit" id="check_authentication_call" class="check_authentication_call" name="login" value="login"> -->
                        <span style="display: none;padding-right: 52px;" id="request_sending">Request Sending...</span>
                        <span style="display: none;padding-right: 52px;" id="success_msg">Authenticating, Please Wait.</span>
                        <a href="#" class="check_authentication_call" id="check_authentication_call">submit</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
<script src="<?php echo get_template_directory_uri().'/js/login.js'; ?>"></script>    
<script type="text/javascript">
    jQuery(document).ready(function($) {

     const togglePassword = document.querySelector("#togglePassword");
     const password = document.querySelector("#password");

     togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });


    // jQuery('header').addClass('white-header');
    // jQuery('header').addClass('position-absolute');


  
});


   
</script>