<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta charset="utf-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="controller" content="<?php echo $this->router->class ?>"/>
    <meta name="method" content="<?php echo $this->router->method ?>"/>
    <?php echo isset($assets) ? $assets : NULL; ?>
    <?php echo isset($css) ? $css : NULL; ?>
    <?php echo isset($js) ? $js : NULL; ?>

</head>
<body>
<div class="global-inf">
    <?php if($error):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Que feio:</strong> <?php echo $error; ?>
        </div>
    <?php endif;?>
    <?php if($msg):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>YEaaaahhh:</strong> <?php echo $msg; ?>
        </div>
    <?php endif;?>
</div>
<div class="container-fluid">
    <div class="row header">
        <div class="col-xs-8 col-sm-12 col-md-8 header-wrap">
            <?php if(isset($adm->id)): ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="./adm"><?php echo NAME_SITE; ?></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown admin">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>
                                    <ul class="dropdown-menu menu-principal-vertical" role="menu">
                                        <li class="admin_index"><a href="./adm/admin">Lista de administradores</a></li>
                                        <li class="admin_edit"><a href="./adm/admin/novo">Novo administrador</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown post">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Post <span class="caret"></span></a>
                                    <ul class="dropdown-menu menu-principal-vertical" role="menu">
                                        <li class="post_index"><a href="./adm/post">Lista</a></li>
                                        <li class="post_edit"><a href="./adm/post/novo">Novo</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="user-logout">
                                <div class="user-logout-container">
                                    <a href="./adm/login?sair=1" class="btn btn-default btn-md">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair
                                    </a>
                                    <div>
                                        <span class="glyphicon glyphicon-user"></span> <?php echo $adm->name; ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            <?php endif;?>
        </div><!-- /.header-wrap -->
    </div><!-- /.row .header -->