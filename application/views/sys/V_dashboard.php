<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fédération sénégalaise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Fédération sénégalaise" name="description" />
    <meta content="Fédération sénégalaise" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo site(); ?>images/logo.jpg">

    <link href="<?php echo site(); ?>assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

    <link href="<?php echo site(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

    <script src="<?php echo site(); ?>assets/js/modernizr.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo site() ?>images/logo.jpg" style="width: 32px; "> <span>Fédération</span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button type="button" class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>


                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">Notification</li>
                                <li class="list-group">

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <em class="fa fa-user-plus fa-2x text-info"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">New user registered</div>
                                                <p class="m-0">
                                                    <small>You have 10 unread messages</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <em class="fa fa-diamond fa-2x text-primary"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">New settings</div>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <em class="fa fa-bell-o fa-2x text-danger"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                                <div class="media-heading">Updates</div>
                                                <p class="m-0">
                                                    <small>There are
                                                        <span class="text-primary">2</span> new updates available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- last list item -->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <small>See all notifications</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="side-bar right-bar nicescroll"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo site(); ?>images/<?php if($user->sexe == 'M') echo 'user_male.png'; else 'user_female.png' ?>" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('se_deconnecter') ?>"><i class="md md-settings-power"></i> Se déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left" style="background: #FFF;border-radius: 25px;">
                    <img src="<?php echo site(); ?>images/<?php if($user->sexe == 'M') echo 'user_male.png'; else 'user_female.png' ?>" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $user->prenom.' '.$user->nom; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('se_deconnecter') ?>"><i class="md md-settings-power"></i> Se déconnecter</a></li>
                        </ul>
                    </div>

                    <p class="text-muted m-0"><?php echo $user->libelle_profil ?></p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="<?php echo site_url(); ?>" class="waves-effect active" id="menu_dashboard"><i class="fa fa-tachometer"></i><span> Tableau de bord </span></a>
                    </li>    
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-gear"></i><span> Sécurité </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="avascript:void(0);" link="<?php echo site_url('C_profil'); ?>" class="menu" id="menu_profil"><i class="fa fa-navicon"></i> Profil</a></li>
                            <li><a href="avascript:void(0);" link="<?php echo site_url('C_user'); ?>"  class="menu" id="menu_user"><i class="fa fa-users"></i> Utilisateur</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-database"></i><span> championnat </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0);" link="<?php echo site_url('C_equipe'); ?>" class="menu" id="equipe"><i class="fa fa-navicon"></i> Equipe</a></li>
                            <li><a href="javascript:void(0);"  link="<?php echo site_url('C_match'); ?>"  class="menu" id="match"><i class="fa fa-soccer-ball-o"></i> Match</a></li>
                            <li><a href="javascript:void(0);"  link="<?php echo site_url('C_classement'); ?>"  class="menu" id="classement"><i class="fa fa-sort-numeric-asc"></i> Classements</a></li>
                            <li><a href="javascript:void(0);"  link="<?php echo site_url('C_stade'); ?>"  class="menu" id="stade"><i class="fa fa-money"></i> Stade</a></li>
                        </ul>
                    </li>

                   
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container" id="div_container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Bienvenue !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="<?php echo site_url(); ?>">Fédération Sénégalaise de FootBall</a></li>
                            <li class="active">Tableau de bord</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <!--Widget-4 -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow bg-white">
                            <span class="mini-stat-icon bg-info"><i class="fa fa-home"></i></span>
                            <div class="mini-stat-info text-right text-dark">
                                <span class="counter text-dark"><?=$stades?></span>
                                stades
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">stades <span class="pull-right"> <a href="#"><span class="label label-info"><i class="fa fa-eye"></i> Voir plus</span></a> </span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only">100% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow bg-white">
                            <span class="mini-stat-icon bg-purple"><i class="fa fa-soccer-ball-o"></i></span>
                            <div class="mini-stat-info text-right text-dark">
                                <span class="counter text-dark"><?=$max_count_all_matchs?></span>
                               Matchs joués 
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">MATCHS <span class="pull-right"> <a href="#"><span class="label label-purple"><i class="fa fa-eye"></i> Voir plus</span></a>  </span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only">100% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow bg-white">
                            <span class="mini-stat-icon bg-success"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-dark">
                                <span class="counter text-dark"><?=$max_count_all?></span>
                                Equipes enregistrées
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">EQUIPES <span class="pull-right"> <!--<a href="#"><span class="label label-success"><i class="fa fa-eye"></i> Voir plus</span></a>--> </span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only">100% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow bg-white">
                            <span class="mini-stat-icon bg-primary"><i class="fa fa-download"></i></span>
                            <div class="mini-stat-info text-right text-dark">
                                <span class="counter text-dark"><?=$moyenne->but_marque?></span>
                                total buts incrit
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                     <h5 class="text-uppercase">GOALS<span class="pull-right"> <!--<a href="#"><span class="label label-primary"><i class="fa fa-eye"></i> Voir plus</span></a>--> </span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only">100% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End row-->

                <div class="row">


                    <div class="col-lg-12">
                        <!-- WEBSITE STATS -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Statistiques des matchs (Aller & Retour) <span class="pull-right"> <a href="#"><span class="label label-default"><i class="fa fa-eye"></i> Voir plus</span></a></span></h4>
                            </div>
                            <div class="panel-body">
                                <div id="areachart" style="width: 100%; height: 380px;"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <!--<div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">DONS & RAPPELS & ALERTES <span class="pull-right"> <a href="#"><span class="label label-default"><i class="fa fa-eye"></i> Voir plus</span></a></span></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="alert alert-danger">
                                        <i class="fa fa-money fa-2x"></i> &nbsp;Dons de 100 000 Fcfa versé dans le compte tigo Cash le 15/02/2018
                                    </div>
                                    <div class="alert alert-success">
                                        <i class="fa fa-envelope fa-2x"></i> &nbsp;Préparation de la visite du Ministre de la santé le 15/02/2018
                                    </div>
                                    <div class="alert alert-info">
                                        <i class="fa fa-file-text-o fa-2x"></i> &nbsp;Viste à l'hopital Mère et enfant le 20/03/2019 à 09h00
                                    </div>
                                    <div class="alert alert-warning">
                                        <i class="fa fa-exclamation-triangle fa-2x"></i> Débrayage Syndica CNTS  à 10H
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © fédération de football sénégalaise.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo site(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo site(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo site(); ?>assets/js/detect.js"></script>
<script src="<?php echo site(); ?>assets/js/fastclick.js"></script>
<script src="<?php echo site(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo site(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo site(); ?>assets/js/waves.js"></script>
<script src="<?php echo site(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo site(); ?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo site(); ?>assets/js/jquery.scrollTo.min.js"></script>

<script src="<?php echo site(); ?>assets/js/jquery.app.js"></script>

<!-- jQuery  -->
<script src="<?php echo site(); ?>assets/plugins/moment/moment.js"></script>

<!-- jQuery  -->
<script src="<?php echo site(); ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo site(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>

<!-- jQuery  -->
<script src="<?php echo site(); ?>assets/plugins/sweetalert/dist/sweetalert.min.js"></script>


<script src="<?php echo site(); ?>assets/js/highcharts.js"></script>
<script>
    Highcharts.chart('areachart', {
        chart: {
            type: 'area',
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ]
        },
        plotOptions: {
            area: {
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                },
                fillOpacity: 0.1
            }
        },
        credits:{
            enabled: 0,
            text: 'FGC',
            href: 'http://fdc.td'
        },
        series: [{
            name: 'Aller',
            data: [20, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0], color: '#33720E', lineWidth: 1
        }, {
            name: 'Retour',
            data: [0, 0, 15, 0, 0, 0, 0, 0, 0, 4, 0, 0], color: '#F8C20C', lineWidth: 1
        }]
    });
