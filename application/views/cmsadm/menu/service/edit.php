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
              <li class="active">Edit Data Service</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Edit Data Service
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
           			<form class="form-horizontal" role="form" action="<?php echo base_url('service/actionedit/'.$noservice);?>" enctype="multipart/form-data" method="POST">
        					<div class="form-group">
                  <input class="col-xs-1" type="hidden" id="txtNoService" placeholder="Ex : 12345" readonly="yes" name="txtNoService" autocomplete="off" value="<?php echo $noservice;?>" />
        						<label class="col-sm-3 control-label no-padding-right" for="txtNamaCustomer">Nama Customer</label>
		                <div class="col-sm-4">
                      <div class="clearfix">
                        <?php echo form_dropdown('cmbCustomer', $customer, $data['0']['inIDCustomer'], 'required="required" disabled class="form-control" id="cmbCustomer"'); ?>
                      </div>
                    </div>
        					</div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="cmbPlatNomor">Plat Nomor</label>
                    <div class="col-sm-2">
                      <div class="clearfix">
                        <?php 
                          if ($status == "Closed" || $status == "Cancel" || $status == "OnProgress")
                          {
                              echo form_dropdown('cmbPlatNomor', $platno, $data['0']['chNoMotor'] , 'required="required" class="form-control" disabled id="cmbPlatNomor"');
                          }
                          else
                          {
                              echo form_dropdown('cmbPlatNomor', $platno, $data['0']['chNoMotor'] , 'required="required" class="form-control" id="cmbPlatNomor"');
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="cmbMekanik">Nama Mekanik</label>
                    <div class="col-sm-4">
                      <div class="clearfix">
                      <?php  
                        if ($status == "Closed" || $status == "Cancel" || $status == "OnProgress")
                        {
                            echo form_dropdown('cmbMekanik', $mekanik, $data['0']['inIDMekanik'] , 'required="required" class="form-control" disabled id="cmbMekanik"');
                        }
                        else
                        {
                            echo form_dropdown('cmbMekanik', $mekanik, $data['0']['inIDMekanik'] , 'required="required" class="form-control" id="cmbMekanik"');
                        }
                      ?>
                        
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="cmbJenisService">Jenis Service</label>
                    <div class="col-sm-3">
                      <div class="clearfix">
                        <?php 
                          if ($status == "Closed" || $status == "Cancel" || $status == "OnProgress")
                          {
                            echo form_dropdown('cmbJenisService', $jenisservice, $data['0']['inIDJenisService'], 'required="required" disabled class="form-control" id="cmbJenisService" ');
                          }
                          else
                          {
                            echo form_dropdown('cmbJenisService', $jenisservice, $data['0']['inIDJenisService'], 'required="required" class="form-control" id="cmbJenisService" ');
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtTglService">Tanggal Service</label>
                    <div class="col-sm-2">
                      <div class="clearfix">
                        <input class="form-control date-picker" id="txtTglService" name="txtTglService" type="text" data-date-format="yyyy-mm-dd" readonly="yes" required="yes" value="<?php echo $data['0']['daServiceDate'];?>"  />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="dpTime">Waktu</label>
                    <div class="col-sm-3">
                      <div id="datetimepicker3" class="input-append">
                        <input type="text" id="dpTime" name="dpTime" class="col-xs-3" placeholder="00:00" required="required"
                        readonly="yes" value="<?php echo $data['0']['chTime'];?>" ></input>
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtHarga">Harga</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-1" type="text" id="txtHarga" placeholder="Ex : 12345" readonly="yes" name="txtHarga" autocomplete="off" value="<?php echo $dataJenis['inHarga'];?>" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtKeluhan">Keluhan</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <textarea id="txtKeluhan" name="txtKeluhan" placeholder="Keluhan" class="autosize-transition form-control"><?php echo $data['0']['chProblem'];?></textarea>
                      </div>
                    </div>
                  </div>
        					<div class="clearfix form-actions">
        						<div class="col-md-offset-3 col-md-6" align="center">
        							<button class="btn btn-info" type="submit" id="btnSave" name="btnSave" <?php echo($status == 'Closed' || $status == 'Cancel' || $status == 'OnProgress')?'disabled':'' ;?>>
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
  $('textarea[class*=autosize]').autosize({append: "\n"});
  $(function() {
    $('#datetimepicker3').datetimepicker({
        format: 'HH:mm',
        pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false 
    });
  });
  //datepicker plugin
        //link
  $('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
  })
  //show datepicker when clicking on the icon
  .next().on(ace.click_event, function(){
    $(this).prev().focus();
  });

  //or change it into a date range picker
  $('.input-daterange').datepicker({autoclose:true});
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
  $('#cmbJenisService').on('change', function () {
    var textBoxVal = $(this).val();
    var textNoService = $('#txtNoService').val();
    if (textBoxVal != "")
    {
      $.ajax({ 
          method: 'GET',
          url: '<?php echo base_url();?>jenisservice/getHarga/'+textNoService+'/'+textBoxVal, // link to CI function
          data: {
              id: textBoxVal
          },
          success: function (result) {
              $('#txtHarga').val(result);
          }
      });
    }
    else
    {
      $('#txtHarga').val('');
    }
  });
</script>