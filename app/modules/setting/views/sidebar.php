<style>
  .settings .white_card .item li>a {
    color: #a8a8b1;
    padding-left: 10px;
  }

  .settings .white_card .item li.active>a,
  .settings .white_card .item li:hover>a {
    color: #ed4d5f;
    font-weight: 600;
  }
</style>

<div class="white_card">
  <div class="white_card_body o-auto">
    <div class="item mt-2">
      <div class="title" style="font-size: 16px; font-weight: 600; line-height: 32px;">General Settings</div>
      <ul class="list-unstyled">
        <li class="<?php echo (segment(2) == 'website_setting') ? 'active' : '' ?>"><a href="<?= cn($module . "/website_setting") ?>" data-content="website_setting"><?= lang("website_setting") ?></a></li>

        <li class="<?php echo (segment(2) == 'website_logo') ? 'active' : '' ?>"><a href="<?= cn($module . "/website_logo") ?>" data-content="website_logo"><?= lang("Logo") ?></a></li>

        <li class="<?php echo (segment(2) == 'cookie_policy') ? 'active' : '' ?>"><a href="<?= cn($module . "/cookie_policy") ?>" data-content="terms_policy"><?= lang("cookie_policy") ?></a></li>

        <li class="<?php echo (segment(2) == 'terms_policy') ? 'active' : '' ?>"><a href="<?= cn($module . "/terms_policy") ?>" data-content="terms_policy"><?= lang("terms__policy_page") ?></a></li>

        <li class="<?php echo (segment(2) == 'default') ? 'active' : '' ?>"><a href="<?= cn($module . "/default") ?>" data-content="default_setting"><?= lang("default_setting") ?></a></li>

        <li class="<?php echo (segment(2) == 'currency') ? 'active' : '' ?>"><a href="<?= cn($module . "/currency") ?>" data-content="currency"><?= lang("currency_setting") ?></a></li>
        
        <li class="<?php echo (segment(2) == 'childpanel') ? 'active' : '' ?>"><a href="<?= cn($module . "/childpanel") ?>" data-content="other"><?= lang("Childpanel_setting") ?></a></li>

        <li class="<?php echo (segment(2) == 'affiliate') ? 'active' : '' ?>"><a href="<?= cn($module . "/affiliate") ?>" data-content="other"><?= lang("Affiliate") ?></a></li>
        
        <li class="<?php echo (segment(2) == 'other') ? 'active' : '' ?>"><a href="<?= cn($module . "/other") ?>" data-content="other"><?= lang("Other") ?></a></li>

      </ul>
    </div>

    <div class="item mt-2">
      <div class="title" style="font-size: 16px; font-weight: 600; line-height: 32px;">E-mail</div>
      <ul class="list-unstyled">
        <li class="<?php echo (segment(2) == 'smtp') ? 'active' : '' ?>"><a href="<?php echo cn($module . "/smtp") ?>" data-content="email_setting">Email Setting</a></li>
        <li class="<?php echo (segment(2) == 'template') ? 'active' : '' ?>"><a href="<?php echo cn($module . "/template") ?>" data-content="email_template">Email Template</a></li>
      </ul>
    </div>

    <div class="item mt-2">
      <div class="title" style="font-size: 16px; font-weight: 600; line-height: 32px;">Integrations</div>
      <ul class="list-unstyled">
        <li class="<?php echo (segment(2) == 'payment') ? 'active' : '' ?>"><a href="<?php echo cn($module . "/payment") ?>" data-content="payment">Payment</a></li>
      </ul>
    </div>
  </div>
</div>