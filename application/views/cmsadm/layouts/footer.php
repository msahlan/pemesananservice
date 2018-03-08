<div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              Pemesanan Service Sepeda Motor &copy; 2017
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <script src="<?php echo $js;?>jquery.2.1.1.min.js"></script>
    <script type="text/javascript">
      window.jQuery || document.write("<script src='<?php echo $js;?>jquery.min.js'>"+"<"+"/script>");
    </script>
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $js;?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo $js;?>bootstrap.min.js"></script>

    <script src="<?php echo $js;?>ace-elements.min.js"></script>
    <script src="<?php echo $js;?>ace.min.js"></script>

    <script src="<?php echo $js;?>jquery.dataTables.min.js"></script>
    <script src="<?php echo $js;?>jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $js;?>dataTables.tableTools.min.js"></script>
    <script src="<?php echo $js;?>dataTables.colVis.min.js"></script>
    
   
    <script src="<?php echo $js;?>jquery-ui.custom.min.js"></script>
    <script src="<?php echo $js;?>jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $js;?>chosen.jquery.min.js"></script>
    <script src="<?php echo $js;?>fuelux.spinner.min.js"></script>
    <script src="<?php echo $js;?>ajax.js"></script>
    <script src="<?php echo $js;?>bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $js;?>bootstrap-timepicker.min.js"></script>
    <script src="<?php echo $js;?>moment.min.js"></script>
    <script src="<?php echo $js;?>daterangepicker.min.js"></script>
    <script src="<?php echo $js;?>bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo $js;?>bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo $js;?>jquery.knob.min.js"></script>
    <script src="<?php echo $js;?>jquery.autosize.min.js"></script>
    <script src="<?php echo $js;?>jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="<?php echo $js;?>jquery.maskedinput.min.js"></script>
    <script src="<?php echo $js;?>bootstrap-tag.min.js"></script>    
    <script type="text/javascript">
      $(document).ready(function(){
          waitForMsg();
        });
        function addmsg(type, msg){
          $('#notification_count').html(msg);
        }
        function addnotif(type, msg){
          $('#notification_msg').html(msg);
        }
        function waitForMsg(){
          $.ajax({
          type: "GET",
          url: '<?php echo base_url();?>service/getBooking',
           
          async: true,
          cache: false,
          timeout:5000,
           
          success: function(data){
          addmsg("new", data);
          addnotif("new","You Have " +data+ " Notification");
          setTimeout(
          waitForMsg,
          1000
          );
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
          addmsg("error", textStatus + " (" + errorThrown + ")");
          setTimeout(
          waitForMsg,
          1500);
          }
          });
        };
    </script>
  </body>
</html>
