<!doctype html>
<html>
    <head>
        <title>CI Upload - harviacode.com</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px
            }
            .wrapper{
                width: 600px
            }
            form p{
                margin: 5px 0px;
                color: red;
            }
        </style>
    </head>
    <body>
        <form class="form-horizontal" role="form" action="<?php echo base_url('upload/uploadImage/ID001');?>" enctype="multipart/form-data" method="POST">
        <div class="col-sm-9">
          <input type="file" id="id-input-file-1" name="id-input-file-1"  />
        </div>
        <button class="btn btn-info" type="submit" id="btnSave" name="btnSave">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Save
        </button>
    </body>
</html>