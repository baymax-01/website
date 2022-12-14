<div class="page-header">
  <h1 class="page-title">
    <a href="<?=cn("$module/update")?>" class=""><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add new"><i class="fa fa-plus-square tex-red" aria-hidden="true"></i></span></a> 
    <?=lang("Language")?>
  </h1>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($languages)){
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
        
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              <th class="text-center"><?=lang("Action")?></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($languages)) {
              $i = 0;
              foreach ($languages as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <td>
                <div class="title"><h6><?=language_codes($row->code)?></h6></div>
              </td>
              <td class="text-uppercase"><?=$row->code?></td>
              <td><span class="flag-icon flag-icon-<?=strtolower($row->country_code)?>"></span></td>
              <td><?=($row->is_default==1)? lang('Yes') : lang('No') ?></td>
              <td><?=$row->created?></td>
              <td>
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="btn round btn-info btn-sm"><?=lang("Active")?></span>
                  <?php }else{?>
                  <span class="btn round btn-warning btn-sm"><?=lang("Deactive")?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i data-feather="more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>
                    <?php
                      if (get_role('admin')) {
                    ?>
                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem">  <i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> 
                    </a>
                    <?php }?>
                  </div>
                </div>
              </td>
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