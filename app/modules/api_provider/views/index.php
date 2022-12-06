<div class="page-header">
  <h1 class="page-title">
    <?php 
      if(get_role("admin")) {
    ?>
    <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fa fa-plus-square tex-red" aria-hidden="true"></i></span></a> 
    <?php }?>
    <?=lang("api_providers_list")?>
  </h1>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if(!empty($api_lists)){
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="white_card">
      <div class="white_card_header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
      </div>
      <div class="table-responsive p-3">
        <table class="table table-hover table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?=lang("Action")?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($api_lists)) {
              $i = 0;
              foreach ($api_lists as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td  class="text-center"><?=$i?></td>
              <td>
                <?php
                  $api_url_base = explode("/api", $row->url);
                ?>
                <div class="title"><a href="<?=$api_url_base[0]?>" target="_blank"><?=$row->name?></a></div>
              </td>
              <td style="width: 15%;"><?=$row->balance.$row->currency_code?></td>
              <td style="width: 20%;"><?php echo html_entity_decode($row->description, ENT_QUOTES); ?></td>
              <td style="width: 10%;" >
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?=lang("Active")?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?=lang("Deactive")?></span>
                <?php }?>
              </td>

              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center" style="width: 15%;">
                <div class="btn-group">
                  <a href="<?=cn("$module/update/".$row->ids)?>" class="btn btn-icon btn-outline-info ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?=lang("edit_api")?>"><i data-feather="edit"></i></a>
                  <a href="<?=cn("$module/ajax_update_api_provider/".$row->ids)?>" data-redirect="<?=cn($module)?>"  class="btn btn-icon btn-outline-info ajaxUpdateApiProvider" data-toggle="tooltip" data-placement="bottom" title="<?=lang("update_balance")?>"><i data-feather="dollar-sign"></i></a>

                  <a href="<?=cn($module."/sync_services/".$row->ids)?>" class="btn btn-icon btn-outline-info ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?=lang("sync_services")?>"><i data-feather="refresh-cw"></i></a>

                  <a href="<?=cn('api_provider/services')?>" class="btn btn-icon btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="<?=lang("services_list_via_api")?>"><i data-feather="list"></i></a>

                  <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="btn btn-icon btn-outline-info ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?=lang("Delete")?>"><i data-feather="trash-2"></i></a>

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
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
</div>

<div class="row m-t-30" id="result_notification">

</div>