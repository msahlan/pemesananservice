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
              <li class="active">Update Status Complete Service</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Update Status Complete Service
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
                           <?php $i=1;foreach($closed as $closed) { ?>
                           <tr>
                           <div class="col-xs-12 col-sm-6">
                              <td class=" "><?php echo $closed['chNoService'];?></td>
                              <td class=" "><?php echo date("d F Y", strtotime($closed['dtCreateDate']));?></td>
                              <td class=" "><?php echo $closed['chCustomerName'];?></td>
                              <td class=" "><?php echo $closed['chPhone'];?></td>
              							  <td class=" "><?php echo $closed['chJenisService'];?></td>
              							  <td class=" "><?php echo $closed['loStatus'];?></td>
                              <td> 
                                <div class="hidden-sm hidden-xs action-buttons">
                                  <a class="green" href="<?php echo base_url('closed/detail/'.$closed['chNoService'].'/'.$closed['loStatus']);?>">
                                    <i class="ace-icon fa fa-gears bigger-130"></i>
                                  </a>
                                  <a class="green" href="#" data-href="<?php echo base_url('closed/detail/'.$closed['chNoService'].'/'.$closed['loStatus']);?>">
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
                                        <a href="<?php echo base_url('closed/detail/'.$closed['chNoService'].'/'.$closed['loStatus']);?>" class="tooltip-success" data-rel="tooltip" title="Detail">
                                          <span class="green">
                                            <i class="ace-icon fa fa-gears bigger-120"></i>
                                          </span>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="<?php echo base_url('closed/detail/'.$closed['chNoService'].'/'.$closed['loStatus']);?>" class="tooltip-success" data-rel="tooltip" title="Closed">
                                          <span class="green">
                                            <i class="ace-icon fa fa-check bigger-120"></i>
                                          </span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                                <form class="form-horizontal" role="form" action="<?php echo base_url('closed/actionclosed/'.$closed['chNoService'].'/'.$closed['inIDCustomer']);?>" enctype="multipart/form-data" method="POST">
                                <div class="modal fade" id="confirm-delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Update Status Complete Service</h4>
                                        </div>
                                    
                                        <div class="modal-body">
                                            <p>You are about to compelete this booking service.</p>
                                            <p>Do you want to proceed?</p>
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

