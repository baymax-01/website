
    <div class="white_card content">
      <div class="white_card_header">
        <h3 class="card-title"><i class="fe fe-edit"></i> <?=lang("email_template")?></h3>
      </div>
      <div class="white_card_body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("email_verification_for_new_customer_accounts")?></h5>
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="verification_email_subject" value="<?=get_option('verification_email_subject', getEmailTemplate("verify")->subject)?>">
              </div>   

              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="verification_email_content" id="verify" class="form-control plugin_editor"><?=get_option('verification_email_content', getEmailTemplate("verify")->content)?>
                </textarea>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("new_user_welcome_email")?></h5>
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_welcome_email_subject" value="<?=get_option('email_welcome_email_subject', getEmailTemplate("welcome")->subject)?>">
              </div>   

              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_welcome_email_content" id="welcome" class="form-control plugin_editor"><?=get_option('email_welcome_email_content', getEmailTemplate("welcome")->content)?>
                </textarea>
              </div> 

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("new_user_notification_email")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_new_registration_subject" value="<?=get_option('email_new_registration_subject', getEmailTemplate("new_user")->subject)?>">
              </div>   
               
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_new_registration_content" id="register" class="form-control plugin_editor"><?=get_option('email_new_registration_content', getEmailTemplate("new_user")->content)?>

                </textarea>
              </div>   

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("password_recovery")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_password_recovery_subject" value="<?=get_option('email_password_recovery_subject', getEmailTemplate("forgot_password")->subject)?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_password_recovery_content" id="recovery" class="form-control plugin_editor"><?=get_option('email_password_recovery_content', getEmailTemplate("forgot_password")->content)?>
                </textarea>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("payment_notification_email")?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Subject")?></label>
                <input class="form-control" name="email_payment_notice_subject" value="<?=get_option('email_payment_notice_subject', getEmailTemplate("payment")->subject)?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="email_payment_notice_content" id="payment" class="form-control plugin_editor"><?=get_option('email_payment_notice_content', getEmailTemplate("payment")->content)?>
                </textarea>
              </div>

              <div class="form-group">
                <div class="small">
                  <strong><?=lang("note")?></strong> <?=lang("you_can_use_following_template_tags_within_the_message_template")?><br> 
                  <ul>
                    <li>{{user_firstname}} - <?=lang("displays_the_users_first_name")?></li>
                    <li>{{user_lastname}} - <?=lang("displays_the_users_last_name")?></li>
                    <li>{{user_email}} - <?=lang("displays_the_users_email")?></li>
                    <li>{{user_timezone}} - <?=lang("displays_the_users_timezone")?></li>
                    <li>{{recovery_password_link}} - <?=lang("displays_recovery_password_link")?></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12">
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