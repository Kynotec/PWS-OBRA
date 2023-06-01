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
                            <h3 class="card-title ">Dados do Iva</h3>
                        </div>
                        <div class="card-body">
                            <form action="index.php?c=iva&a=update&id=<?= $iva->id ?>" method="post">
                                <div class="text-muted">
                                    <p class="text-sm">Percentagem
                                        <input type="text" class="form-control" placeholder="Percentagem" name="percentagem" value="<?= $iva->percentagem ?>">
                                        <?php if(isset($iva->errors)){ echo $iva->errors->on('percentagem'); }?>
                                    </p>

                                    <p class="text-sm">Descrição
                                        <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?= $iva->descricao ?>">
                                        <?php if(isset($iva->errors)){ echo $iva->errors->on('descricao'); }?>
                                    </p>
                                </div>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                            <a href="index.php?c=iva&a=index" class="btn btn-info" role="button"> Cancelar</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>