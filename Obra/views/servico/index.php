    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0">Serviços</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
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
                                        <td>
                                            <a class="btn btn-info btn-sm" href="index.php?c=servico&a=show&id=<?= $servico->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                            <a class="btn btn-warning btn-sm" href="index.php?c=servico&a=edit&id=<?= $servico->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                            <a class="btn btn-danger btn-sm" onclick="deleteEntity(<?= $servico->id?>)"><i class="fas fa-trash"></i> Apagar </a>
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

    <!-- Modal Delete-->
    <div class="modal fade" id="modalDelete" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Pretende mesmo apagar este Serviço?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" id="modal_delete_btn" class="btn btn-danger">Apagar</a>
                    <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteEntity(id)
        {
            document.getElementById('modal_delete_btn').setAttribute('href', 'index.php?c=servico&a=delete&id=' + id);

            new bootstrap.Modal(document.getElementById('modalDelete'), {
                keyboard: true
            }).toggle();
        }
    </script>