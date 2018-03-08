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
            <li class="active">Dashboard</li>
          </ul><!-- /.breadcrumb -->

        <div class="page-content">
          <div class="page-header">
            <h1>
              Dashboard
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-check green"></i>
                Welcome to xxx
              </div>
              <!-- <div class="hr hr32 hr-dotted"></div> -->

              <div class="hr hr32 hr-dotted"></div>

              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->

<?php include_once dirname(__FILE__).'/../../layouts/footer.php';?>  
