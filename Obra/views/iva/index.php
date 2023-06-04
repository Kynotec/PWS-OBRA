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
                                        <th>Estado</th>
                                        <th>Descricao</th>
                                        <th>Percentagem</th>
                                        <th class="fit_column">Ações</th>
                                        <!--  <th>Em Vigor</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(count($ivas) > 0)
                                    {
                                    foreach ($ivas as $iva)
                                    {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if($iva->emvigor == 1){ ?>
                                                    <span class="badge bg-success">Em Vigor</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Oculta</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $iva->descricao ?></td>
                                        <td><?= $iva->percentagem.'%' ?></td>

                                        <td>
                                            <a class="btn btn-info btn-sm" href="index.php?c=iva&a=edit&id=<?= $iva->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                            <a class="btn btn-danger btn-sm" href="index.php?c=iva&a=delete&id=<?= $iva->id?>"><i class="fas fa-trash"></i> Apagar </a>

                                        </td>
                                    </tr>
                                    <?php }
                                    } ?>
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