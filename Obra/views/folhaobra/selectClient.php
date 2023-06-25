 <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Selecionar Cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obras</a></li>
                        <li class="breadcrumb-item"><a href="./index.php?c=cliente&a=index">Clientes</a></li>
                        <li class="breadcrumb-item active">Selecionar Cliente</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="index.php?c=folhaobra&a=selectClient" method="post" class="input-group input-group-sm">
                                    <a class="pt-1 mx-2" href="./index.php?c=folhaobra&a=selectClient">Limpar Filtro</a>
                                    <select id="filter_type" class="form-control" name="filter_type">
                                        <option value="username">Nome</option>
                                        <option value="email">Email</option>
                                        <option value="nif">NIF</option>
                                    </select>
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>NIF</th>
                                    <th>Morada Completa</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($users) > 0)
                                {
                                    foreach ($users as $user)
                                    {
                                if ($user->role == 'cliente' and $user->ativo == '1') {
                                ?>
                                        <tr>
                                            <td><?= $user->username ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->morada . ', ' . $user->codigopostal . ', ' . $user->localidade ?></td>
                                            <td>
                                                <a href="index.php?c=folhaobra&a=store&idCliente=<?=$user->id?>" class="btn btn-primary">Selecionar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="5"><strong>Sem dados a mostrar</strong></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>