<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/bootstrap.min.css' media="screen,print"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/style.css' media="screen,print"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/ui/jquery-ui.min.css' media="screen"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/print.css' media="print"/>
    <style>
      body{font-family:tahoma}
      legend{color:rgba(10,120,180,50);}
      #sidebar {margin-bottom:10px;}
      .glyphicon { margin-right:5px; }
      .panel-body { padding:0px; }
      .panel-body table tr td { padding-left: 15px }
      .panel-body .table {margin-bottom: 0px; }
      .modal-lg{width:85%;}
      .form-group{margin-bottom:0px;}
      .form-group .form-control{margin-bottom:10px;}
      .table{margin-bottom:3px;}
      .pagination{margin:1px 0px;}
    </style>

</head>

<body class="background">

<div class="container">
    <div class="row">
        <div class="col col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 login-title">
            <header class="text-center">
                <img src="<?php echo WEBROOT ?>css/img/logo-tps.png" alt="logo" height="90px">
            </header>
        </div>
    </div>
    
    <div class="starter-template" >
        <?= $content; ?>        
    </div>

</div><!-- /.container -->
    <footer class="footer col col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 text-center" style="padding-left : 8%; margin-top: 10px;">
        <div class="container">
            <p class=""> Gestion des incidents - MAIIN | &copy; 2022 Solutions2is. All Right Reserved.</p>
        </div>
    </footer>


    <script src="<?php echo WEBROOT ?>js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo WEBROOT ?>js/jquery.cookie.js"></script>
    <!--<script src="<?php echo WEBROOT ?>/js/ui/jquery-ui.min.js"></script>-->
    <script src="<?php echo WEBROOT ?>js/bootstrap.min.js"></script>
    <script src="<?php echo WEBROOT ?>js/main.js"></script>
</body>
</html>
