<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalhes do Iva</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item"><a href="./index.php?c=iva&a=index">Iva</a></li>
                    <li class="breadcrumb-item active">Detalhes"<b><?= $ivas->descricao ?>"</b></li>
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
                        <h2 class="d-inline p-2"><?=$ivas->descricao?></h2>
                        <div class="card-tools">
                            <div class="btn-toolbar">
                                <div class="btn-group mr-2">
                                    <a href="index.php?c=iva&a=edit&id=<?=$ivas->id ?>" class="btn" role="button"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a href="index.php?c=iva&a=index" class="btn"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Id:</b> <?= $ivas->id?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Estado:</b>  <?php if($ivas->emvigor == 1){ ?>
                                                <span class="badge bg-success">Em Vigor</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Oculto</span>
                                            <?php } ?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Percentagem:</b> <?=$ivas->percentagem.'%'?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Descrição:</b> <?=$ivas->descricao?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



