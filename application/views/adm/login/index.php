<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Autenticação</div>
            </div>
            <div class="panel-body" >
                <form id="loginform" class="form-horizontal" role="form" action="./adm/login/auth" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-email" required type="email" class="form-control" name="email" value="<?php echo isset($email) ?$email:null; ?>" placeholder="Insira aqui seu e-mail">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" required type="password" value="<?php echo isset($password) ?$password:null; ?>" class="form-control" name="password" placeholder="Insira aqui sua senha">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" value="Login" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>