<style>
  .search-box input.form-control {
    margin: -1px;
  }

  .search-box select.form-control {
    border-radius: 0px;
    border: 1px solid #fff;
  }

  .text-red {
    color: #ed4d5f;
  }
  
  .tex-red {
    color: #ed4d5f;
  }
  
  .selectize-control {
    position: relative;
    padding: 0;
    border: 0;
}

.selectize-control.single .selectize-input, .selectize-control.single .selectize-input input {
    cursor: pointer;
}
.selectize-input.full {
    background-color: #fff;
}
.selectize-input {
    border: 1px solid rgba(0, 40, 100, 0.12);
    padding: 0.5625rem 0.75rem;
    display: inline-block;
    display: block;
    width: 100%;
    overflow: hidden;
    position: relative;
    z-index: 1;
    box-sizing: border-box;
    border-radius: 3px;
    transition: .3s border-color, .3s box-shadow;
}
.selectize-input, .selectize-control.single .selectize-input.input-active {
    background: #fff;
    cursor: text;
    display: inline-block;
}
.selectize-dropdown, .selectize-input, .selectize-input input {
    color: #495057;
    font-family: inherit;
    font-size: 15px;
    line-height: 18px;
    -webkit-font-smoothing: inherit;
}

.selectize-input > * {
    vertical-align: baseline;
    display: -moz-inline-stack;
    display: inline-block;
    zoom: 1;
    *display: inline;
}
.selectize-dropdown {
    position: absolute;
    z-index: 10;
    border: 1px solid rgba(0, 40, 100, 0.12);
    background: #fff;
    margin: -1px 0 0 0;
    border-top: 0 none;
    box-sizing: border-box;
    border-radius: 0 0 3px 3px;
    height: auto;
    padding: 0;
}
.selectize-dropdown, .selectize-input, .selectize-input input {
    color: #495057;
    font-family: inherit;
    font-size: 15px;
    line-height: 18px;
    -webkit-font-smoothing: inherit;
}
.selectize-dropdown-content {
    overflow-y: auto;
    overflow-x: hidden;
    max-height: 200px;
    -webkit-overflow-scrolling: touch;
}
.selectize-dropdown [data-selectable], .selectize-dropdown .optgroup-header {
    padding: 6px .75rem;
}
.selectize-dropdown [data-selectable] {
    cursor: pointer;
    overflow: hidden;
}
.selectize-input > input {
    display: inline-block !important;
    padding: 0 !important;
    min-height: 0 !important;
    max-height: none !important;
    max-width: 100% !important;
    margin: 0 2px 0 0 !important;
    text-indent: 0 !important;
    border: 0 none !important;
    background: none !important;
    line-height: inherit !important;
    box-shadow: none !important;
}
.selectize-dropdown, .selectize-input, .selectize-input input {
    color: #495057;
    font-family: inherit;
    font-size: 15px;
    line-height: 18px;
    -webkit-font-smoothing: inherit;
}
.selectize-input > * {
    vertical-align: baseline;
    display: -moz-inline-stack;
    display: inline-block;
    zoom: 1;
    *display: inline;
}
button, input {
    overflow: visible;
}
input, button, select, optgroup, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
</style>

