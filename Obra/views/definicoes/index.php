 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Definições</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Obra</a></li>

                        <li class="breadcrumb-item active">Definições</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5 class="text-center">Alterar Email</h5>
                    <form action="./index.php?c=definicoes&a=updateEmail" method="post" class="mt-2">
                        <div class="mb-2">
                            <label for="currrent_mail">Email Atual</label>
                            <input type="email" class="form-control" name="current_email" id="current_email" value="<?= $_SESSION['email'] ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="new_email">Novo Email</label>
                            <input type="email" name="new_email" id="new_email" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar Email">
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="text-center">Alterar Palavra-Passe</h5>
                    <form action="index.php?c=definicoes&a=updatePassword" method="post">
                        <div class="mb-2">
                            <label for="old_password">Palavra-Passe Atual</label>
                            <input type="password" name="old_password" id="old_password" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="new_password">Nova Palavra-Passe</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="re_new_password">Repita Nova Palavra-Passe</label>
                            <input type="password" name="re_new_password" id="re_new_password" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar Palavra-Passe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>