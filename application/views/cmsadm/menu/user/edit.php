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
              	<a href="<?php echo base_url('user');?>">Master User</a>
              </li>
              <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Edit Data User
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
           			<form class="form-horizontal" role="form" action="<?php echo base_url('user/actionedit/'.$chUsernameParam);?>" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtName">Nama</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-3" type="text" id="txtName" placeholder="Nama" name="txtName" required="yes" autocomplete="off" value="<?php echo ($reset) ? "" : $chNama; ?>"/>
                        <label class="col-sm-3 control-label no-padding-left" for="txtName" style="color: red"><?php echo validation_errors(); ?>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtNik">NIK</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-3" type="text" id="txtNik" placeholder="NIK" name="txtNik" required="yes" autocomplete="off" value="<?php echo ($reset) ? "" : $chNik; ?>"/>
                        <label class="col-sm-3 control-label no-padding-left" for="txtNik" style="color: red"><?php echo validation_errors(); ?>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtJabatan">Jabatan</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-3" type="text" id="txtJabatan" placeholder="Jabatan" name="txtJabatan" required="yes" autocomplete="off" value="<?php echo ($reset) ? "" : $chJabatan; ?>"/>
                        <label class="col-sm-3 control-label no-padding-left" for="txtJabatan" style="color: red"><?php echo validation_errors(); ?>
                        </label>
                      </div>
                    </div>
                  </div>
        					<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtUsername">Username</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-3" type="text" id="txtUsername" placeholder="Username" name="txtUsername" autocomplete="off" value="<?php echo ($reset) ? $data['chUsername'] : $chUsername; ?>" />
                        <label class="col-sm-3 control-label no-padding-left" for="txtUsername" style="color: red"><?php echo validation_errors(); ?>
                        </label>
                        <input class="col-xs-10 col-sm-5" type="hidden" value="<?php echo ($reset) ? $data['inIDUser'] : $inIDUser; ?>"
                        placeholder="Nama" name="inIDUser" id="inIDUser" required="yes" autocomplete="off" readonly="yes" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="txtPassword">Password</label>
                    <div class="col-sm-9">
                      <div class="clearfix">
                        <input class="col-xs-10 col-sm-5" type="password" id="txtPassword" placeholder="Password" name="txtPassword" autocomplete="off" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="cmbLevel">Akses</label>
                    <div class="col-sm-2">
                      <div class="clearfix">
                        <select class="form-control" id="cmbLevel" name="cmbLevel" required="required" <?php echo($data['chLevel'] == 'Customer')?'disabled':'' ;?>>
                          <option value=""></option>

                          <option <?php echo ($reset) ? ($data['chLevel'] == 'Administrator')?'selected':'' : ($chLevel == 'Administrator')?'selected':'';?> value="Administrator">Administrator</option>
                          <option <?php echo ($reset) ? ($data['chLevel'] == 'Owner')?'selected':'' : ($chLevel == 'Owner')?'selected':'';?> value="Owner">Owner</option>
                          <option <?php echo ($reset) ? ($data['chLevel'] == 'Customer')?'selected':'' : ($chLevel == 'Customer')?'selected':'';?> disabled value="Customer">Customer</option>
                        </select>
                      </div>
                    </div>
                  </div>
        					<div class="clearfix form-actions">
        						<div class="col-md-offset-3 col-md-6" align="center">
        							<button class="btn btn-info" type="submit" id="btnSave" name="btnSave">
        								<i class="ace-icon fa fa-check bigger-110"></i>
        								Simpan
        							</button>

        							&nbsp; &nbsp; &nbsp;
        							<button class="btn" type="reset" id="btnReset" name="btnReset">
        								<i class="ace-icon fa fa-undo bigger-110"></i>
        								Batal
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