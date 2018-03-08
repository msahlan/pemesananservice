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
              <li class="active">Report Stock Sparepart</li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">
            <div class="page-header">
              <h1>
                Report Stock Sparepart
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
                            <a class="blue" class="tooltip-info" data-toggle="tooltip" title="Print" href="<?php echo base_url('sparepart/reportstock');?>">
                              <i class="ace-icon fa fa-print bigger-130"> Cetak Laporan</i>
                            </a>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="table-header">
                        List Data Report Stock Sparepart
                      </div>
                      <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                          <thead style="background-color: #abbac3;">
                            <tr>
                              <th style="line-height: 10px; background-color: #abbac3 !important;">Nama Sparepart</th>
                              <th style="line-height: 10px; background-color: #abbac3;">Kode Sparepart</th>
                              <th style="line-height: 10px; background-color: #abbac3;">Jumlan Stok</th>
                            </tr>
                           </thead>

                           <tbody>
                           <?php $i=1;foreach($report as $report) { ?>
                           <tr>
                              <td class=" "><?php echo $report['chNamaSparepart'];?></td>
                              <td class=" "><?php echo $report['chKdSparepart'];?></td>
                              <td class=" "><?php echo $report['inStock'];?></td>
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
            null
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