<!-- sidebar  -->
<nav class="sidebar">
  <div class="logo d-flex justify-content-between">
    <a class="large_logo" href="<?= cn('statistics') ?>"><img src="<?= get_option('website_logo_white', BASE . "assets/images/logo-white.png") ?>" alt=""></a>
    <a class="small_logo" href="<?= cn('statistics') ?>"><img src="<?= get_option('website_logo_white', BASE . "assets/images/logo-white.png") ?>" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
      <i class="ti-close"></i>
    </div>
  </div>
  <ul id="sidebar_menu">
    <li>
      <a href="<?= cn('statistics') ?>" aria-expanded="false" class="<?= (segment(1) == 'statistics') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="home"></i>
        </div>
        <div class="nav_title">
          <span>Dashboard</span>
        </div>
      </a>
    </li>
    <li>
      <a href="<?= cn('order/add') ?>" aria-expanded="false" class="<?= (segment(1) == 'order' && segment(2) == 'add') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="plus"></i>
        </div>
        <div class="nav_title">
          <span>New Order </span>
        </div>
      </a>
    </li>
    <li>
      <a href="<?= cn('order/log') ?>" aria-expanded="false" class="<?= (segment(1) == 'order' && segment(2) == 'log') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="inbox"></i>
        </div>
        <div class="nav_title">
          <span>Orders </span>
        </div>
      </a>
    </li>
    <?php if (get_role('admin')) { ?>
    <li>
      <a href="<?= cn('refills') ?>" aria-expanded="false" class="<?= (segment(1) == 'refills') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="refresh-cw"></i>
        </div>
        <div class="nav_title">
          <span>Refills </span>
        </div>
      </a>
    </li>
    
    
    
   
    <li>
      <a href="<?= cn('category') ?>" aria-expanded="false" class="<?= (segment(1) == 'category') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="grid"></i>
        </div>
        <div class="nav_title">
          <span>Categories </span>
        </div>
      </a>
    </li>
    
    
    
    <li>
      <a href="<?= cn('api') ?>" aria-expanded="false" class="<?= (segment(1) == 'api') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="share-2"></i>
        </div>
        <div class="nav_title">
          <span>API</span>
        </div>
      </a>
    </li>
    
    
    <?php }?>
    <li>
      <a href="<?= cn('services') ?>" aria-expanded="false" class="<?= (segment(1) == 'category') ? "services" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="list"></i>
        </div>
        <div class="nav_title">
          <span>Services </span>
        </div>
      </a>
    </li>
    <li>
      <a href="<?= cn('tickets') ?>" aria-expanded="false" class="<?= (segment(1) == 'tickets') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="paperclip"></i>
        </div>
        <div class="nav_title">
          <span>Tickets </span>
        </div>
      </a>
    </li>
    <?php if (get_role('user')) { ?>
      <li>
        <a href="<?= cn('add_funds') ?>" aria-expanded="false" class="<?= (segment(1) == 'add_funds') ? "active" : "" ?>">
          <div class="nav_icon_small">
            <i data-feather="dollar-sign"></i>
          </div>
          <div class="nav_title">
            <span>Add Funds </span>
          </div>
        </a>
      </li>
    <?php } ?>
    <li>
      <a href="<?= cn('transactions') ?>" aria-expanded="false" class="<?= (segment(1) == 'transactions') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="calendar"></i>
        </div>
        <div class="nav_title">
          <span>Transaction Logs </span>
        </div>
      </a>
    </li>

    <?php
      if (get_option("is_childpanel_status")) {
    ?>
    
    <li class="">
        <a href="#" aria-expanded="false" class="has-arrow <?= (segment(1) == 'childpanel') ? "active" : "" ?>">
          <div class="nav_icon_small">
            <i data-feather="archive"></i>
          </div>
          <div class="nav_title">
            <span>Childpanel </span>
          </div>
        </a>
        <ul>
          <li><a href="<?= cn('childpanel/add') ?>">New Panel</a></li>
          <li><a href="<?= cn('childpanel/log') ?>">Panel Logs</a></li>
        </ul>
      </li>
      
    <?php }?>

    <?php
    if (get_option('enable_api_tab') && !get_role("admin")) {
    ?>
      <li>
        <a href="<?= cn('api/docs') ?>" aria-expanded="false" class="<?= (segment(2) == 'docs') ? "active" : "" ?>">
          <div class="nav_icon_small">
            <i data-feather="share-2"></i>
          </div>
          <div class="nav_title">
            <span>API </span>
          </div>
        </a>
      </li>
    <?php } ?>

    <?php
    if (get_option('enable_affiliate')) {
    ?>
    <li>
      <a href="<?= cn('affiliate') ?>" aria-expanded="false" class="<?= (segment(1) == 'affiliate') ? "active" : "" ?>">
        <div class="nav_icon_small">
          <i data-feather="share"></i>
        </div>
        <div class="nav_title">
          <span>Affiliate </span>
        </div>
      </a>
    </li>
    <?php }?>

    <?php if (get_role("admin") || get_role("supporter")) {
      $user_manager = array(
        'users',
        'subscribers',
        'add_funds',
        'user_logs',
        'user_block_ip',
        'user_mail_logs',
      );
    ?>

      <li class="">
        <a href="#" aria-expanded="false" class="has-arrow <?= (in_array(segment(1), $user_manager)) ? "active" : "" ?>">
          <div class="nav_icon_small">
            <i data-feather="users"></i>
          </div>
          <div class="nav_title">
            <span>User Manager </span>
          </div>
        </a>
        <ul>
          <li><a href="<?= cn('users') ?>">Users</a></li>
              
              
              <li> <?php
                if (get_role('admin')) {
              ?>
              <a href="<?=cn('user_block_ip')?>" class="dropdown-item"><?=lang("banned_ip_address_list")?></a>
              <?php }?></li>

          
          <li><a href="<?= cn('subscribers') ?>">Subscribers</a></li>
          <li><a href="<?= cn('add_funds') ?>">Add Funds</a></li>
        </ul>
      </li>

    <?php } ?>
    <?php if (get_role("admin") ||  get_role("supporter")) {
      $setting_system = array(
        'setting',
        'api_provider',
        'news',
        'payments',
        'payments_bonuses',
        'faqs',
        'language',
        'module',
      );
    ?>
      <li class="">
        <a class="has-arrow <?= (in_array(segment(1), $setting_system)) ? "active" : "" ?>" href="#" aria-expanded="false">
          <div class="nav_icon_small">
            <i data-feather="settings"></i>
          </div>
          <div class="nav_title">
            <span>Settings</span>
          </div>
        </a>
        <ul>
          <li><a href="<?= cn('setting') ?>">Settings</a></li>
          <li><a href="<?= cn('api_provider') ?>">Api Providers</a></li>
          <li><a href="<?= cn('payments') ?>">Payments</a></li>
          <li><a href="<?= cn('payments_bonuses') ?>">Payment Bonus</a></li>
          <li><a href="<?= cn('faqs') ?>">FAQs</a></li>
        </ul>
      </li>
    <?php } ?>
  </ul>
