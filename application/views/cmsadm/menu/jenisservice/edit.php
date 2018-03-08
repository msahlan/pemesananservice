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
                <a href="<?php echo base_url('jenisservice');?>">Master Jenis Service</a>
              </li>
              <li class="active">Add</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Edit Data Jenis Service
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo base_url('jenisservice/actionedit/');?>" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtJenisService">Jenis Service</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-5" type="text" id="txtJenisService" placeholder="Jenis Service" name="txtJenisService" required="yes" autocomplete="off" value="<?php echo $data['chJenisService'];?>" />
                        <input class="col-xs-10 col-sm-5" type="hidden"  value="<?php echo $data['inIDJenisService'];?>" 
                        placeholder="Nama" name="inIDJenisService" id="inIDJenisService" required="yes" autocomplete="off" readonly="yes" />
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtHargaBooking">Harga Booking</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtHargaBooking" placeholder="Ex : 12345" name="txtHargaBooking" required="yes" autocomplete="off" value="<?php echo $data['inHargaBooking'];?>" />
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtHarga">Harga</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtHarga" placeholder="Ex : 12345" name="txtHarga" required="yes" autocomplete="off" value="<?php echo $data['inHarga'];?>" />
                      </div>
                    </div>
                  </div>
                  <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-6" align="center">
                      <button class="btn btn-info" type="submit" id="btnSave" name="btnSave">
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
    $('#txtHarga').keyup(function () {  
      // setiap karakter yang diketik akan langsung dihapus   
      this.value = this.value.replace(/[^0-9.]/g,'');
    });
    $('#txtHargaBooking').keyup(function () {  
      // setiap karakter yang diketik akan langsung dihapus   
      this.value = this.value.replace(/[^0-9.]/g,'');
    });
  });
</script>