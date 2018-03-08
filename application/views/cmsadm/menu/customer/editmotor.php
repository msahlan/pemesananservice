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
                <a href="<?php echo base_url('customer');?>">Master Customer</a>
              </li>
              <li class="active">
                <a href="<?php echo base_url('customer/motor/'.$inIDCustomer);?>">Master Motor Customer</a>
              </li>
              <li class="active">Edit Motor</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Edit Data Motor Customer
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo base_url('customer/actioneditmotor/'.$inIDCustomer.'/'.$chNoMotorParam);?>" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtNamaCustomer">Nama Customer</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-5" type="text" id="txtNamaCustomer" placeholder="Nama Customer" name="txtNamaCustomer" required="yes" readonly="true" autocomplete="off" value="<?php echo $dataCust['chCustomerName']; ?>"/>
                        <input class="col-xs-10 col-sm-5" type="hidden" id="inIDCustomer" placeholder="Nama Customer" name="inIDCustomer" required="yes" readonly="true" autocomplete="off" value="<?php echo $inIDCustomer;?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtPlatNomor">Plat Nomor</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-2" type="text" id="txtPlatNomor" placeholder="Plat Nomor" name="txtPlatNomor" required="yes" autocomplete="off" value="<?php echo ($reset) ? $data['chNoMotor'] : $chNoMotor; ?>" />
                        <label class="col-sm-3 control-label no-padding-left" for="txtPlatNomor" style="color: red"><?php echo validation_errors(); ?>
                        </label>
                      </div>
                    </div>
                  </div>
                 <!--  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtJenisMotor">Jenis Motor</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-8 col-sm-5" type="text" id="txtJenisMotor" placeholder="Jenis Motor" name="txtJenisMotor" required="yes" autocomplete="off" value="<?php echo ($reset) ? $data['chJenisMotor'] : $chJenisMotor; ?>"/>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtJenisMotor">Akses</label>
                    <div class="col-sm-2">
                      <div class="clearfix">
                        <select class="form-control" id="txtJenisMotor" name="txtJenisMotor" required="required">
                          <option value=""></option>

                          <option <?php echo ($reset) ? ($data['chJenisMotor'] == 'Matic')?'selected':'' : ($chJenisMotor == 'Matic')?'selected':'';?> value="Matic">Matic</option>
                          <option <?php echo ($reset) ? ($data['chJenisMotor'] == 'Bebek')?'selected':'' : ($chJenisMotor == 'Bebek')?'selected':'';?> value="Bebek">Bebek</option>
                          <option <?php echo ($reset) ? ($data['chJenisMotor'] == 'Sport')?'selected':'' : ($chJenisMotor == 'Sport')?'selected':'';?> value="Sport">Sport</option>
                        </select>
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
</script>