</nav>
<!--/ sidebar  -->
<section class="main_content dashboard_part large_header_bg">

  <div class="container-fluid no-gutters">
    <div class="row">
      <div class="col-lg-12 p-0 ">
        <div class="header_iner d-flex justify-content-between align-items-center">
          <div class="sidebar_icon d-lg-none">
            <i class="ti-menu"></i>
          </div>
          <label class="switch_toggle d-none d-lg-block" for="checkbox">
            <input type="checkbox" id="checkbox">
            <div class="slider round open_miniSide"></div>
          </label>

          <div class="header_right d-flex justify-content-between align-items-center">
            <div class="header_notification_warp d-flex align-items-center">
              <?php
              if (allowed_search_bar(segment(1)) || allowed_search_bar(segment(2))) {
               echo Modules::run("blocks/desktop_search_box");
               }
              if (get_option("enable_news_announcement") == 1) {
              ?>
                <li>
                  <a class="bell_notification_clicker ajaxModal" href="<?= cn("news/ajax_notification") ?>"> <img src="<?php echo BASE; ?>assets/newtheme/img/icon/bell.svg" alt="">
                  </a>
                </li>
              <?php } ?>

              <?php
              if (session('uid_tmp')) {
              ?>
                <li>
                  <a style="color: #111111;" class="bell_notification_clicker ajaxBackToAdmin" href="<?= cn("blocks/back_to_admin") ?>"> <i data-feather="log-out"></i>
                  </a>
                </li>
              <?php } ?>
            </div>
            <div class="profile_info">
              <img src="<?php echo BASE; ?>assets/newtheme/img/client_img.png" alt="#">
              <div class="profile_info_iner">
                <div class="profile_author_name">
                  <h5><?php _echo(get_field(USERS, ["id" => session('uid')], 'first_name')) ?></h5>
                  <?php
                  // !get_role("admin")
                  if (!get_role("admin")) {
                    $balance = get_field(USERS, ["id" => session('uid')], 'balance');

                    switch (get_option('currency_decimal_separator', 'dot')) {
                      case 'dot':
                        $decimalpoint = '.';
                        break;
                      case 'comma':
                        $decimalpoint = ',';
                        break;
                      default:
                        $decimalpoint = '';
                        break;
                    }

                    switch (get_option('currency_thousand_separator', 'comma')) {
                      case 'dot':
                        $separator = '.';
                        break;
                      case 'comma':
                        $separator = ',';
                        break;
                      case 'space':
                        $separator = ' ';
                        break;
                      default:
                        $separator = '';
                        break;
                    }
                    if (empty($balance) || $balance == 0) {
                      $balance = 0.00;
                    } else {
                      $balance = currency_format($balance,  get_option('currency_decimal', 2), $decimalpoint, $separator);
                    }
                  ?>
                    <p><?= lang("Balance") ?>: <?= get_option('currency_symbol', "$") ?><?= $balance ?></p>
                  <?php } else { ?>
                    <p><?= lang("Admin_account") ?></p>
                  <?php } ?>
                </div>
                <div class="profile_info_details">
                  <a href="<?= cn('profile') ?>">My Profile </a>
                  <a href="<?= cn('setting') ?>">Settings</a>
                  <a href="<?= cn('auth/logout') ?>">Log Out </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>