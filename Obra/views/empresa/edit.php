<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Dados </h1>
                </div>

            </div>
        </div>
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
                            <form action="index.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">
                                    <div class="text-muted">
                                        <p class="text-sm">Designação Social
                                            <input type="text" class="form-control" placeholder="Designacão Social" name="designacaosocial" value="<?= $empresa->designacaosocial ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('designacaosocial'); }?>
                                        </p>
                                        <p class="text-sm">Email
                                            <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $empresa->email ?>">
                                            <?php
                                            if(isset($empresa->errors)) {
                                            if (is_array($empresa->errors->on('email'))) {
                                            foreach ($empresa->errors->on('email') as $error) {
                                            echo $error . '<br>';
                                            }
                                            } else {
                                            echo $empresa->errors->on('email');
                                            }
                                            }
                                            ?>
                                        </p>
                                        <p class="text-sm">Telefone
                                            <input type="text" class="form-control" placeholder="Telefone" name="telefone" minlength="9" maxlength="9" value="<?= $empresa->telefone ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('telefone'); }?>
                                        </p>
                                        <p class="text-sm">NIF
                                            <input type="text" class="form-control" placeholder="NIF" name="nif" minlength="9" maxlength="9" value="<?= $empresa->nif ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('nif'); }?>
                                        </p>
                                        <p class="text-sm">Morada
                                            <input type="text" class="form-control" placeholder="Morada" name="morada" value="<?= $empresa->morada ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('morada'); }?>
                                        </p>
                                        <p class="text-sm">Cod. Postal
                                            <input type="text" class="form-control" placeholder="Codigo Postal" name="codigopostal" value="<?= $empresa->codigopostal ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('codigopostal'); }?>
                                        </p>
                                        <p class="text-sm" >Localidade
                                            <input type="text" class="form-control" placeholder="Localidade" name="localidade" value="<?= $empresa->localidade ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('localidade'); }?>
                                        </p>
                                        <p class="text-sm">Capital Social
                                            <input type="text" class="form-control" placeholder="Capital Social" name="capitalsocial" required value="<?= $empresa->capitalsocial ?>">
                                            <?php if(isset($empresa->errors)){ echo $empresa->errors->on('capitalsocial'); }?>
                                        </p>
                                    </div>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                            <a href="index.php?c=empresa&a=index" class="btn btn-info" role="button"> Cancelar</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>










