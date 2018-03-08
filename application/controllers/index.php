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
              <li class="active">Booking Service Confirmation</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Booking Service Confirmation
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
               <!--  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('service/cux');?>" method="POST"> -->
                	<div class="row">
                    <div class="col-xs-12">
                      <div class="clearfix">
                      </div>
                      <div class="table-header">
                        List Data Booking Service
                      </div>
                      <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No Service</th>
                              <th>Tanggal Booking</th>
                              <th>Nama Customer</th>
                              <th>Telephone</th>
              							  <th>Jenis Service</th>
              							  <th>Status</th>
                              <th>Detail</th>
                            </tr>
                           </thead>

                           <tbody>
                           <?php $i=1;foreach($confirm as $confirm) { ?>
                           <tr>
                           <div class="col-xs-12 col-sm-6">
                              <td class=" "><?php echo $confirm['chNoService'];?></td>
                              <td class=" "><?php echo date("d F Y", strtotime($confirm['dtCreateDate']));?></td>
                              <td class=" "><?php echo $confirm['chCustomerName'];?></td>
                              <td class=" "><?php echo $confirm['chPhone'];?></td>
              							  <td class=" "><?php echo $confirm['chJenisService'];?></td>
              							  <td class=" "><?php echo $confirm['loStatus'];?></td>
                              <td> 
                                <div class="hidden-sm hidden-xs action-buttons">
                                  <a class="green" href="<?php echo base_url('confirm/detail/'.$confirm['chNoService'].'/'.$confirm['loStatus']);?>">
                                    <i class="ace-icon fa fa-gears bigger-130"></i>
                                  </a>
                                  <a class="green" href="#" data-href="<?php echo base_url('confirm/detail/'.$confirm['chNoService'].'/'.$confirm['loStatus']);?>">
                                    <i class="ace-icon fa fa-check bigger-130" data-toggle="modal" data-target="#confirm-delete<?php echo $i;?>" ></i>
                                  </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                  <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                      <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                      <li>
                                        <a href="<?php echo base_url('confirm/detail/'.$confirm['chNoService'].'/'.$confirm['loStatus']);?>" class="tooltip-success" data-rel="tooltip" title="Detail">
                                          <span class="green">
                                            <i class="ace-icon fa fa-gears bigger-120"></i>
                                          </span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="<?php echo base_url('confirm/detail/'.$confirm['chNoService'].'/'.$confirm['loStatus']);?>" class="tooltip-success" data-rel="tooltip" title="Confirm">
                                          <span class="green">
                                            <i class="ace-icon fa fa-check bigger-120"></i>
                                          </span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                                <form class="form-horizontal" role="form" action="<?php echo base_url('confirm/actionconfirm/'.$confirm['chNoService'].'/'.$confirm['inIDCustomer']);?>" enctype="multipart/form-data" method="POST">
                                <div class="modal fade" id="confirm-delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Confirm Booking Service</h4>
                                        </div>
                                    
                                        <div class="modal-body">
                                            <p>You are about to confirm this booking service.</p>
                                            <p>Do you want to proceed?</p>
                                            <p>
                                              <?php echo form_dropdown('cmbMekanik', $mekanik, "", 'required="required" class="form-control" id="cmbMekanik"'); ?>
                                            </p>
                                            
                                            <p class="debug-url"></p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-danger danger" >Confirm</button>
                                        </div>
                                    </div>
                                  </div>
                                  </form>
                                </div>
                              </div>
                              </td>
                            </tr>
                            <?php $i++;}?>
                           </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                  </div>

                <!-- </form> -->
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<?php include_once dirname(__FILE__).'/../../layouts/footer.php';?> 
<script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var oTable1 = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
          bAutoWidth: false,
          "aoColumns": [
            { "bSortable": true },
            null, null, null, null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
      
          } );
        //oTable1.fnAdjustColumnSizing();
      
        //TableTools settings
        TableTools.classes.container = "btn-group btn-overlap";
        TableTools.classes.print = {
          "body": "DTTT_Print",
          "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
          "message": "tableTools-print-navbar"
        }
        
        //initiate TableTools extension
        var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
          "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",
          "sRowSelector": "td:not(:last-child)",
          "sRowSelect": "multi",
           "fnRowSelected": function(row) {
            //check checkbox when row is selected
            try { $(row).find('input[type=checkbox]').get(0).checked = true }
            catch(e) {}
          },
          "fnRowDeselected": function(row) {
            //uncheck checkbox
            try { $(row).find('input[type=checkbox]').get(0).checked = false }
            catch(e) {}
          },
      
          "sSelectedClass": "success",
              "aButtons": [
            
              ]
          } );

        //we put a container before our table and append TableTools element to it
        $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
     
        setTimeout(function() {
          $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
            var div = $(this).find('> div');
            if(div.length > 0) div.tooltip({container: 'body'});
            else $(this).tooltip({container: 'body'});
          });
        }, 200);
        
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
      })
</script> 

