    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clientes</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Lista de Clientes</h3>


                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Telefone</th>
                                        <th>NIF</th>
                                        <th>Localidade</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <?php if ($user->role == 'cliente') { ?>
                                        <td><?=$user->username?></td>
                                        <td><?=$user->telefone?></td>
                                        <td><?=$user->nif?></td>
                                        <td><?=$user->localidade?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="index.php?c=cliente&a=edit&id=<?= $user->id?>"><i class="fas fa-pencil-alt"></i>Editar</a>
                                            <a class="btn btn-info btn-sm" href="index.php?c=cliente&a=show&id=<?= $user->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                        </td>


                                    </tr>
                                    <?php }} ?>




                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="index.php?c=cliente&a=create" class="btn btn-sm btn-info float-left">Adicionar Cliente</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- /.row -->
            </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


