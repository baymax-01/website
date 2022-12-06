
    <div class="white_card content">
      <div class="white_card_header">
        <h3 class="card-title"><i class="fe fe-edit-3"></i> <?php echo lang("cookie_policy_page"); ?></h3>
      </div>
      <div class="white_card_body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Status")?></h5>
              <div class="form-group">
                <label class="custom-switch">
                  <input type="hidden" name="is_cookie_policy_page" value="0">
                  <input type="checkbox" name="is_cookie_policy_page" class="custom-switch-input" <?=(get_option("is_cookie_policy_page", 0) == 1) ? "checked" : ""?> value="1">
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description"><?=lang("Active")?></span>
                </label>
              </div>
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("Content"); ?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="cookies_policy_page" id="cookies_policy_page" class="form-control plugin_editor"><?=get_option('cookies_policy_page', "<p><strong>Lorem Ipsum</strong></p><p>Lorem ipsum dolor sit amet, in eam consetetur consectetuer. Vivendo eleifend postulant ut mei, vero maiestatis cu nam. Qui et facer mandamus, nullam regione lucilius eu has. Mei an vidisse facilis posidonium, eros minim deserunt per ne.</p><p>Duo quando tibique intellegam at. Nec error mucius in, ius in error legendos reformidans. Vidisse dolorum vulputate cu ius. Ei qui stet error consulatu.</p><p>Mei habeo prompta te. Ignota commodo nam ei. Te iudico definitionem sed, placerat oporteat tincidunt eu per, stet clita meliore usu ne. Facer debitis ponderum per no, agam corpora recteque at mel.</p>")?>
                </textarea>
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
        plugin_editor('.plugin_editor', {height: 500});
      });
    </script>