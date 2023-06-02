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
                                    <input type="text" class="form-control" placeholder="Referencia" name="referencia" minlength="11" maxlength="50" value="<?php if(isset($servicos)) { echo $servicos->referencia; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('referencia'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descricao" name="descricao" value="<?php if(isset($servicos)) { echo $servicos->descricao; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('descricao'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Preço/Hora</label>
                                    <input type="number" class="form-control" placeholder="Preço €" name="precohora" value="<?php if(isset($servicos)) { echo $servicos->preco; }?>">
                                    <?php if(isset($servicos->errors)){ echo $servicos->errors->on('precohora'); }?>
                                </div>

                                <div class="form-group">
                                    <label for="ivas">Taxa de IVA</label>
                                    <select class="form-control" id="ivas" name="ivas" >
                                        <?php if(isset($ivas)){
                                            foreach($ivas as $iva){?>
                                                <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                                            <?php }
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-check"></i>Adicionar Serviço</button>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</div>