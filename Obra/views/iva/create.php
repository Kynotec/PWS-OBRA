<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Taxa</h1>
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
                        <form action="index.php?c=iva&a=store" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php if(isset($ivas)) { echo $ivas->descricao; }?>">
                                    <?php if(isset($ivas->errors)){ echo $ivas->errors->on('descricao'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Percentagem</label>
                                    <input type="text" class="form-control" placeholder="Percentagem" name="percentagem" value="<?php if(isset($ivas)) { echo $ivas->percentagem; }?>">
                                    <?php if(isset($ivas->errors)){ echo $ivas->errors->on('percentagem'); }?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Adicionar Taxa</button>
                                <a href="index.php?c=iva&a=index" class="btn btn-info" role="button"> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</div>