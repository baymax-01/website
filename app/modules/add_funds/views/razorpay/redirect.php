<section class="add-funds m-t-30">
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="tab-content" id="result_notification">
              <div class="dimmer" style="min-height: 400px;">
                <div class="loader"></div>
                <div class="dimmer-content">
                  <form action="<?= cn("add_funds/razorpay/complete") ?>" method="POST">
                    <input type="hidden" value="<?php echo $amount; ?>" name="amount">
                    <input type="hidden" value="<?php echo $order_id; ?>" name="ORDERID">
                    <input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>">
                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $public_key; ?>" data-amount="<?php echo $amount * 100; ?>" data-currency="<?= get_option("currency_code", 'USD') ?>" data-buttontext="Pay with Razorpay" data-name="<?php echo $name; ?>" data-description="" data-image="https://paradisesmm.in/assets/images/logopay.jpg" data-prefill.name="" data-prefill.email="" data-theme.color="#F37254">
                    </script>
                    <input type="hidden" custom="Hidden Element" name="hidden">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $('.razorpay-payment-button').submit();
</script>