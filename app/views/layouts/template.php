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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/bootstrap.min.css" />
  <!-- themefy CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/themefy_icon/themify-icons.css" />
  <!-- gijgo css -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/gijgo/gijgo.min.css" />
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/font_awesome/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/tagsinput/tagsinput.css" />

  <!-- date picker -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/datepicker/date-picker.css" />

  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/vectormap-home/vectormap-2.0.2.css" />

  <!-- scrollabe  -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/scroll/scrollable.css" />
  <!-- datatable CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/datatable/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/datatable/css/responsive.dataTables.min.css" />
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/datatable/css/buttons.dataTables.min.css" />
  <!-- morris css -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/vendors/morris/morris.css">
  <!-- menu css  -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/metisMenu.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/style.css" />
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/newtheme/css/colors/default.css" id="colorSkinCSS">

  <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

  <script src="<?php echo BASE; ?>assets/js/vendors/jquery-3.2.1.min.js"></script>

  <?php if (segment('1') == 'gallery' || segment('1') == 'setting') { ?>
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/jquery-upload/css/jquery.fileupload.css">
  <?php } ?>

  <!-- flag icon -->
  <?php if (segment('1') == 'language') {
  ?>
    <link href="<?php echo BASE; ?>assets/plugins/flags/css/flag-icon.css" rel="stylesheet">
  <?php } ?>
  <!-- Core -->
  <!-- <link href="<?php echo BASE; ?>assets/css/core.css" rel="stylesheet"> -->

  <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
  <!-- emoji -->
  <?php
  if (in_array(segment('1'), ['services', 'api_provider', 'provider'])) {
  ?>
    <link rel="stylesheet" type="text/css" href="<?= BASE ?>assets/plugins/emoji/emojionearea.min.css" media="screen">
    <script type="text/javascript" src="<?= BASE ?>assets/plugins/emoji/emojionearea.min.js"></script>
  <?php } ?>
  <link href="<?php echo BASE; ?>assets/plugins/emoji-picker/lib/css/emoji.css" rel="stylesheet">
  <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">

  <script type="text/javascript">
    var token = '<?php echo $this->security->get_csrf_hash(); ?>',
      PATH = '<?php echo PATH; ?>',
      BASE = '<?php echo BASE; ?>';
    var deleteItem = "<?= lang('Are_you_sure_you_want_to_delete_this_item') ?>";
    var deleteItems = "<?= lang('Are_you_sure_you_want_to_delete_all_items') ?>";
  </script>
  <?= htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES) ?>
</head>
<?php
$theme_name = get_option('default_header_skin', 'default');
if ($theme_name == "") {
  $theme_name = 'default';
}
?>

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

  .custom-switch {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -ms-flex-align: center;
    align-items: center;
    margin: 0;
  }

  .custom-switch-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
  }

  .custom-switch-indicator {
    display: inline-block;
    height: 1.25rem;
    width: 2.25rem;
    background: #f8dbdd;
    border-radius: 50px;
    position: relative;
    vertical-align: bottom;
    border: 1px solid rgba(0, 40, 100, 0.12);
    transition: .3s border-color, .3s background-color;
  }

  .custom-switch-indicator:before {
    content: '';
    position: absolute;
    height: calc(1.25rem - 4px);
    width: calc(1.25rem - 4px);
    top: 1px;
    left: 1px;
    background: #fff;
    border-radius: 50%;
    transition: .3s left;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 40%);
  }

  .custom-switch-description {
    margin-left: .5rem;
    color: #6e7687;
    transition: .3s color;
  }

  .custom-switch {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -ms-flex-align: center;
    align-items: center;
    margin: 0;
  }

  .custom-switch-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
  }

  .custom-switches-stacked {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
  }

  .custom-switches-stacked .custom-switch {
    margin-bottom: .5rem;
  }

  .custom-switch-indicator {
    display: inline-block;
    height: 1.25rem;
    width: 2.25rem;
    background: #f8dbdd;
    border-radius: 50px;
    position: relative;
    vertical-align: bottom;
    border: 1px solid rgba(0, 40, 100, 0.12);
    transition: .3s border-color, .3s background-color;
  }

  .custom-switch-indicator:before {
    content: '';
    position: absolute;
    height: calc(1.25rem - 4px);
    width: calc(1.25rem - 4px);
    top: 1px;
    left: 1px;
    background: #fff;
    border-radius: 50%;
    transition: .3s left;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.4);
  }

  .custom-switch-input:checked~.custom-switch-indicator {
    background: #ed4d5f;
  }

  .custom-switch-input:checked~.custom-switch-indicator:before {
    left: calc(1rem + 1px);
  }

  .custom-switch-input:focus~.custom-switch-indicator {
    box-shadow: 0 0 0 2px rgba(70, 127, 207, 0.25);
    border-color: #467fcf;
  }

  .custom-switch-description {
    margin-left: .5rem;
    color: #6e7687;
    transition: .3s color;
  }

  .custom-switch-input:checked~.custom-switch-description {
    color: #495057;
  }

  img {
    max-width: 100%;
  }

  .page-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 400;
    line-height: 2.5rem;
  }

</style>

