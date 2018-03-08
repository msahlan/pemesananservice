<div class="main-container" id="main-container">
      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
          try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>
        <ul class="nav nav-list">
          <li class="active">
            <a href="<?php echo base_url('dashboard');?>">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-list-alt"></i>
              <span class="menu-text"> Master </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="<?php echo base_url('user'); ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  User
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('customer'); ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Konsumen
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('sparepart'); ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Sparepart
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('jenisservice'); ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Jenis Service
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('mekanik'); ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Mekanik
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-pencil-square-o"></i>
              <span class="menu-text"> Transaksi </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
               <li class="">
                <a href="<?php echo base_url('service'); ?>">
                  <i class="menu-icon fa fa-pencil-square-o"></i>
                  <span class="menu-text"> Service & Sparepart </span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('closed'); ?>">
                  <i class="menu-icon fa fa-pencil-square-o"></i>
                  <span class="menu-text"> Update Completed</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('progress'); ?>">
                  <i class="menu-icon fa fa-pencil-square-o"></i>
                  <span class="menu-text"> Update Progress</span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-file-o"></i>
              <span class="menu-text"> Laporan </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="">
                <a href="<?php echo base_url('sparepart/viewreport');?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Lap.Stock Sparepart
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="<?php echo base_url('service/reportservice');?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Lap.Service
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
          try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
      </div>