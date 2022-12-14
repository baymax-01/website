<div class="white_card content">
  <div class="white_card_header">
    <h3 class="card-title"><i class="fe fe-sliders"></i> <?= lang("affiliate_settings") ?></h3>
  </div>
  <div class="white_card_body">
    <form class="actionForm" action="<?= cn("$module/ajax_general_settings") ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
      <div class="row">

        <div class="col-md-12 col-lg-12">

          <h5 class="text-info"><i class="fe fe-link"></i> <?= lang("enable_affiliate") ?></h5>
          <div class="form-group">
            <div class="form-label"><?= lang("Status") ?></div>
            <label class="custom-switch">
              <input type="hidden" name="enable_affiliate" value="0">
              <input type="checkbox" name="enable_affiliate" class="custom-switch-input" <?= (get_option("enable_affiliate", 0) == 1) ? "checked" : "" ?> value="1">
              <span class="custom-switch-indicator"></span>
              <span class="custom-switch-description"><?= lang("Active") ?></span>
            </label>
            <br>
          </div>

          <h5 class="text-info"><i class="fe fe-link"></i> <?= lang("affiliate_page_notice") ?></h5>
          <div class="form-group">
            <textarea rows="3" name="affiliate_notice" class="form-control"><?= get_option('affiliate_notice', "") ?></textarea>
          </div>

          <h5 class="text-info"><i class="fe fe-link"></i> <?= lang("affiliate_bonus") ?></h5>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-prepend">
                <span class="input-group-text"><?= get_option('currency_symbol', "$") ?></span>
              </span>
              <input class="form-control" name="affiliate_bonus" value="<?= get_option('affiliate_bonus') ?>">
            </div>
            <small class="text-muted"><span class="text-danger">*</span> <?= lang("this_is_fund_which_will_be_added_to_the_affiliate_user_whenever_someone_signup_with_their_referral_code_and_add_funds_for_the_first_time.") ?></small>
          </div>

        </div>
        <div class="col-md-8">
          <div class="form-footer">
            <button class="btn_2 mt-1 mb-1 w-100"><?= lang("Save") ?></button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>
