<?php include_once dirname(__FILE__).'/../../layouts/header.php';?>
<br />
<?php include_once dirname(__FILE__).'/../../layouts/menu.php';?>

  <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo base_url('dashboard');?>">Home</a>
              </li>
              <li class="active">
                <a href="<?php echo base_url('service');?>">Service & Sparepart</a>
              </li>
              <li class="active">
                <a href="<?php echo base_url('service/detail/'.$noservice.'/'.$status);?>"> Detail Sparepart </a>
              </li>
              <li class="active">Edit Detail Sparepart</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Edit Detail Sparepart
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo base_url('service/actioneditdetail/'.$noservice.'/'.$idsparepart.'/'.$status);?>" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="cmbSparepart">Sparepart</label>
                    <div class="col-sm-4">
                      <div class="clearfix">
                        <?php echo form_dropdown('cmbSparepart', $sparepart, $idsparepart, 'required="required" class="form-control" id="cmbSparepart" disabled'); ?>
                         <input class="col-xs-10 col-sm-5" type="hidden" id="txtNoService" placeholder="Nama Customer" name="txtNoService" required="yes" readonly="true" autocomplete="off" value="<?php echo $noservice;?>"/>
                      </div>
                      <label class="col-sm-6 control-label no-padding-left" for="cmbSparepart" style="color: red"><?php echo validation_errors(); ?>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtHarga">Harga</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtHarga" placeholder="Ex : 12345" readonly="yes" name="txtHarga" autocomplete="off" value="<?php echo ($type == 'Offline')?$dataSparepart['inHarga']:$dataSparepart['inHargaBooking'] ; ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtOngkosPasang">Ongkos Pasang</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtOngkosPasang" placeholder="Ex : 12345" readonly="yes" name="txtOngkosPasang" autocomplete="off" value="<?php echo $dataSparepart['inOngkosPasang']; ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtStock">Available Stock</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtStock" placeholder="Ex : 12345" name="txtStock" autocomplete="off" readonly="yes" value="<?php echo $dataSparepart['inStock']; ?>" />
                        <input class="col-xs-1" type="hidden" id="txtQtyOld" placeholder="Ex : 12345" name="txtQtyOld" autocomplete="off" readonly="yes" value="<?php echo $data['0']['inQty']; ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtQty">Qty</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtQty" placeholder="Ex : 12345" name="txtQty" required="yes" autocomplete="off" value="<?php echo $data['0']['inQty']; ?>" <?php echo($status == 'Closed' || $status == 'Cancel')?'readonly':'' ;?> />
                      </div>
                    </div>
                  </div>
                  <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-6" align="center">
                      <button class="btn btn-info" type="submit" id="btnSave" name="btnSave" <?php echo($status == 'Closed' || $status == 'Cancel')?'disabled':'' ;?>>
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Save
                      </button>

                      &nbsp; &nbsp; &nbsp;
                      <button class="btn" type="reset" id="btnReset" name="btnReset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                      </button>
                    </div>
                  </div>
                </form>
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<?php include_once dirname(__FILE__).'/../../layouts/footer.php';?>
<script type="text/javascript">
  jQuery(function($) {
    
    if(!ace.vars['touch']) {
      $('.chosen-select').chosen({allow_single_deselect:true}); 
      //resize the chosen on window resize
  
      $(window)
      .off('resize.chosen')
      .on('resize.chosen', function() {
        $('.chosen-select').each(function() {
           var $this = $(this);
           $this.next().css({'width': $this.parent().width()});
        })
      }).trigger('resize.chosen');
      //resize chosen on sidebar collapse/expand
      $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
        if(event_name != 'sidebar_collapsed') return;
        $('.chosen-select').each(function() {
           var $this = $(this);
           $this.next().css({'width': $this.parent().width()});
        })
      });
    }
  });
  $(document).ready(function() {
    $('#txtQty').keyup(function () {  
      // setiap karakter yang diketik akan langsung dihapus   
      this.value = this.value.replace(/[^0-9.]/g,'');
    });
  });
  $(document).ready(function() {
      $('#txtQty').keyup(function () {  
        var qty = this.value;
        var oldstock = document.getElementById("txtStock").value;
        if(parseInt(qty) > parseInt(oldstock))
          this.value = oldstock;  
        else
          this.value = qty;
      });
  });
  $('#cmbSparepart').on('change', function () {
    var textBoxVal = $(this).val();
    txtQty.focus();
    if (textBoxVal != "")
    {
      $.ajax({ 
          method: 'GET',
          url: '<?php echo base_url();?>sparepart/getStock/'+textBoxVal, // link to CI function
          data: {
              id: textBoxVal
          },
          success: function (result) {
              $('#txtStock').val(result);
          }
      });
      $.ajax({ 
          method: 'GET',
          url: '<?php echo base_url();?>sparepart/getHarga/'+textBoxVal, // link to CI function
          data: {
              id: textBoxVal
          },
          success: function (result) {
              $('#txtHarga').val(result);
          }
      });
      $.ajax({ 
          method: 'GET',
          url: '<?php echo base_url();?>sparepart/getOngkos/'+textBoxVal, // link to CI function
          data: {
              id: textBoxVal
          },
          success: function (result) {
              $('#txtOngkosPasang').val(result);
          }
      });
    }
    else
    {
      $('#txtOngkosPasang').val('');
      $('#txtHarga').val('');
      $('#txtStock').val('');
    }
  });
</script>