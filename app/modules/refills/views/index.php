<style type="text/css">
  .order_btn_group .list-inline-item{
    margin-right: 0px!important;
  }
  .order_btn_group .list-inline-item a.btn{
    font-size: 0.9rem;
    font-weight: 400;
  }
  .btn-show-custom-mention{
    font-weight: 400px!important;
    font-size: 10px!important;
  }
  .nav-link .badge.badge-error-orders{
    position: relative;
    left: 5px;
  }
</style>
<div class="page-header">
  <h1 class="page-title">
    <?=lang("refill_logs")?>
  </h1>

  <div class="page-options d-flex">
    <ul class="list-inline mb-0 order_btn_group">
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'all') ? 'btn-info' : ''?>" href="<?=cn($module."/index/all")?>"><?=lang('All')?></a></li>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'pending') ? 'btn-info' : ''?>" href="<?=cn($module."/index/pending")?>"><?=lang('Pending')?></a></li>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'awaiting') ? 'btn-info' : ''?>" href="<?=cn($module."/index/awaiting")?>"><?=lang('Awaiting')?></a></li>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'inprogress') ? 'btn-info' : ''?>" href="<?=cn($module."/index/inprogress")?>"><?=lang('In Progress')?></a></li>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'completed') ? 'btn-info' : ''?>" href="<?=cn($module."/index/completed")?>"><?=lang('Completed')?></a></li>      
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'rejected') ? 'btn-info' : ''?>" href="<?=cn($module."/index/rejected")?>"><?=lang('Rejected')?></a></li>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'fail') ? 'btn-info' : ''?>" href="<?=cn($module."/index/fail")?>"><?=lang('Failed')?></a></li>
    </ul>
  </div>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($order_logs)){
  ?>
  <div class="col-md-12">
    <div class="white_card">
      <div class="white_card_header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($order_logs)) {
              $currency_symbol = get_option("currency_symbol","");
              $decimal_places = get_option('currency_decimal', 2);
              switch (get_option('currency_decimal_separator', 'dot')) {
                case 'dot':
                  $decimalpoint = '.';
                  break;
                case 'comma':
                  $decimalpoint = ',';
                  break;
                default:
                  $decimalpoint = '';
                  break;
              }

              switch (get_option('currency_thousand_separator', 'comma')) {
                case 'dot':
                  $separator = '.';
                  break;
                case 'comma':
                  $separator = ',';
                  break;
                case 'space':
                  $separator = ' ';
                  break;
                default:
                  $separator = '';
                  break;
              }
              $i = 0;
              foreach ($order_logs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$row->refill_id?></td>
              
              <td class="text-center"><?=($row->refill_order_id == 0 || $row->refill_order_id ==-1)? "" : $row->refill_order_id?></td>
              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td><?=$row->refill_api_order_id?></td>
              <td><?=$row->user_email?></td>
              <?php } ?>
              <td>
                <div class="title">
                  <h6><?=$row->refill_service_id." - ".$row->service_name?></h6>
                </div>
                <div>
                  <small>
                    <ul style="margin:0px">
                    
                      <li><?=lang("Link")?>:
                        <?php
                          if (filter_var($row->link, FILTER_VALIDATE_URL)) {
                            echo '<a href="https://anon.ws/?'.$row->link.'" target="_blank">'.truncate_string($row->link, 60).'</a>';
                          } else {
                            echo truncate_string($row->link, 60);
                          }
                        ?>
                      </li> 
                      <li><?=lang("Quantity")?>: <?=$row->quantity?></li>
                      <li><?=lang("Charge")?>: 
                        <?php 
                          echo $currency_symbol.currency_format($row->charge, $decimal_places, $decimalpoint, $separator);
                        ?>
                      </li>
                      <li><?=lang("Start_counter")?>: <?=(!empty($row->start_counter)) ? $row->start_counter : ""?></li>
                      <li><?=lang("Remains")?>: <?=(!empty($row->remains)) ? $row->remains : ""?></li>
                    </ul>
                  </small>
                </div>
              </td>
              <td><?=convert_timezone($row->refill_created, "user")?></td>
              <td>
                <?php
                  $order_status = $row->refill_status;
                  if (!get_role('admin') && in_array($order_status, ['fail', 'error'])) {
                    $order_status = 'processing';
                  }
                  if ($order_status == "pending" || $order_status == "processing") {
                    $btn_background = "btn-info";
                  }elseif ($order_status == "inprogress") {
                    $btn_background = "btn-orange";
                  }elseif($order_status == "completed"){
                    $btn_background = "btn-blue";
                  }else{
                    $btn_background = "btn-danger";
                  }
                ?>
                <span class="btn round btn-sm <?=$btn_background?>"><?php echo order_status_title($order_status)?></span>
              </td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-red"><?=(empty($row->refill_note))? "" : $row->refill_note?></td>
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
