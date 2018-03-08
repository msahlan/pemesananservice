<?php 
    $css          = $this->config->item('css');
    $js           = $this->config->item('js');
    $font         = $this->config->item('font');
    $fontawesome  = $this->config->item('font-awesome');
    $images       = $this->config->item('images');
    $avatars      = $this->config->item('avatars');
    $upload       = $this->config->item('images_upload');
    /*$datauser = $this->model_administrator->get_administrator($this->session->userdata('adminid'));*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Booking Service Sepeda Motor</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="<?php echo $css;?>bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $fontawesome;?>4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $font;?>fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo $css;?>ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo $css;?>datepicker.min.css" />
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo $css;?>daterangepicker.min.css" />
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo $css;?>chosen.min.css" />
    <script src="<?php echo $js;?>ace-extra.min.js"></script>
  </head>
  <body class="no-skin">
    <style type="text/css">
    body {
      background-color: #fff;
      font: 15px/16px normal Helvetica, Arial, sans-serif;  
    }
    </style>
    <div id="navbar" class="navbar navbar-default">
      <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

      <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            
          <a href="<?php base_url('dashboard') ?>" class="navbar-brand">
          <img src="<?php echo $images;?>logo.png" style="height: 50%; width: 50%;">
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">
            <li class="purple">
              <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                <span class="badge badge-important" id="notification_count"></span>
              </a> -->
              <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="ace-icon fa fa-exclamation-triangle" ></i>
                  <span id="notification_msg"></span>
                </li>
                <?php 
                  if ($this->input->post('txtNoService'))
                ?>
                <li class="dropdown-content">
                  <ul class="dropdown-menu dropdown-navbar navbar-pink">
                    <li>
                      <a href="<?php echo base_url('confirm');?>">
                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                        Booking Service Confirmation
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="<?php echo $avatars;?>user.png" alt="Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  <?php echo $this->session->userdata['adminname'];?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog"></i>
                    Settings
                  </a>
                </li>

                <li>
                  <a href="profile.html">
                    <i class="ace-icon fa fa-user"></i>
                    Profile
                  </a>
                </li>

                <li class="divider"></li>

                <li>
                  <a href="<?php echo base_url('auth/logout');?>">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-container -->
    </div>

   