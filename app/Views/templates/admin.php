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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/bootstrap.min.css' media="screen,print"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/style.css' media="screen,print"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/bootstrap-fileupload.min.css' media="screen,print"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/ui/jquery-ui.min.css' media="screen"/>
    <link rel="stylesheet" href='<?php echo WEBROOT ?>css/print.css' media="print"/>
    <style>
      #sidebar {margin-bottom:10px;}
      .panel-body { padding:0px; }
      .panel-body table tr td { padding-left: 15px }
      .panel-body .table {margin-bottom: 0px; }
      .modal-lg{width:85%;}
      .table{margin-bottom:3px;}
      .pagination{margin:1px 0px;}
      .form-group{margin-bottom:0px;}
      .form-group .form-control{margin-bottom:10px;}
      .table{margin-bottom:3px;}
      .pagination{margin:1px 0px;}
      .cPanel{
          width : 100%;
          height : 100px;
          margin-bottom : 5%;
          border-radius : 0px;
          padding : 10%;
          font-size : medium;
        }
        .footer {
            /*position: absolute;*/
            margin-top : 10px;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
        }
        .text-muted {
            margin: 20px 0;
        }
        legend{
            color : rgba(10,120,180,50);
        }
      
    </style>
    <script src="<?php echo WEBROOT ?>js/jquery-2.1.0.min.js"></script>    
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="logo">
      <a class="" href="index.php?p=admin.incidents.dashboard">
        <img src="<?php echo WEBROOT ?>css/img/logo-tps.png" alt="logo" height="50px" >
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?p=admin.incidents.dashboard"><span class="glyphicon glyphicon-home"></span> Accueil <span class="sr-only">(current)</span></a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
        <form class="navbar-form navbar-left" method="post">
            <div class="form-group">
                <input name="patient_id" type="text" class="search-input" placeholder="Rechercher un incident">
            </div>
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>  <?= $_SESSION['first_name']; ?> <?= strtoupper($_SESSION['last_name']); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-edit text-default"></span> Mon profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="index.php?p=users.logout"> <span class="glyphicon glyphicon-off text-danger"></span> Se déconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container" style="padding-top: 100px;">

    <div class="row">
        <div class="col col-3 col-sm-3">
            <div id='sidebar'>
                <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">
                            <span class="glyphicon glyphicon glyphicon-fire text-danger"></span> 
                            <b>INCIDENTS</b>
                            </a>
                        </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseOne">
                        <div class="panel-body">
                            <table class="table">
                            <tbody>
                                <tr>
                                <td>
                                    <span class="glyphicon glyphicon-dashboard text-primary"></span> <a href="index.php?p=admin.incidents.dashboard"> Tableau de bord</a> 
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <span class="glyphicon glyphicon-plus-sign text-primary"></span> <a href="index.php?p=admin.incidents.add"> Signaler un incident</a> 
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <span class="glyphicon glyphicon-ok text-primary"></span> <a href="index.php?p=admin.incidents.verified"> Incidents vérifiés</a>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <span class="glyphicon glyphicon-pause text-primary"></span> <a href="index.php?p=admin.incidents.waiting"> En cours de vérification</a>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                    <span class="glyphicon glyphicon-th-list text-primary"></span> <a href="index.php?p=admin.incidents.index"> Tous les incidents</a>
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div><!-- /.panelgroup -->

                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseGouv" data-parent="#accordion" data-toggle="collapse">
                            <span class="glyphicon glyphicon glyphicon-stats text-success"></span> 
                            <b>GOUVERNANCE</b>
                            </a>
                        </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseGouv">
                        <div class="panel-body">
                            <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-th-list text-primary"></span> <a href="index.php?p=admin.gouvernances.index"> Indices enregistrés</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-plus-sign text-primary"></span> <a href="index.php?p=admin.gouvernances.add"> Ajouter un indice</a>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div><!-- /.panelgroup -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a href="#collapseAdmin" data-parent="#accordion" data-toggle="collapse">
                                <span class="glyphicon glyphicon-user"></span> 
                                <b>COMPTES</b>
                            </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapseAdmin">
                            <div class="panel-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-plus-sign text-success"></span> <a href="index.php?p=admin.users.add">Nouvel utilisateur
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-th-list text-primary"></span> <a href="index.php?p=admin.users.index">Liste des utilisateurs
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-folder-open text-primary"></span> Liste des groupes
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-folder-open text-primary"></span> Nouveau groupe
                                    </td>
                                </tr> -->
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div><!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a href="#collapseLab" data-parent="#accordion" data-toggle="collapse">
                                <span class="glyphicon glyphicon-cog"></span> 
                                <b>PARAMETRES</b>
                            </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" id="collapseLab">
                            <div class="panel-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-globe text-primary"></span> <a href="index.php?p=admin.countries.index"> Pays, régions, cercles et communes</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-th-large text-primary"></span> <a href="index.php?p=admin.categories.index"> Catégories d'incidents</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-flag text-primary"></span> <a href="index.php?p=admin.criterias.index"> Critères de gouvernance</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div><!-- /.panel -->

                </div>
            </div><!-- /.sidebar -->
        </div>
        <div class="col col-9 col-sm-9">

        <?php if ($_GET['p'] == 'admin.incidents.dashboard') {
        
        ?>
            <div class="row">
                <div class="col col-6 col-sm-6">
                    <form action="" method="post" class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <select class="form-control" name="country_name_change" id="country" style="margin-top:10px">
                                <option value="Burkina-Faso" <?= $country == 'Burkina-Faso' ? 'Selected' : ''; ?>>Burkina Faso</option>
                                <option value="Mali" <?= $country == 'Mali' ? 'Selected' : ''; ?>>Mali</option>
                                <option value="Niger" <?= $country == 'Niger' ? 'Selected' : ''; ?>>Niger</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Changer</button>
                    </form>
                </div>
            </div>
        <?php 
        }
        ?>
            

            <?= $content; ?>
        </div>
    </div>


</div><!-- /.container -->

<div id="tmpDiv"></div>
    <footer class="footer" style="margin-top : 10%">
        <div class="container">
            <p class="text-muted">Gestions des incidents - MAIIN | &copy; 2022 Solutions2is. All Right Reserved.</p>
        </div>
    </footer>

    <script src="<?php echo WEBROOT ?>js/jquery.cookie.js"></script>
    <!--<script src="<?php echo WEBROOT ?>/js/ui/jquery-ui.min.js"></script>-->
    <script src="<?php echo WEBROOT ?>js/bootstrap.min.js"></script>
    <script src="<?php echo WEBROOT ?>js/main.js"></script>
</body>
</html>