<body class="crm_body_bg">
  <div id="page-overlay" class="visible incoming">
    <center style="margin-top: 290px;">
      <div class="loader--ellipsis colord_bg_4 mb_30">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </center>
  </div>
  <div class="">
    <div class="">
      <!-- header -->
      <?= Modules::run("blocks/header"); ?>

      <div class="my-3 mx-3 my-md-5">
        <div class="container" <?= (segment(1) == "services" || segment(1) == "dripfeed" || segment(1) == "subscriptions" || segment(2) == "log") ? 'style="max-width: 96%"' : "" ?>>
          <div class="d-md-none">
            <?php
            if (allowed_search_bar(segment(1)) || allowed_search_bar(segment(2))) {
              echo Modules::run("blocks/search_box");
            }
            ?>
          </div>

          <?= $template['body'] ?>
        </div>
      </div>

    </div>
    <!-- modal -->
    <div id="modal-ajax" class="modal fade" tabindex="-1"></div>
    <div id="modal-ajax-notification" class="modal fade" tabindex="-1"></div>
  </div>

  <?= Modules::run("blocks/footer"); ?>

  <!-- footer -->
  <script>
    feather.replace()
  </script>
  <script src="<?php echo BASE; ?>assets/newtheme/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="<?php echo BASE; ?>assets/newtheme/js/popper.min.js"></script>
  <!-- bootstarp js -->
  <script src="<?php echo BASE; ?>assets/newtheme/js/bootstrap.min.js"></script>
  <!-- sidebar menu  -->
  <script src="<?php echo BASE; ?>assets/newtheme/js/metisMenu.js"></script>
  <!-- waypoints js -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/count_up/jquery.waypoints.min.js"></script>
  <!-- waypoints js -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chartlist/Chart.min.js"></script>
  <!-- counterup js -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/count_up/jquery.counterup.min.js"></script>

  <!-- nice select -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/niceselect/js/jquery.nice-select.min.js"></script>
  <!-- owl carousel -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/owl_carousel/js/owl.carousel.min.js"></script>

  <!-- responsive table -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/buttons.flash.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/jszip.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/pdfmake.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/vfs_fonts.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/buttons.html5.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datatable/js/buttons.print.min.js"></script>

  <!-- datepicker  -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datepicker/datepicker.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datepicker/datepicker.en.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/datepicker/datepicker.custom.js"></script>

  <script src="<?php echo BASE; ?>assets/newtheme/js/chart.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chartjs/roundedBar.min.js"></script>

  <!-- progressbar js -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/progressbar/jquery.barfiller.js"></script>
  <!-- tag input -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/tagsinput/tagsinput.js"></script>
  <!-- text editor js -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/text_editor/summernote-bs4.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/am_chart/amcharts.js"></script>

  <!-- scrollabe  -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/scroll/perfect-scrollbar.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/scroll/scrollable-custom.js"></script>

  <!-- vector map  -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/vectormap-home/vectormap-world-mill-en.js"></script>

  <!-- apex chrat  -->
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/apex_chart/apex-chart2.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/apex_chart/apex_dashboard.js"></script>

  <script src="<?php echo BASE; ?>assets/newtheme/vendors/echart/echarts.min.js"></script>


  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chart_am/core.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chart_am/charts.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chart_am/animated.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chart_am/kelly.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/vendors/chart_am/chart-custom.js"></script>
  <!-- custom js -->
  <script src="<?php echo BASE; ?>assets/newtheme/js/dashboard_init.js"></script>
  <script src="<?php echo BASE; ?>assets/newtheme/js/custom.js"></script>

  <script src="<?php echo BASE; ?>assets/js/vendors/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/jquery.sparkline.min.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/selectize.min.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/jquery.tablesorter.min.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/jquery-jvectormap-de-merc.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/jquery-jvectormap-world-mill.js"></script>
  <script src="<?php echo BASE; ?>assets/js/vendors/circle-progress.min.js"></script>

  <script src="<?php echo BASE; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo BASE; ?>assets/js/core.js"></script>
  <!-- toast -->
  <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-toast/js/jquery.toast.js"></script>
  <!-- Tiny Editor -->
  <script type="text/javascript" id="tinymce-js" src="<?php echo BASE; ?>assets/plugins/tinymce/tinymce.min.js"></script>

  <!-- emoji picker -->
  <script src="<?php echo BASE; ?>assets/plugins/emoji-picker/lib/js/config.js"></script>
  <script src="<?php echo BASE; ?>assets/plugins/emoji-picker/lib/js/util.js"></script>
  <script src="<?php echo BASE; ?>assets/plugins/emoji-picker/lib/js/jquery.emojiarea.js"></script>
  <script src="<?php echo BASE; ?>assets/plugins/emoji-picker/lib/js/emoji-picker.js"></script>
  <!-- flags icon -->
  <script src="<?php echo BASE; ?>assets/plugins/flags/js/docs.js"></script>

  <?php if (segment('1') == 'gallery' || segment('1') == 'setting') { ?>
    <script src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/jquery.iframe-transport.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/jquery.fileupload.js"></script>
  <?php } ?>

  <?php if (segment('1') == 'statistics') { ?>
    <script src="<?php echo BASE; ?>assets/js/chart_template.js"></script>
  <?php } ?>


  <!-- general JS -->
  <script src="<?php echo BASE; ?>assets/js/process.js"></script>
  <script src="<?php echo BASE; ?>assets/js/general.js"></script>
  <?= htmlspecialchars_decode(get_option('embed_javascript', ''), ENT_QUOTES) ?>

</body>

</html>