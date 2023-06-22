<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cliente</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item active">Cliente</li>
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
                            <form action="index.php?c=cliente&a=index" method="post" class="input-group input-group-sm">
                                <a class="pt-1 mx-2" href="./index.php?c=cliente&a=index">Limpar Filtro</a>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>NIF</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) { ?>
                                <?php $auth=new Auth();
                                $cliente=$auth->getUserId();
                                if($cliente== $user->id)
                                { ?>
                                            <tr>
                                                <td><?= $user->username ?></td>
                                                <td><?= $user->email ?></td>
                                                <td><?= $user->nif ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="index.php?c=cliente&a=showcliente&id=<?= $user->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                                    <a class="btn btn-warning btn-sm" href="index.php?c=cliente&a=edit&id=<?= $user->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                                </td>
                                            </tr>
                                <?php } ?>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
