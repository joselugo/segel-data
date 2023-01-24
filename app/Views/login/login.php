<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="Mikrowisp" name="author">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url() ?>public/favicon.png">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/css/animate.min.css" rel="stylesheet" />

    <link href="<?= base_url() ?>public/css/default/app.min.css" rel="stylesheet" id="theme" />

    <link href="<?= base_url() ?>public/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/css/mikrowisp.css?v=6.22" rel="stylesheet" />
    <link href="<?= base_url() ?>public/css/extra.css?t=1578423049" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>public/plugins/pace/pace.min.js"></script>
    <script>
        var timechar, interval;

        function startTimer() {

        }
    </script>
    <!-- ================== END BASE JS ================== -->


    <style type="text/css">
        .alerta-error .gritter-bottom,
        .alerta-error .gritter-item,
        .alerta-error .gritter-top {
            background: rgba(220, 51, 18, 0.9) !important;
        }

        .alerta-error .gritter-item p {
            color: #FFF;
            font-size: 11px;
        }

        .alerta-error .gritter-title {
            font-size: 13px !important;
            font-weight: bold !important;
        }

        .login-cover,
        .login-cover-bg,
        .login-cover-image {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            transition: background .2s linear;
            -webkit-animation: background_zoom 120s infinite linear;
            animation: background_zoom 120s infinite linear;
        }

        .login.login-v2 .login-content {
            padding: 20px;
            width: 350px;
        }

        .login .login-content {
            padding: 30px 40px;
            color: #999;
            width: 450px;
            margin: 0 auto;
        }

        .login.login-v2 .login-header,
        .login.login-v2 .login-header .brand,
        .login.login-v2 .login-header .brand small {
            color: #fff;
        }

        .login.login-v2 .login-header {
            width: 350px;
            padding: 0 20px;
            margin: 0;
            top: 0;
            left: 0;
            right: 0;
            position: relative;
        }

        .login .login-header {
            position: absolute;
            top: -80px;
            left: 50%;
            right: 0;
            width: 450px;
            padding: 0 40px;
            margin-left: -225px;
            font-weight: 300;
        }

        .login.login-v2 .login-header .icon {
            opacity: .4;
            right: 4px;
            top: 13px;
        }

        .login.login-v2 .form-control {
            background: rgba(0, 0, 0, .5);
            border: 1px solid transparent;
            color: #fff;
        }

        .form-control.form-control-lg,
        .form-control.input-lg {
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #d3d8de;
            box-shadow: none;
            font-size: 12px;
            line-height: 1.42857143;
            height: 34px;
            padding: 6px 12px;
        }

        .form-control-lg,
        .input-group-lg>.form-control,
        .input-group-lg>.input-group-append>.btn,
        .input-group-lg>.input-group-append>.input-group-text,
        .input-group-lg>.input-group-prepend>.btn,
        .input-group-lg>.input-group-prepend>.input-group-text {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: .3rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-control-lg {
            height: 46px;
            padding: 10px 16px;
            line-height: 1.3333333;
            border-radius: 6px;
        }

        .login-cover-bg {
            background: rgba(0, 0, 0, 0.39);
        }

        .btn.btn-lg,
        .input-group-lg>.input-group-append>.btn,
        .input-group-lg>.input-group-prepend>.btn {
            font-size: 16px;
            line-height: 24px;
            padding: 10px 16px;
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        @-webkit-keyframes background_zoom {
            0% {
                transform: scale(1) rotate(0deg)
            }

            50% {
                transform: scale(1.4) rotate(0.3deg)
            }

            100% {
                transform: scale(1) rotate(0deg)
            }
        }

        @keyframes background_zoom {
            0% {
                transform: scale(1) rotate(0deg)
            }

            50% {
                transform: scale(1.4) rotate(0.3deg)
            }

            100% {
                transform: scale(1) rotate(0deg)
            }
        }
    </style>
</head>

<body class="pace-top  pace-done">

    <!-- Modal -->
    <div class="modal" id="modalrecover" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recuperar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="recoverfrm" method="post">
                    <div class="modal-body">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-4 text-right">Correo Electrónico</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control m-b-5" name="mail" required autofocus>
                                <small class="f-s-12 text-grey-darker">Solo se podrá recuperar su contraseña si ha configurado un correo en su cuenta.</small>
                            </div>
                        </div>

                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-4 text-right"><img class="imgcap" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAAA8CAIAAADXHaAKAAAACXBIWXMAAA7EAAAOxAGVKw4bAAADP0lEQVR4nO2dUXLrIAwASac3cu7kM+VOyZnyPpjnodjGAgQ28u5XmkkjY9ZCVkj7+H6/DsAKP2cfAIAmv5/PZ/3sNE39DwWgnsdmybFpeQTSwwXZFlqCRHqH99CXcqGF4D30pLnQQihyQIWrCC2BZA+HPN7vd/izARtI9ncmFjqNGQ9I9lbJEzqNvekn2Q+HptBp/MQ/n8/lmW6hm0KyvxT9hHbOzfPsnHu9XtFjd4P5xvs+/OlyCE96GZHB/pnwxwT10zzKykCRU4mobaci+lpoLQ4n2NvsPQ4fDwrJPsFGySE/EVmiL0L7B+6/3D5cu8XBhwuHacBpCfdM9oU1dOJE7J3HyOPDhB2GqNT9zrV7GnvJvtVN4foU+LwY1dAuswjZPLOSWVkup6yIA01kUwZK9r+5vyCsEA5fUDb+vbdNrxhRhpbfjKZHcZEp7IBkpBdJ9hs3hTXr+3K4m2+SWPobMU3TumIOn0kPNszrC906MyZp7X325iSVctbT2uYw4rrUkdRa6zJJC3RPU1zkKO+2q9Q9OkSt1odwZdir+/fUb9eZQXcJm+c/T+jw44mFrNvKs4wvWxmWXL4MXD5YdD+FEqHbdXAPJUhX3uuZ1iqQ1Ft+6N6Iawktie4pqGv3Zrrs46HcKFmgezHZbTtPwRJcSfTx9TzP69BpD4o7iVl6FTQWc19co7v5RmRhDd15X0S69SakwIMwH4fbXyUtv1y0ZLp5dq/tcvRxWkXoQyp75603pTgNpczrjtDS6J4+vfNiKq0yoHteDX2TfWoRwvE2zc1CKjddGKjdszP0WXuLR9/TfAXdhehus6kn63hKSo6zvv0xyrdOChhId1dkfDfdR/pDM27M3KxCB+PTG8uK302C4ugGExo26dxa6Wx8VjiEvgXqxh/qWB9RaHwUCKFBU/dGeVceDqHhgP4ldU1chIYSTknqksNAaNCkf7EegdDQg0Z9GGpouBbqoiM0XI4ayxEahkEiOkLD8ISiIzSYYvtfI6twka8wwK1omKHH2hLp4SIcHUqOP3ARjg5CDw8XYQhCwwm0uwgRGkzxc/YBAGiC0GAKhAZTIDSYAqHBFAgNpkBoMAVCgykQGkzxDyu7cl0PLvAXAAAAAElFTkSuQmCC" height="60" border="1" alt="CAPTCHA"></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control m-b-5" name="cap" required>
                                <small class="f-s-12 text-grey-darker">Ingrese los números.</small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="login-cover">

        <div class="login-cover-image" style="background-image: url('<?= base_url() ?>public/images/login-bg/<?= $img ?>');" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin #page-container -->
    <div id="page-container" class="fade show">
        <!-- begin login -->
        <div class="login login-v2 animated fadeIn" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <!-- <div class="login-header">
                <div class="brand">
                    <img src="<?= base_url() ?>public/images/logo.png" alt="" class="img-responsive" style="max-width:260px; height:auto">
                </div>
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
            </div -->>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form method="post" action="/admin/login?" id="loginForm">
                    <input type="hidden" id="token" value="e6f3a3274906a0b6bd572468a11db0ab">
                    <input type="hidden" name="security_code" id="security_code" value="eef58ebe4d9e825d950b5ec69c01dc2d">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control form-control-lg" placeholder="Usuario" required="" name="login" id="login-login" autofocus>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control form-control-lg" placeholder="Contraseña" required="" name="password" id="password-login" autocomplete="off">
                    </div>

                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg" style="font-size: 14px;">Ingresar al Administrador</button>
                    </div>
                    <!--<div class="m-t-20" style="color: #c3c3c3;">
                        Olvidaste tu contraseña? Click <a data-toggle="modal" data-target="#modalrecover" style="cursor: pointer">Aquí</a> para recuperar.
                    </div> -->
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->


    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js?v=6.22"></script>
    <script src="<?= base_url() ?>public/js/app.js?v=6.22"></script>
    <script src="<?= base_url() ?>public/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/datatables.min.js?v=6.22"></script>
    <!--[if lt IE 9]>
		<script src="crossbrowserjs/html5shiv.js"></script>
		<script src="crossbrowserjs/respond.min.js"></script>
		<script src="crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="<?= base_url() ?>public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/js-cookie/js.cookie.js"></script>


    <!-- ================== END BASE JS ================== -->

    <script src="<?= base_url() ?>public/plugins/gritter/js/jquery.gritter.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/mikrowisp.js?v=6.22"></script>

    <script>
        base_url = "<?= base_url() ?>";
        $(document).ready(function() {


            //App.init();
            $('#loginForm').submit(function() {
                var l = $('#login-login').val();
                if (l.length < 2) {
                    $('#login-login').focus();
                    return false;
                }
                var p = $('#password-login').val();
                if (p.length < 2) {
                    $('#password-login').focus();
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: base_url + 'seguridad/iniciar_sesion',
                    data: {
                        'login': l,
                        'password': p
                    },
                    success: function(data) {
                        if (data == 'error') {
                            alerta('error', "Usuario o contraseña incorrecta");
                        } else if (data == 'change') {
                            change(l, p);
                        } else if (data == 'success') {

                            $(location).attr('href', base_url);
                        }
                    }
                });
                return false;
            });
            $('#recoverfrm').submit(function() {
                $('#modalrecover').modal('hide');
                alerta('loader', 'enviando...');
                var url = '/admin/login';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: $('#recoverfrm').serialize(),
                    success: function(data) {
                        $('#gritter-notice-wrapper').remove();
                        $('.imgcap').attr('src', 'data:image/png;base64,' + data.img);
                        if (data.estado == 'error') {
                            alerta('error', data.salida);
                        } else if (data.estado == 'exito') {
                            alerta('exito', data.salida);
                        }
                    }
                });
                return false;
            });
        });

        function change(l, p) {
            var new1 = prompt("Por motivos de seguridad, es necesario cambiar tu contraseña\n\nNueva contraseña:( mayor o igual a 8 caracteres)");
            var new2 = prompt("Confirmar contraseña:");
            if (new1 != null && new1 != "" && new2 != null && new2 != "") {
                if (new1 == new2) {
                    if (new1 != p) {
                        if (new1.length >= 8) {
                            $.ajax({
                                type: 'POST',
                                url: base_url + 'seguridad/iniciar_sesion',
                                data: {
                                    'login': l,
                                    'password': p,
                                    'change': new1
                                },
                                success: function(data) {
                                    if (data == 'error') {
                                        alerta('error', "Error vuelve a intentarlo.");
                                    } else if (data == 'passold') {

                                        alerta('error', "La nueva contraseña no puede ser igual a ninguna de las contraseñas proporcionadas antiguamente.");
                                    } else if (data == 'success') {

                                        $(location).attr('href', base_url);
                                    }
                                }
                            });
                        } else {
                            alert("Las contraseñas proporcionadas deben ser mayor o igual a 8 caracteres");

                        }
                    } else {
                        alert("La nueva contraseña no puede ser igual a la anterior.");
                    }

                } else {
                    alert("Las contraseñas proporcionadas no coinciden.");
                }

            } else {
                alert("Introdusca una contraseña valida");
            }
        }
    </script>

</body>

</html>