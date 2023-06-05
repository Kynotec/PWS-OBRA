<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="./index.php?c=home&a=index" class="h1"><?= APP_NAME ?></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Inicie Sessão Para Continuar</p>
            <?php if(isset($fail)){ ?>
                <div class="callout callout-danger">
                    <p>Credenciais incorretas!</p>
                </div>
            <?php } ?>
            <form action="./index.php?c=login&a=checkLogin" method="post">
                <div class="input-group mb-3">
                    <input type="username" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <a href="./index.php?c=home&a=index" class="m-1"><i class="fas fa-arrow-left"></i> Voltar à homepage</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>