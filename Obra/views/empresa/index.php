<div class="content-wrapper">
    <div class="content-header">

    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                     <div class="card card-primary">
                        <div class="card-header">
                              <h3 class="card-title ">Dados da Empresa</h3>
                         </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-muted">
                            <p class="text-sm">Designação Social
                                <b class="d-block"><?=$empresa->designacaosocial?></b>
                            </p>
                            <p class="text-sm">Email
                                <b class="d-block"><?=$empresa->email?></b>
                            </p>
                            <p class="text-sm">Telefone
                                <b class="d-block"><?=$empresa->telefone?></b>
                            </p>
                            <p class="text-sm">NIF
                                <b class="d-block"><?=$empresa->nif?></b>
                            </p>
                            <p class="text-sm">Morada
                                <b class="d-block"><?=$empresa->morada?></b>
                            </p>
                            <p class="text-sm">Código Postal
                                <b class="d-block"><?=$empresa->codigopostal?></b>
                            </p>
                            <p class="text-sm">Localidade
                                <b class="d-block"><?=$empresa->localidade?></b>
                            </p>
                            <p class="text-sm">Capital Social
                                <b class="d-block"><?=$empresa->capitalsocial.'€'?></b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer clearfix">
                <a href="index.php?c=empresa&a=edit&id=<?= $empresa->id ?>" class="btn btn-sm btn-secondary float-left">Editar Dados</a>
            </div>
        </div>
    </section>
</div>



