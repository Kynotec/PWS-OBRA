    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
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
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>NIF</th>
                                    <!--th>Morada</th-->
                                    <th class="fit_column">Estado</th>
                                    <th class="fit_column">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($users) > 0)
                                {
                                    foreach ($users as $user)
                                    {
                                         if ($user->role == 'cliente') {
                                        ?>
                                        <tr>
                                            <td><?= $user->username ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Desativado</span>' ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="index.php?c=cliente&a=show&id=<?= $user->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                                <a class="btn btn-warning btn-sm" href="index.php?c=cliente&a=edit&id=<?= $user->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>

                                                <?php if($user->ativo == 1) {?>
                                                    <a class="btn btn-danger btn-sm" onclick="deleteEntity(<?= $user->id ?>)"> <i class="fas fa-trash"></i> Desativar </a>
                                                    <?php } else { ($user->ativo == 0) ?>
                                                    <a class="btn btn-success btn-sm" onclick="activeEntity(<?= $user->id ?>)"> <i class="fas fa-check"></i> Ativar </a>

                                                <?php } ?>
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
                        <div class="card-footer clearfix">
                            <a href="index.php?c=cliente&a=create" class="btn btn-sm btn-secondary float-left">Registar Cliente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo desativar este Cliente?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_delete_btn" class="btn btn-danger">Desativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteEntity(id)
    {
        document.getElementById('modal_delete_btn').setAttribute('href', './index.php?c=cliente&a=delete&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDelete'), {
            keyboard: true
        }).toggle();
    }
</script>

<?php if(isset($_GET['success'])){ ?>
    <script type="text/javascript">
        window.onload = function() { alert_success(); }
    </script>
<?php } ?>