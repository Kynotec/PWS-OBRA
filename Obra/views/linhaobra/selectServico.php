<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Serviços</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                    <li class="breadcrumb-item active">Serviços</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <form action="<?= $viewSearch?>" method="post" class="input-group input-group-sm">
                                <a class="pt-1 mx-2" href="<?= $viewSearch?>">Limpar Filtro</a>
                                <select id="filter_type" class="form-control" name="filter_type">
                                    <option value="id">Referencia</option>
                                    <option value="descricao">Descrição</option>
                                    <option value="precohora">Preço Hora</option>
                                    <option value="iva">Iva</option>
                                </select>
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Descrição</th>
                                    <th>Preço/Hora</th>
                                    <th>Taxa IVA</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php if(is_null($folhaobra->linhaobras)) {
                                        foreach ($servicos as $servico)
                                        {

                                        ?>
                                    <tr>

                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->precohora.'€'?></td>
                                        <td><?=$servico->iva->percentagem.'%'?></td>
                                        <td><a href="index.php?c=linhaobra&a=create&idServico=<?=$servico->id?>&idFolhaObra=<?=$folhaobra->id?>" class="btn btn-sm btn-info float-left">Selecionar</a></td>
                                    </tr>

                                    <?php   } }
                                    foreach ($servicos as $servico){
                                    if ($servico->ativo == '1') {
                                        ?>
                                            <tr>
                                                <td><?=$servico->referencia?></td>
                                                <td><?=$servico->descricao?></td>
                                                <td><?=$servico->precohora.'€'?></td>
                                                <td><?=$servico->iva->percentagem.'%'?></td>
                                                <td><a href="index.php?c=linhaobra&a=create&idServico=<?=$servico->id?>&idFolhaObra=<?=$folhaobra->id?>" class="btn btn-sm btn-info float-left">Selecionar</a></td>
                                            </tr>
                                        <?php  }} ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
        </div>
                <!-- /.col -->


                <!-- /.row -->
            </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



