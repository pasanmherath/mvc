<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sample | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo ASSET_URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo ASSET_URL; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo ASSET_URL; ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><img width="275px" src="<?php //echo $this->getLogo;?>"></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Login</p>
                <form id="login_form" name="login_form" action="<?php echo BASE_URL . 'auth/login';?>" method="post">
                    <?php if($this->message){ ?>
                     <div class="alert alert-danger alert-block fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php 
                        $messages = json_decode($this->message);
                        if(count($messages) > 0)
                        {
                            foreach($messages as $message)
                            {
                                echo $message.'.<br/>';
                            }
                        }
                        ?>
                    </div>   
                    <?php }?>
                    
                    <div class="form-group has-feedback">
                        <input type="email" id="login_email" name="login_email" class="form-control" placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">   
                            
                        </div> 
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div> 
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <style>
            .has-feedback label~.form-control-feedback {
                top: 0px;
            }
        </style>
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo ASSET_URL; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/validation/jquery.validate.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo ASSET_URL; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo ASSET_URL; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                
                $("#login_form").validate({
                    rules: {
                        login_email: {
                            required: true,
                            email: true
                        },
                        login_password: {required: true},
                    }
                });
            });
        </script>
    </body>
</html>