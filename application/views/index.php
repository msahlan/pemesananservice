<?php 
    $css          = $this->config->item('css');
    $js           = $this->config->item('js');
    $font         = $this->config->item('font');
    $fontawesome  = $this->config->item('font-awesome');
    $images       = $this->config->item('images');
    $avatars      = $this->config->item('avatars');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $fontawesome;?>4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $font;?>fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo $css;?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo $css;?>ace-rtl.min.css" />
    <style type="text/css">
    body {
      background-color: #fff;
      font: 17px/18px normal Helvetica, Arial, sans-serif;  
    }</style>
  </head>

  <body class="login-layout blur-login">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
             
             <br/><br/><br/><br/><br/><br/>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                    <img src="<?php echo $images;?>logos.png"  style="height: 70%; width: 70%; padding-left: 50px;">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-user"></i>
                        Login Admin
                      </h4>

                      <div class="space-6"></div>

                      <form action="" method="POST">
                        <fieldset>
                          <label class="block clearfix">User Name :
                            <span class="block input-icon input-icon-right">
                              <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" autocomplete="off" value="<?php echo ($reset) ? "" : $chUsername; ?>" />
                              <i class="ace-icon fa fa-user"></i>
                              <label class="col-sm-12 control-label no-padding-left" style="color: red"><?php echo form_error('txtUsername'); ?>
                              </label>
                            </span>
                          </label>

                          <label class="block clearfix">Password :
                            <span class="block input-icon input-icon-right">
                              <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" value="<?php echo ($reset) ? "" : $chPassword; ?>" />
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                            <label class="col-sm-12 control-label no-padding-left" style="color: red"><?php echo form_error('txtPassword'); ?>
                            </label>
                            <label class="col-sm-12 control-label no-padding-left" style="color: red"><?php echo $error; ?>
                            </label>
                          </label>

                          <div class="space"></div>
                          <div class="clearfix">
                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Login</span>
                            </button>
                            
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
              </div><!-- /.position-relative -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

  
    <script src="<?php echo $js;?>jquery.2.1.1.min.js"></script>

    <script type="text/javascript">
      window.jQuery || document.write("<script src='<?php echo $js;?>jquery.min.js'>"+"<"+"/script>");
    </script>

  
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $js;?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
       });
      });
     
    </script>
  </body>
</html>
