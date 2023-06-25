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
                            <h3 class="card-title ">Dados do Serviço</h3>
                        </div>
                        <div class="card-body">
                            <form action="index.php?c=servico&a=update&id=<?= $servico->id ?>" method="post">
                                <div class="text-muted">

                                    <p class="text-sm">Referencia
                                        <input type="text" class="form-control" placeholder="Referencia" name="referencia" value="<?= $servico->referencia ?>">
                                        <?php if(isset($servico->errors)){ echo $servico->errors->on('referencia'); }?>
                                    </p>

                                    <p class="text-sm">Descrição
                                        <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?= $servico->descricao ?>">
                                        <?php if(isset($servico->errors)){ echo $servico->errors->on('descricao'); }?>
                                    </p>

                                    <p class="text-sm">Preço/Hora
                                        <input type="text" class="form-control" placeholder="Preço/Hora" name="precohora" value="<?= $servico->precohora ?>">
                                        <?php if(isset($servico->errors)){ echo $servico->errors->on('precohora'); }?>
                                    </p>

                                    <p class="text-sm">Taxa de IVA
                                        <select class="form-control" id="iva_id" name="iva_id" >
                                            <?php foreach($ivas as $iva){?>
                                                <?php if($iva->emvigor == 1) { ?>
                                                    <?php if($iva->id == $servicos->iva_id) { ?>
                                                        <option <?= $servico->iva_id == $iva->id ? 'selected' : '' ?> value="<?= $iva->id ?>"><?= $iva->descricao ?> (<?= $iva->percentagem ?>%)</option>

                                                    <?php }
                                                    else { ?>
                                                        <option <?= $servico->iva_id == $iva->id ? 'selected' : '' ?> value="<?= $iva->id ?>"><?= $iva->descricao ?> (<?= $iva->percentagem ?>%)</option>
                                                    <?php }
                                                }} ?>
                                        </select>
                                    </p>
                                </div>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                            <a href="index.php?c=servico&a=index" class="btn btn-info" role="button"> Cancelar</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>