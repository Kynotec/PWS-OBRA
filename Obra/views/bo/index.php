    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?c=bo&a=index">Home</a></li>

                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $total ?></h3>

                            <p>Total de Faturas Emitidas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                <a href="index.php?c=folhaobra&a=index" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>

                <div class="card">
                        <div class="card-body p-0 ">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($folhaobras as $folhaobra) { ?>

                                    <tr>
                                    <?php
                                    if($folhaobra->estado ){  ?>
                                        <td><?=$folhaobra->id?></td>
                                        <td><?=$folhaobra->data->format('Y-m-d')?></td>
                                        <td><?=$folhaobra->cliente->username?></td>
                                        <td><?=$folhaobra->valortotal . "€"?></td>
                                        </tr>
                                        <?php
                                        if($i == 10)
                                            break;
                                        $i++; } } ?>

                                </tbody>
                            </table>

                    </div>
                </div>
            </div>





                <div class="col-lg-3 col-6" >
                    <!-- small box -->
                    <div class="small-box bg-warning" >
                        <div class="inner" style="color: white">
                            <h3 style="color: white"><?= $totalClientes?></h3>

                            <p>Total de Clientes</p>
                        </div>
                        <div class="icon" >
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="index.php?c=cliente&a=index" class="small-box-footer">Ver todos os Clientes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>NIF</th>
                                        <th>Localidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($users as $cliente) {?>
                                        <tr>
                                        <?php
                                        if($cliente->role == 'cliente'){  ?>
                                            <td><?=$cliente->username?></td>
                                            <td><?=$cliente->nif?></td>
                                            <td><?=$cliente->localidade?></td>
                                            </tr>
                                            <?php
                                            if($i == 10)
                                                break;
                                            $i++; } } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>


                <div class="col-lg-3 col-6" >
                    <!-- small box -->
                    <div class="small-box bg-warning" >
                        <div class="inner" style="color: white">
                            <h3 style="color: white"><?= $totalClientes?></h3>

                            <p>Total de Funcionarios</p>
                        </div>
                        <div class="icon" >
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="index.php?c=funcionario&a=index" class="small-box-footer">Ver todos os Funcionarios <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>NIF</th>
                                        <th>Localidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($users as $funcionario) {?>
                                        <tr>
                                        <?php
                                        if($funcionario->role == 'funcionario'){  ?>
                                            <td><?=$funcionario->username?></td>
                                            <td><?=$funcionario->nif?></td>
                                            <td><?=$funcionario->localidade?></td>
                                            </tr>
                                            <?php
                                            if($i == 10)
                                                break;
                                            $i++; } } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>


            <div class="col-lg-3 col-6" >
                <!-- small box -->
                <div class="small-box bg-success" >
                    <div class="inner" style="color: white">
                        <h3 style="color: white"><?= $totalServicos?></h3>

                        <p>Serviços</p>
                    </div>
                    <div class="icon" >
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="index.php?c=servico&a=index" class="small-box-footer">Ver todos os Serviços <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Descriçao</th>
                                    <th>Precohora</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($servicos as $servico) {?>
                                    <tr>
                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->precohora ."€"?></td>
                                    </tr>
                                        <?php
                                        if($i == 10)
                                            break;
                                        $i++; }  ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>

    </section>