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
              <li class="active">Service & Sparepart</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Service & Sparepart
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                	<div class="row">
                    <div class="col-xs-12">
                      <div class="clearfix">
                      <div class="pull-left tableTools-container"></div>
                        <div id="baseDateControl" align="left">
                          <div class="dateControlBlock">
                            <a class="blue" class="tooltip-info" data-toggle="tooltip" title="Add New" href="<?php echo base_url('service/add');?>">
                              <button type="button" class="btn btn-primary">Tambah Data Service</button>
                            </a>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="table-header">
                        List Data Service & Sparepart
                      </div>
                      <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No Service</th>
                              <th>Tanggal Service</th>
                              <th>Nama Customer</th>
              							  <th>Jenis Service</th>
              							  <th>Total Harga</th>
              							  <th>Status</th>
                              <th>Action</th>
                            </tr>
                           </thead>

                           <tbody>
                           <?php $i=1;foreach($service as $service) { ?>
                           <tr>
                              <td class=" "><?php echo $service['chNoService'];?></td>
                              <td class=" "><?php echo date("d F Y", strtotime($service['daServiceDate']));?></td>
                              <td class=" "><?php echo $service['chCustomerName'];?></td>
              							  <td class=" "><?php echo $service['chJenisService'];?></td>
              							  <td class=" "><?php echo 'Rp. ' . number_format($service['inTotalHarga'],2,',','.');?></td>
              							  <td class=" "><?php echo $service['loStatus'];?></td>
                              <td> 
                                <div class="hidden-sm hidden-xs action-buttons">

                                  <a class="green" href="<?php echo base_url('service/edit/'.$service['chNoService'].'/'.$service['loStatus']);?>">
                                    <i class="ace-icon fa fa-pencil bigger-130" ></i>
                                  </a>
                                  <a class="green" href="<?php echo base_url('service/detail/'.$service['chNoService'].'/'.$service['loStatus']);?>">
                                    <i class="ace-icon fa fa-gears bigger-130"></i>
                                  </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                  </button>

                                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                                    <li>
                                      <a href="<?php echo base_url('service/edit/'.$service['chNoService']);?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                      </a>
                                      <a href="<?php echo base_url('service/detail/'.$service['chNoService'].'/'.$service['loStatus']);?>" class="tooltip-success" data-rel="tooltip" title="Detail">
                                        <span class="green">
                                          <i class="ace-icon fa fa-gears bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
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
        
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
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
