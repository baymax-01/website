<style>
.serach_field-area .search_inner input {
    color: #86898E;
    font-size: 12px;
    height: 40px;
    width: 100%;
    padding-left: 50px;
    border: 0;
    padding-right: 15px;
    background: transparent;
    border-radius: 30px;
    border: 0;
    border: 0px solid rgb(237 77 95);
    font-weight: 400;
}
.serach_field-area .search_inner button {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    background: transparent;
    font-size: 12px;
    border: 0;
    padding-left: 0px; 
    padding-right: 3px;
}
</style>
<li class="d-lg-block d-none">
    <div class="serach_button">
      <i class="ti-search"></i>
      <div class="serach_field-area d-flex align-items-center">
        <div class="search_inner">
        <form class="<?php echo $requests['class']; ?>" method="<?php echo $requests['method']; ?>" action="<?php echo $requests['action']; ?>">
            <div style="border-radius: 10px; border: 1px solid rgb(237 77 95);" class="search_field col-lg-12 row">
              <input class="col-md-6" name="query" type="text" placeholder="Search here..." value="<?php echo get('query'); ?>">
              <?php
    	     		if (!get_role('user') && $data_search) {
    	     	?>
    	      	<select class="col-md-6" name="search_type" style="border: none;">
    	      		<?php
    	      			foreach ($data_search as $key => $row) {
    	      		?>
    		        <option value="<?php echo $key; ?>" <?php if(get('search_type') == $key) echo "selected"; ?>><?php echo $row; ?></option>
    		        <?php }; ?>
    	      	</select>
    	        <?php }; ?>
            </div>
            <button class="close_search"> <i class="ti-search"></i> </button>
          </form>
        </div>
      </div>
    </div>
</li>