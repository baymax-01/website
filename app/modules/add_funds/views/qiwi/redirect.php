<div class="dimmer" style="min-height: 400px;">
  <div class="loader"></div>
  <div class="dimmer-content">
    <center>
      <h2><?php echo lang('please_do_not_refresh_this_page'); ?></h2>
    </center>
          <script>
            window.location.href = "<?php echo $url; ?>";
          </script>
  </div>
</div>