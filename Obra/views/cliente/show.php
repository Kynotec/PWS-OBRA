<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalhes de "<?= $users->username ?>"</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item"><a href="./index.php?c=cliente&a=index">Clientes</a></li>
                    <li class="breadcrumb-item active">Detalhes de "<b><?= $users->username ?>"</b></li>
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
                        <h2 class="d-inline p-2"><?=$users->username?></h2>
                        <div class="card-tools">
                            <div class="btn-toolbar">
                                <div class="btn-group mr-2">
                                    <a href="index.php?c=funcionario&a=edit&id=<?=$users->id ?>" class="btn" role="button"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-user-minus" data-toggle="tooltip" data-placement="left" title="Desativar"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="blockquote mb-0">
                            <div class="row">
                                <div class="col-12 pt-4">
                                    <p><b>Estado:</b> <?= $users->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Desativado</span>' ?>
                                </div>
                                <div class="col-12">
                                    <p><b>Email:</b> <?=$users->email?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>NIF:</b> <?=$users->nif?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Morada:</b> <?=$users->morada . ', ' . $users->localidade . ', ' . $users->codigopostal?></p>
                                </div>
                            </div>
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
                <a href="index.php?c=cliente&a=disable&id=<?= $users->id ?>" class="btn btn-danger">Desativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>