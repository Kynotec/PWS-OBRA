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
                            <form action="./index.php?c=servico&a=index" method="post" class="input-group input-group-sm">
                                <a class="pt-1 mx-2" href="./index.php?c=servico&a=index">Limpar Filtro</a>
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
                                        <th>Estado</th>
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
                                        <td><?= $servico->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Inativo</span>' ?></td>
                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->precohora.'€'?></td>
                                        <td><?=$servico->iva->descricao ?> (<?= $servico->iva->percentagem ?>%)</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="index.php?c=servico&a=show&id=<?= $servico->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                            <a class="btn btn-warning btn-sm" href="index.php?c=servico&a=edit&id=<?= $servico->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                            <?php if($servico->ativo == 1) {?>
                                                <a  href="#" class="btn btn-danger btn-sm" onclick="disableEntity(<?= $servico->id ?>)"> <i class="fas fa-toggle-on"></i> Desativar </a>
                                            <?php } else { ($servico->ativo == 0) ?>
                                                <a  href="#" class="btn btn-success btn-sm" onclick="enableEntity(<?= $servico->id ?>)"> <i class="fas fa-toggle-off"></i> Ativar </a>

                                            <?php } ?>
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
    </div>
</div>

<!-- Modal Disable-->
<div class="modal fade" id="modalDisable" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo desativar este Serviço?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_disable_btn" class="btn btn-danger">Desativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Enable-->
<div class="modal fade" id="modalEnable" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo ativar este Serviço?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_enable_btn" class="btn btn-success btn-sm">Ativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function disableEntity(id)
    {
        document.getElementById('modal_disable_btn').setAttribute('href', 'index.php?c=servico&a=disable&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDisable'), {
            keyboard: true
        }).toggle();
    }
</script>

<script type="text/javascript">
    function enableEntity(id)
    {
        document.getElementById('modal_enable_btn').setAttribute('href', 'index.php?c=servico&a=enable&id=' + id);

        new bootstrap.Modal(document.getElementById('modalEnable'), {
            keyboard: true
        }).toggle();
    }
</script>