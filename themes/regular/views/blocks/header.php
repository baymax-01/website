<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta name="description" content="<?= get_option('website_desc', "SmartPanel - #1 SMM Reseller Panel - Best SMM Panel for Resellers. Also well known for TOP SMM Panel and Cheap SMM Panel for all kind of Social Media Marketing Services. SMM Panel for Facebook, Instagram, YouTube and more services!") ?>">
  <meta name="keywords" content="<?= get_option('website_keywords', "smm panel, SmartPanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel") ?>">
  <title><?= get_option('website_title', "SmartPanel - SMM Panel Reseller Tool") ?></title>

  <link rel="shortcut icon" type="image/x-icon" href="<?= get_option('website_favicon', BASE . "assets/images/favicon.png") ?>">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "Indian Smm Services",
  "url": "https://indiansmmservices.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://indiansmmservices.com/auth/login{search_term_string}https://indiansmmservices.com/auth/signup",
    "query-input": "required name=search_term_string"
  }
}
</script>

  <link rel="stylesheet" href="<?= BASE ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <script src="<?= BASE ?>assets/js/vendors/jquery-3.2.1.min.js"></script>

  <!-- Core -->

  <?php if ($display_html) { ?>
    <link href="<?= BASE ?>assets/css/core.css" rel="stylesheet">
    <link href="<?= BASE ?>themes/regular/assets/css/theme_style.css" rel="stylesheet">
  <?php } else { ?>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/style.css" />
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/colors/default.css" id="colorSkinCSS">
  <?php  } ?>

  <!-- toast -->
  <link rel="stylesheet" type="text/css" href="<?= BASE ?>assets/plugins/jquery-toast/css/jquery.toast.css">
  <link rel="stylesheet" href="<?= BASE ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
  <link href="<?= BASE ?>assets/css/util.css" rel="stylesheet">
  <!-- AOS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/aos/dist/aos.css" />

  <style>
    #page-overlay.visible.active,
    #page-overlay.visible.active img {
      display: block;
    }

    #page-overlay.visible {
      opacity: 1;
      display: none;
    }

    #page-overlay {
      opacity: 0;
      top: 0px;
      left: 0px;
      position: fixed;
      background-color: rgba(249, 249, 249, 0.8);
      height: 100%;
      width: 100%;
      z-index: 9998;
      -webkit-transition: opacity 0.2s linear;
      -moz-transition: opacity 0.2s linear;
      transition: opacity 0.2s linear;
    }

    .visible {
      visibility: visible !important;
    }

    .col-login {
      max-width: 28rem;
    }

    .ml-auto,
    .mx-auto {
      margin-left: auto !important;
    }

    .mr-auto,
    .mx-auto {
      margin-right: auto !important;
    }

    .auth-login-form .auth-form {
      width: 100%;
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .h-100 {
      height: 100% !important;
    }

    .align-items-center {
      -ms-flex-align: center !important;
      align-items: center !important;
    }

    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -0.75rem;
      margin-left: -0.75rem;
    }

    .auth-login-form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      width: 100%;
      position: fixed;
    }

    .page {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-pack: center;
      justify-content: center;
      min-height: 100%;
    }

    .input-icon {
      position: relative;
    }

    .input-icon-addon {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      color: #9aa0ac;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: center;
      justify-content: center;
      min-width: 2.5rem;
      pointer-events: none;
    }

    .input-icon .form-control:not(:first-child) {
      padding-left: 2.5rem;
    }

    img {
      max-width: 100%;
    }

    img {
      vertical-align: middle;
      border-style: none;
    }
  </style>


  <script type="text/javascript">
    var token = '<?= $this->security->get_csrf_hash() ?>',
      PATH = '<?= PATH ?>',
      BASE = '<?= BASE ?>';
    var deleteItem = '<?= lang("Are_you_sure_you_want_to_delete_this_item") ?>';
    var deleteItems = '<?= lang("Are_you_sure_you_want_to_delete_all_items") ?>';
  </script>
  <?= htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES) ?>
</head>

<body class="">

  <div id="page-overlay" class="visible incoming">
    <center style="margin-top: 250px;">
      <div class="loader--ellipsis colord_bg_4 mb_30">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </center>
  </div>
  <?php if ($display_html) { ?>
    <header class="header fixed-top" id="headerNav">
      <div class="container">
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand" href="<?= cn() ?>">
            <img class="site-logo d-none" src="<?= get_option('website_logo', BASE . "assets/images/logo.png") ?>" alt="Webstie logo">
            <img class="site-logo-white" src="<?= get_option('website_logo', BASE . "assets/images/logo.png") ?>" alt="Webstie logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fe fe-menu"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="#home"><?= lang("Home") ?></a>
              </li>

              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#features"><?= lang("What_we_offer") ?></a>
              </li>
              <?php
              if (get_option("enable_service_list_no_login") == 1) {
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= cn("services") ?>"><?= lang("Services") ?></a>
                </li>
              <?php } ?>
            </ul>
            <div class="nav-item d-md-flex btn-login-signup">
              <?php
              if (!session('uid')) {
              ?>
                <a class="link btn-login" href="<?= cn('auth/login') ?>"><?= lang("Login") ?></a>

                <?php if (!get_option('disable_signup_page')) { ?>
                  <a href="<?= cn('auth/signup') ?>" class="btn btn-pill btn-outline-primary sign-up"><?= lang("Sign_Up") ?></a>
                <?php }; ?>

              <?php } else { ?>
                <a href="<?= cn('statistics') ?>" class="btn btn-pill btn-outline-primary btn-statistics text-uppercase"><?= lang("statistics") ?></a>
              <?php } ?>
            </div>
          </div>
        </nav>
      </div>
    </header>
  <?php } ?>