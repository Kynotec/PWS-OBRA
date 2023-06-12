<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar dados do Cliente</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Introduza os dados</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="index.php?c=cliente&a=update&id=<?= $users->id ?>" method="post">

                            <div class="card-body">

                                <input type="hidden" class="form-control" name="role" value="cliente">

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="ativo" name="ativo" <?=$users->ativo == 1 ? 'checked' : '' ?>/>
                                    <label for="ativo" class="form-check-label"> Ativo</label><br>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if(isset($users)) { echo $users->username; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('username'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" placeholder="Password"name="password" value="<?php if(isset($users)) { echo $users->password; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('password'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(isset($users)) { echo $users->email; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('email'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefone</label>
                                    <input type="text" class="form-control" placeholder="Telefone" name="telefone" maxlength="9" value="<?php if(isset($users)) { echo $users->telefone; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('telefone'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIF</label>
                                    <input type="text" class="form-control" placeholder="NIF" name="nif" maxlength="9" value="<?php if(isset($users)) { echo $users->nif; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('nif'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Morada</label>
                                    <input type="text" class="form-control" " placeholder="Morada" name="morada" value="<?php if(isset($users)) { echo $users->morada; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('morada'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo Postal</label>
                                    <input type="text" class="form-control"  placeholder="Codigo Postal" name="codigopostal" maxlength="9" value="<?php if(isset($users)) { echo $users->codigopostal; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('codigopostal'); }?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Localidade</label>
                                    <input type="text" class="form-control" placeholder="Localidade" name="localidade" value="<?php if(isset($users)) { echo $users->localidade; }?>">
                                    <?php if(isset($users->errors)){ echo $users->errors->on('localidade'); }?>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <a href="index.php?c=cliente&a=index" class="btn btn-info" role="button"> Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
</div>





