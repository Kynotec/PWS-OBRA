<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adicionar Serviço</h1>
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
                            <h3 class="card-title">Introduza os dados</h3>
                        </div>

                        <form action="index.php?c=servico&a=store" method="post">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Referencia</label>
                                    <input type="text" class="form-control" placeholder="Referencia" name="referencia" value="<?php if(isset($servicos)) { echo $servicos->referencia; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('referencia'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descricao" name="descricao" value="<?php if(isset($servicos)) { echo $servicos->descricao; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('descricao'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Preço/Hora</label>
                                    <input type="text" class="form-control" placeholder="Preço €" name="precohora"  value="<?php if(isset($servicos)) { echo $servicos->precohora; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('precohora'); }?>
                                </div>

                                <div class="form-group">
                                    <label for="iva_id">Taxa de IVA</label>
                                    <select name="iva_id" class="form-control">

                                        <?php foreach($ivas as $iva){?>
                                            <?php if($iva->emvigor == 1) { ?>
                                                <?php if($iva->id == $servicos->iva_id) { ?>
                                                    <option value="<?= $iva->id?>" selected><?= $iva->descricao ?> <?= $iva->percentagem;?> </option>
                                                <?php }
                                                else { ?>
                                                    <option value="<?= $iva->id?>"><?= $iva->descricao ?> (<?= $iva->percentagem ?>%) </option>
                                                <?php }
                                            }} ?>
                                    </select>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Adicionar Serviço</button>
                                <a href="index.php?c=servico&a=index" class="btn btn-info" role="button"> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</div>