<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalhes do Serviço</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item"><a href="./index.php?c=servico&a=index">Serviços</a></li>
                    <li class="breadcrumb-item active">Detalhes"<b><?= $servico->descricao ?>"</b></li>
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
                        <h2 class="d-inline p-2"><?=$servico->descricao?></h2>
                        <div class="card-tools">
                            <div class="btn-toolbar">
                                <div class="btn-group mr-2">
                                    <a href="index.php?c=servico&a=edit&id=<?=$servico->id ?>" class="btn" role="button"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a href="index.php?c=servico&a=index" class="btn"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
                                </div>
                            </div>
                    </div>
                        <div class="card-body">
                            <div class="blockquote mb-0">
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <p><b>Estado:</b> <?= $servico->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Inativo</span>' ?>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Referencia:</b> <?=$servico->referencia?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Descrição:</b> <?=$servico->descricao?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Preço/Hora:</b> <?=$servico->precohora.'€'?></p>
                                    </div>
                                    <div class="col-12">
                                        <p><b>Taxa Iva:</b> <?=$servico->iva->percentagem.'%'?></p>
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



