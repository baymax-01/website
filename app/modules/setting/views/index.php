
<div class="row settings justify-content-center">
  <div class="col-md-12 col-lg-12">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <?php
          $data = array(
            "module" => "setting",
          );
          $this->load->view('sidebar', $data);
        ?>
      </div>
      <div class="col-md-9 col-lg-9">
        <?php
          $data = array(
            "module" => "setting",
          );
          $payments_method = get_payments_method();
          if ($tab != "") {
            if (in_array($tab, $payments_method) && payment_method_exists($tab)) {
              $this->load->view('integrations/'.$tab, $data);
            }else{
              $this->load->view($tab, $data);
            }
          }
        ?>
      </div>
    </div>
  </div>
</div>
