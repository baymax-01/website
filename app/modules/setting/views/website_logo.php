<div class="white_card content">
  <div class="white_card_header">
    <h3 class="card-title"><i class="fe fe-life-buoy"></i> <?= lang("website_logo") ?></h3>
  </div>
  <div class="white_card_body">
    <form class="actionForm" action="<?= cn("$module/ajax_general_settings") ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
      <div class="row">
        <div class="col-md-12 col-lg-12">

          <div class="form-group">
            <label class="form-label"><?= lang("website_favicon") ?></label>
            <div class="input-group">
              <input type="text" name="website_favicon" class="form-control" value="<?= get_option('website_favicon', BASE . "assets/images/favicon.png") ?>">
              <span class="input-group-append">
            
                 
                    <input class="settings_fileupload" type="file" name="files[]" multiple="">
                  </i>
                </button>
              </span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label"><?= lang("website_logo") ?></label>
            <div class="input-group">
              <input type="text" name="website_logo" class="form-control" value="<?= get_option('website_logo', BASE . "assets/images/logo.png") ?>">
              <span class="input-group-append">
             
                
                    <input class="settings_fileupload" type="file" name="files[]" multiple="">
                  </i>
                </button>
              </span>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label"><?= lang("website_logo_white") ?></label>
            <div class="input-group">
              <input type="text" name="website_logo_white" class="form-control" value="<?= get_option('website_logo_white', BASE . "assets/images/logo-white.png") ?>">
              <span class="input-group-append">
               
                
                    <input class="settings_fileupload" type="file" name="files[]" multiple="">
                  </i>
                </button>
              </span>
            </div>
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