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
<html>
<head>
    <title>Laporan Service</title>
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
</head>
    <style type="text/css">
    body{
        background-color: white;
        font-style: helvetica;
    }
    </style>
<body>
    <?php 
    function rupiah($angka){
     $rupiah=number_format($angka,0,',','.');
     return $rupiah;
    }
    ?>
    <div class="row" style="padding-bottom: 2px !important;">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-bottom: 12px !important; ">
            <img class="logo" src="<?php echo $images;?>logo.png" alt="" />   
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" >
            <h3 style=" padding-left: 50px; padding-top: 15px !important;"><strong>PT Plasa Kreasindo Motor</strong></h3>
            <p style="line-height: 4px; padding-left: 70px; padding-top: 2px;"><strong> Bengkel Dan Dealer Resmi Yamaha </strong></p>
            <p style="text-align: center; padding-top: 0px;">Jln. Diponegoro No.46A RT.01 RW.18 Desa Setia Mekar
            Kec.Tambun Selatan Kab.Bekasi Telp.8800667, Fax. 8819599.</p>
        </div>
    </div>
    <hr style="padding: 0!important;">
    <div align="center"> 
        <b><font size="16">REPORT SERVICE</font></b>
    </div>
    <br/>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">>

        <thead>
                <tr class="headings">
                    <th style="padding: 5px;">No Service</th>
                    <th>Tgl Service</th>
                    <th>Nama Customer</th>
                    <th>No Motor</th>
                    <th>Total Harga</th>
                </tr>
        </thead>
        <tbody>
                $total = 0;
                <?php $i=1;foreach($report as $report1) {  
                ?>
                <tr class="even pointer">
                    <td class=" " style="padding: 5px;"><?php echo $report1['chNoService'];?></td>
                    <td class=" "><?php echo $report1['daServiceDate'];?></td>
                    <td class=" "><?php echo $report1['chCustomerName'];?></td>
                    <td class=" "><?php echo $report1['chNoMotor'];?></td>
                    <td class=" "><?php echo rupiah($report1['inTotalHarga']);?></td> 
                </tr>
                <?php $i++;}?>
        </tbody>
        <thead>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center; padding: 5px;">Total</td>
                <td></td>
            </tr>
        </thead>
    </table>
    <div class="row" style="padding-bottom: 2px !important;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 12px !important; text-align: left;">
              <p style="text-align: right; padding-right: 10px;"><strong>Bekasi, <?php echo date('d F Y') ?></strong></p>
            <br>
            <br>
            <br>
            <p style="text-align: right; padding-right: 50px;">Kepala Mekanik</p> 
        </div>
    </div>
</body>
</html>
