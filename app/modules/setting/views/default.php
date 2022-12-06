    <div class="white_card content">
      <div class="white_card_header">
        <h3 class="card-title"><i class="fe fe-settings"></i> <?=lang("default_setting")?></h3>
      </div>
      <div class="white_card_body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">

              <div class="row">

               
                  
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("header_menu_skin_colors"); ?></h5>
                  <div class="form-group">
                    <select  name="default_header_skin" class="form-control square">
                      <?php
                        $colors = array(
                          'default'            => 'Default',
                         
                        );
                        foreach ($colors as $key => $row) {
                      ?>
                      <option value="<?php echo $key; ?>" <?=(get_option('default_header_skin', 'default') == $key)? 'selected': ''?>> <?php echo $row; ?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6">
                  <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Pagination")?></h5>
                  <div class="form-group">
                    <label><?=lang("limit_the_maximum_number_of_rows_per_page")?></label>
                    <select name="default_limit_per_page" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 100; $i++) {
                          if ($i%5 == 0) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("default_limit_per_page", 10) == $i)? "selected" : ''?>><?=$i?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div> 
                   
              </div> 

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("default_tickets_log")?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="custom-controls-stacked">
                    <label><?=lang("auto_clear_ticket_lists")?></label>
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="is_clear_ticket" value="0">
                      <input type="checkbox" class="custom-control-input" name="is_clear_ticket" value="1" <?=(get_option('is_clear_ticket',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label><?=lang("clear_ticket_lists_after_x_days_without_any_response_from_user")?></label>
                    <select  name="default_clear_ticket_days" class="form-control square">
                      <?php 
                        for ($i = 1; $i <= 90; $i++) { 
                      ?>
                      <option value="<?=$i?>" <?=(get_option('default_clear_ticket_days', 30) == $i)? 'selected': ''?>> <?=$i?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("default_service")?></h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label><?=lang("default_min_order")?></label>
                    <input class="form-control" name="default_min_order" value="<?=get_option('default_min_order', 300)?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label><?=lang("default_max_order")?></label>
                    <input class="form-control" name="default_max_order" value="<?=get_option('default_max_order', 5000)?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label><?=lang("default_price_per_1000")?></label>
                    <input class="form-control" name="default_price_per_1k" value="<?=get_option('default_price_per_1k',"0.80")?>">
                  </div>
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("dripfeed_option")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_drip_feed" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_drip_feed" value="1" <?=(get_option('enable_drip_feed',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                  <small class="text-danger"><?=lang("note_please_make_sure_the_dripfeed_feature_has_the_active_status_in_api_provider_before_you_activate")?></small>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?=lang("default_runs")?> </label>
                    <input class="form-control" name="default_drip_feed_runs" value="<?=get_option('default_drip_feed_runs', 10)?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?=lang("default_interval_in_minutes")?></label>
                    <select name="default_drip_feed_interval" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 60; $i++) {
                          if ($i%10 == 0) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("default_drip_feed_interval", 30) == $i)? "selected" : ''?>><?=$i?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div>    
              </div>

            
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                   
                    
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  
                </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("disable_home_page_langding_page")?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_disable_homepage" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_disable_homepage" value="1" <?=(get_option('enable_disable_homepage',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?php echo lang("disable_signup_page"); ?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="disable_signup_page" value="0">
                      <input type="checkbox" class="custom-control-input" name="disable_signup_page" value="1" <?=(get_option('disable_signup_page',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("explication_of_the_service_symbol")?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_explication_service_symbol" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_explication_service_symbol" value="1" <?=(get_option('enable_explication_service_symbol',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("displays_the_service_lists_without_login_or_register")?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_service_list_no_login" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_service_list_no_login" value="1" <?=(get_option('enable_service_list_no_login',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                
                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("displays_api_tab_in_header")?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_api_tab" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_api_tab" value="1" <?=(get_option('enable_api_tab',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-6">
                  <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("displays_required_skypeid_field_in_signup_page")?></h5>
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_signup_skype_field" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_signup_skype_field" value="1" <?=(get_option('enable_signup_skype_field',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

              </div>
              
              <h5 class="m-t-10"><i class="fe fe-link"></i> <?=lang("displays_google_recapcha")?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="hidden" name="enable_goolge_recapcha" value="0">
                      <input type="checkbox" class="custom-control-input" name="enable_goolge_recapcha" value="1" <?=(get_option('enable_goolge_recapcha',"") == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("Active")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label><?=lang("google_recaptcha_site_key")?></label>
                    <input class="form-control" name="google_capcha_site_key" value="<?=get_option('google_capcha_site_key', '')?>">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label><?=lang("google_recaptcha_serect_key")?></label>
                    <input class="form-control" name="google_capcha_secret_key" value="<?=get_option('google_capcha_secret_key', '')?>">
                  </div>
                </div>

              </div>
              
            </div> 
            <div class="col-md-8">
              <div class="form-footer">
                <button class="btn_2 mt-1 mb-1 w-100"><?=lang("Save")?></button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        plugin_editor('.plugin_editor', {height: 200});
      });
    </script>