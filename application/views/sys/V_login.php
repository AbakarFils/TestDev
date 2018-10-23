<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fédération sénégalaise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="gestion du championat sénégalaise de la ligue 1" />
    <meta content="Fédération sénégalaise de FootBall" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo site(); ?>images/logo.jpg">

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
<body>


<div class="wrapper-page" style="margin-top: 3%;">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img text-center">
            <img src="<?php echo site(); ?>images/logo.jpg" width="208"  height="78">
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" id="form" action="<?php echo site_url(); ?>" method="post">

                <div class="form-group">
                    <label for="username" class="control-label col-md-12" style="text-align: left">Identifiant <i class="text-danger">*</i></label>
                    <div class="col-xs-12">
                        <input class="form-control input-lg" type="text" id="username" name="username" data-msg="L'identifiant est obligatoire." >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-md-12" style="text-align: left">Mot de passe <i class="text-danger">*</i></label>
                    <div class="col-xs-12">
                        <input class="form-control input-lg" type="password" id="password" name="password"  data-msg="Le mot de passe est obligatoire." >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Se souvenir de moi
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit"> <i class="ion-log-in"></i> Se connecter </button>
                    </div>
                </div>


                <?php
                if(isset($msg_error) && ($msg_error != ""))
                {  ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $msg_error; ?>
                    </div>
                    <?php
                } ?>

                <p class="text-center text-bolder">
                    Contact support: +221 70 876 49 57  / rhi-service.com
                </p>


            </form>
        </div>

    </div>
</div>


<script>
    var resizefunc = [];
</script>

<!-- Main  -->
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

<script src="<?php echo site(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo site(); ?>assets/plugins/jquery-validation/src/localization/messages_fr.js"></script>

<script src="<?php echo site(); ?>assets/js/jquery.app.js"></script>


<script>
    $(document).ready(function () {


        $('#form').submit(function (e) {

            if($('#username').attr('required') == undefined)
            {
                $('#username,#password').attr('required',true);
                $('#form').validate({
                    lang: 'fr',
                    rules:[],
                    messages: [],
                    errorPlacement: function (error, element) {
                        element.after(error);
                    }
                });
            }

            var isvalidate = $('#form').valid();
            if (isvalidate === true)
            {
                return true;
            }
            else
            {
                if($('#username').val() == '')
                    $('#username').focus();
                else
                    $('#password').focus();

                return false;
            }
            e.preventDefault();
        });

        $('#username').focus();

    });
</script>

<style type="text/css">
    label.error {
        color: #e55957;
        margin-left: 0;
    }

    input.error, select.error,input.error:focus, select.error:focus {
        background: rgb(251, 227, 228);
        border: 1px solid #fbc2c4;
        color: #8a1f11;
    }
</style>

</body>
</html>