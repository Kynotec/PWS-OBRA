 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalhes de "<?= $users->username ?>"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                        <li class="breadcrumb-item"><a href="./index.php?c=funcionario&a=index">Funcionarios</a></li>
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
                                        <?php if($users->ativo == 1){ ?>
                                            <a href="#" class="btn" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-user-minus" data-toggle="tooltip" data-placement="left" title="Desativar"></i></a>
                                        <?php } else { ?>
                                        <a href="#" class="btn" data-toggle="modal" data-target="#modalActive"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="left" title="Ativar"></i></a>
                                        <?php } ?></p>
                                    </div>
                                    <div class="btn-group">
                                        <a href="index.php?c=funcionario&a=index" class="btn"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Estado:</b> <?= $users->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Inativo</span>' ?>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Telefone:</b> <?=$users->telefone?></p>
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
                <p>Pretende mesmo desativar este Funcionario?</p>
            </div>
            <div class="modal-footer">
                <a href="index.php?c=funcionario&a=disable&id=<?= $users->id ?>" class="btn btn-danger">Desativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" id="modalActive" role="dialog">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-body">
                 <p>Pretende mesmo ativar este Cliente?</p>
             </div>
             <div class="modal-footer">
                 <a href="index.php?c=cliente&a=enable&id=<?= $users->id ?>"  class="btn btn-success btn-sm">Ativar</a>
                 <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
             </div>
         </div>
     </div>
 </div>