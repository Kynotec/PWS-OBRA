 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Selecione um cliente</h1>
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

                    <!-- TABLE: Clientes -->
                    <div class="card">
                        <div class="card-header border-transparent ">
                            <h3 class="card-title">Lista de Clientes</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>NIF</th>
                                        <th>Localidade</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <?php if ($user->role == 'cliente') { ?>
                                        <td><?=$user->username?></td>
                                        <td><?=$user->email?></td>
                                        <td><?=$user->telefone?></td>
                                        <td><?=$user->nif?></td>
                                        <td><?= $user->morada . ', ' . $user->codigopostal . ', ' . $user->localidade ?></td>
                                        <td><a href="index.php?c=folhaobra&a=store&id=<?=$user->id?>" class="btn btn-sm btn-info float-left">Selecionar</a></td>

                                    </tr>
                                    <?php }} ?>




                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

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
</div>
<!-- /.content-wrapper -->


