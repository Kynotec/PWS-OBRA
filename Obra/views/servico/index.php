<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Serviços</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Lista de Serviços</h3>
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
                                        <th class="fit_column">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php foreach ($servicos as $servico) { ?>
                                    <tr>
                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->precohora.'€'?></td>
                                        <td><?=$servico->iva->percentagem.'%'?></td>
                                        <td> <a class="btn btn-info btn-sm" href="index.php?c=servico&a=edit&id=<?= $servico->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                        <a class="btn btn-danger btn-sm" href="index.php?c=servico&a=delete&id=<?= $servico->id?>"><i class="fas fa-trash"></i> Apagar </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="index.php?c=servico&a=create" class="btn btn-sm btn-secondary float-left">Criar Serviço</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>