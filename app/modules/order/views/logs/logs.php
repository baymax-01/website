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
    <a href="<?=cn("$module/add")?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?=lang("add_new")?>"><i class="fa fa-plus-square tex-red" aria-hidden="true"></i></span>
    </a>
    <?=lang("order_logs")?>
  </h1>

  <div class="page-options d-flex">
    <ul class="list-inline mb-0 order_btn_group mx-auto mb-2 mt-2">
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'all') ? 'btn-info' : ''?>" href="<?=cn($module."/log/all")?>"><?=lang('All')?></a></li>
      <?php 
        $status_array = order_status_array();
        if (!empty($status_array)) {
          foreach ($status_array as $row_status) {
            if ((get_role('user')) && in_array($row_status, ['error'])) {
              continue;
            }
      ?>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == $row_status) ? 'btn-info' : ''?>" href="<?=cn($module."/log/".$row_status)?>"><?=order_status_title($row_status)?>
          <?php
            if (in_array($row_status, ['error']) && isset($number_error_orders)) {
              echo '<span class="badge badge-danger badge-error-orders">'.$number_error_orders.'</span>';
            }
          ?>
        </a>
      </li>
      <?php }}?>
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
      <div class="table-responsive p-3">
        <table class="table table-hover table-vcenter card-table">
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
              <td><?=$row->id?></td>
              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-center"><?=($row->api_order_id == 0 || $row->api_order_id ==-1)? "" : $row->api_order_id?></td>
              
              <td><?=$row->user_email?></td>
              <?php } ?>
              <td>
                <div class="title">
                  <h6><?=$row->service_id." - ".$row->service_name?></h6>
                </div>
                <div>
                  <small>
                    <ul style="margin:0px">
                      <?php
                        if (get_role("admin")) {
                      ?>
                      <li>
                        <?php echo lang("Type")?>: 
                        <?php 
                          if (!empty($row->api_service_id) && $row->api_service_id != "") {
                            if ($row->type == 'api') {
                              echo $row->api_name." (ID".$row->api_service_id. ")" . ' <span class="badge badge-default">API</span>';
                            }else{
                              echo $row->api_name." (ID".$row->api_service_id. ")";
                            }
                          }else{
                            echo lang("Manual");
                          }
                        ?>
                      </li>
                      <?php }?>

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

                        <?php
                          if (get_role("admin") && $row->formal_charge != 0) {
                            echo '('. $row->formal_charge. ' / <span class="text-info">'. $row->profit .'</span>)';
                          }
                        ?>
                      </li>
                      <li><?=lang("Start_counter")?>: <?=(!empty($row->start_counter)) ? $row->start_counter : ""?></li>
                      <li><?=lang("Remains")?>: <?=(!empty($row->remains)) ? $row->remains : ""?></li>
                      <?php
                        $mention_list = get_list_custom_mention($row);
                        if($mention_list->exists_list){
                      ?>
                      <li><a href="<?=cn($module.'/ajax_show_list_custom_mention/'.$row->ids)?>" class="btn btn-gray btn-sm ajaxModal btn-show-custom-mention"><?=$mention_list->title?></a></li>
                      <?php }?>
                    </ul>
                  </small>
                </div>
              </td>
              <td><?=convert_timezone($row->created, "user")?></td>
              <td>
                <?php
                  $order_status = $row->status;
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
              
              <td><?php 
                if($row->service_refill){
                  if($row->status == "completed"){
                    $d1= new DateTime($row->created); // first date
                    $d2= new DateTime(NOW); // second date
                    $interval= $d1->diff($d2); // get difference between two dates
                    $diff = ($interval->days * 24) + $interval->h;
                    if($diff >= "24"){
                      if($this->model->get_is_already_refill($row->id) == "0"){ ?>
                        <form class="form actionForm" action="<?= cn($module . "/refill_order/$row->id") ?>" data-redirect="<?= cn($module . "/log") ?>" method="POST"><button class="btn btn-success" type="submit">Refill</button></form>
                    <?php 
                      }else{ ?>
                        <button class="btn btn-success disabled" data-toggle="tooltip" data-original-title="Refill is already in progress">Refill</button>
                     <?php
                      }
                    }else{ ?>
                      <button class="btn btn-success disabled" data-toggle="tooltip" data-original-title="Refill can be done 24H after order">Refill</button>
                   <?php
                    }
                  }else{ ?>
                    <button class="btn btn-success disabled" data-toggle="tooltip" data-original-title="Order not completed">Refill</button>
                 <?php
                  }
                }
                ?>
                
              </td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-red"><?=(empty($row->note))? "" : $row->note?></td>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i data-feather="more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <a href="<?=cn("$module/log_update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>
                    <?php
                      if (get_role('admin')) {
                    ?>
                    <?php
                      if ($row->status == 'error') {
                    ?> 
                    <a href="<?=cn("$module/change_status/resend_order/".$row->ids)?>" class="dropdown-item"><i class="dropdown-icon fe fe-send"></i> Resend Order </a>
                    <?php }; ?>

                    <a href="<?=cn("$module/ajax_log_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
                    <?php } ?>
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