</script>


<script type="text/javascript">
    /* ==============================================
     Counter Up
     =============================================== */
    $(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>




<!-- JQuery DataTable Css && js 10-->
<link href="<?php echo site(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<script src="<?php echo site(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo site(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>


<!-- jQuery Validate Plugin -->
<script src="<?php echo site(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo site(); ?>assets/plugins/jquery-validation/src/localization/messages_fr.js"></script>


<!-- notification js-->
<link href="<?php echo site(); ?>assets/plugins/notifications/notification.css" rel="stylesheet">
<script src="<?php echo site(); ?>assets/plugins/notifyjs/dist/notify.min.js"></script>
<script src="<?php echo site(); ?>assets/plugins/notifications/notify-metro.js"></script>
<script src="<?php echo site(); ?>assets/plugins/notifications/notifications.js"></script>


<script src="<?php echo site(); ?>assets/js/managing_menu.js"></script>
<script src="<?php echo site(); ?>assets/js/managing_ajax.js"></script>

<style type="text/css">
    label.error {
        color: #e55957;
        margin-left: 0;
    }

    input.error, textarea.error, select.error,input.error:focus, textarea.error:focus, select.error:focus {
        background: rgb(251, 227, 228);
        border: 1px solid #fbc2c4;
        color: #8a1f11;
    }

</style>

</body>
</html>