<style>
  .payment {
    width: 3.5rem;
    height: 1.5rem;
    display: inline-block;
    background: no-repeat center/100% 100%;
    vertical-align: bottom;
    font-weight: 800;
    font-style: normal;
    box-shadow: 0 0 1px 1px rgb(0 0 0 / 10%);
    border-radius: 2px;
}
</style>
<div class="page-header d-md-none">
  <h1 class="page-title">
    <i class="fe fe-calendar" aria-hidden="true"> </i> 
    <?=lang("Transaction_logs")?>
  </h1>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if (!empty($transactions)) {
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="white_card">
      <div class="white_card_header">
        <h3 class="card-title"><?=lang('Lists')?></h3>
        
      </div>
      <div class="table-responsive p-3">
        <table class="table table-hover table-outline table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang('No_')?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?=lang('Action')?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($transactions)) {
              $i = 0;
              $currency_symbol = get_option("currency_symbol", '$');
              foreach ($transactions as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td>
                <div class="title"><?=get_field('general_users', ["id" => $row->uid], "email")?></div>
                <?php
                  if ($row->payer_email) {
                    echo '<small class="text-muted">Payer Email: '. $row->payer_email .'</small>';
                  }
                ?>
              </td>
              <td>
                <?php
                  switch ($row->transaction_id) {
                    case 'empty':
                      if ($row->type == 'manual') {
                        echo lang($row->transaction_id);
                      }else{
                        echo lang($row->transaction_id)." ".lang("transaction_id_was_sent_to_your_email");
                      }
                      break;

                    default:
                      echo $row->transaction_id;
                      break;
                  }
                ?>
              </td>
              <?php } ?>
              <td class="">
                <?php
                  if (in_array(strtolower($row->type), ["bonus", "manual", "other"])) {
                    echo ucfirst($row->type);
                  }else{
                ?>
                <img class="payment" src="<?=BASE?>/assets/images/payments/<?=strtolower($row->type); ?>.png" alt="<?=$row->type?> icon">
                <?php }; ?>
              </td>
              <td>
                <?php
                  echo $currency_symbol.$row->amount;
                ?>
              </td>
              
              <td>
                <?php
                  echo $row->txn_fee;
                ?>
              </td>
              <?php
                if (get_role("admin")) {
              ?>
              <td>
                <?php echo $row->note; ?>
              </td>
              <?php } ?>

              <td><?=convert_timezone($row->created, 'user')?></td>

              <td>
                <?php
                  switch ($row->status) {
                    case 1:
                        echo '<span class="badge badge-default">'.lang('Paid').'</span>';
                      break;

                    case 0:
                        echo '<span class="badge badge-warning">'.lang("waiting_for_buyer_funds").'</span>';
                      break; 

                    case -1:
                        echo '<span class="badge badge-danger">'.lang('cancelled_timed_out').'</span>';
                      break;
                  }
                ?>
              </td>

              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i data-feather="more-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>
                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
                  </div>
                </div>
              </td>
              <?php }?>
            </tr>
            <?php }}?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="float-right">
      <?=$links?>
    </div>
  </div>
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
</div>
