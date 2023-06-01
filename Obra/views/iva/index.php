<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Taxas IVA</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Descricao</th>
                                        <th>Percentagem</th>
                                        <!--  <th>Em Vigor</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php foreach ($ivas as $iva) { ?>
                                        <td><?=$iva->descricao?></td>
                                        <td><?= $iva->percentagem.'%' ?></td>
                                        <!-- <td><?//=$iva->vigor->valor?></td>-->
                                        <!-- FALTA POR O EDITAR O ESTADO DA TAXA DE IVA!-->
                                        <td>
                                            <a class="btn btn-info btn-sm" href="index.php?c=iva&a=edit&id=<?= $iva->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="index.php?c=iva&a=create" class="btn btn-sm btn-secondary float-left">Criar Taxa de IVA</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>