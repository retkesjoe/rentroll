<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | User Login 1</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/assets/plugins/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/assets/plugins/admin/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/assets/plugins/admin/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="/assets/plugins/admin/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/css/admin.min.css" type="text/css">
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            video { 
                position: fixed;
                top: 50%;
                left: 50%;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -100;
                transform: translateX(-50%) translateY(-50%);
                background-size: cover;
                transition: 1s opacity;
            }
        </style>
        </head>
    <!-- END HEAD -->

    <body class=" login">
        <video id="bgvid" playesinline autoplay muted loop>
            <source src="/assets/videos/rentroll_webm.webm" type="video/webm">
            <source src="/assets/videos/rentroll_mp4.mp4" type="video/mp4">
        </video>
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.php">
                <img src="/assets/plugins/admin/assets/pages/img/logo-big.png" alt="" />
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="dashboard" method="post">
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="on" placeholder="Email" name="email" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="index.html" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <div class="copyright"> 2017 © RentRoller Budapest </div>
            <!-- END FORGOT PASSWORD FORM -->            
        </div>
        
        <!--[if lt IE 9]>
<script src="/assets/plugins/admin/assets/global/plugins/respond.min.js"></script>
<script src="/assets/plugins/admin/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/assets/plugins/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/assets/plugins/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/assets/plugins/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/plugins/admin/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>