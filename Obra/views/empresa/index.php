<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalhes de "<?= $empresa->designacaosocial ?>"</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item"><a href="./index.php?c=empresa&a=index">Empresa</a></li>
                    <li class="breadcrumb-item active">Detalhes de "<b><?= $empresa->designacaosocial ?>"</b></li>
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
                        <h2 class="d-inline p-2"><?=$empresa->designacaosocial?></h2>
                        <div class="card-tools">
                            <div class="btn-toolbar">
                                <div class="btn-group mr-2">
                                    <a href="index.php?c=empresa&a=edit&id=<?= $empresa->id ?>" class="btn" role="button"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="blockquote mb-0">
                            <div class="row">
                                <div class="col-12 pt-4">
                                    <p><b>Designação Social:</b> <?= $empresa->designacaosocial?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Email:</b> <?=$empresa->email?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Telefone:</b> <?=$empresa->telefone?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>NIF:</b> <?=$empresa->nif?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Morada:</b> <?=$empresa->morada?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Código Postal:</b> <?=$empresa->codigopostal?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Localidade:</b> <?=$empresa->localidade?></p>
                                </div>
                                <div class="col-12">
                                    <p><b>Capital Social:</b> <?=$empresa->capitalsocial.'€'?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


