<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Taxas IVA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                        <li class="breadcrumb-item active">Ivas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="index.php?c=iva&a=index" method="post" class="input-group input-group-sm">
                                    <a class="pt-1 mx-2" href="./index.php?c=iva&a=index">Limpar Filtro</a>
                                    <select id="filter_type" class="form-control" name="filter_type">
                                        <option value="descricao">Descrição</option>
                                        <option value="percentagem">Percentagem</option>
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
                                            <a class="btn btn-info btn-sm" href="index.php?c=iva&a=show&id=<?= $iva->id?>"><i class="fas fa-eye"></i> Mostrar </a>
                                            <a class="btn btn-warning btn-sm" href="index.php?c=iva&a=edit&id=<?= $iva->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>
                                            <?php if($iva->emvigor == 1) {?>
                                                <a class="btn btn-danger btn-sm" onclick="disableEntity(<?= $iva->id ?>)"> <i class="fas fa-toggle-on"></i> Desativar </a>
                                            <?php } else { ($iva->emvigor == 0) ?>
                                                <a class="btn btn-success btn-sm" onclick="enableEntity(<?= $iva->id ?>)"> <i class="fas fa-toggle-off"></i> Ativar </a>

                                            <?php } ?>
                                            <a class="btn btn-danger btn-sm" onclick="deleteEntity(<?= $iva->id?>)"><i class="fas fa-trash"></i> Apagar </a>


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


<!-- Modal Disable-->
<div class="modal fade" id="modalDisable" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo desativar esta Taxa de Iva?</p>
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
                <p>Pretende mesmo ativar esta Taxa de Iva?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_enable_btn" class="btn btn-success btn-sm">Ativar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Pretende mesmo apagar esta Taxa de Iva?</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="modal_delete_btn" class="btn btn-danger">Apagar</a>
                <a href="#" class="btn btn-info" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function disableEntity(id)
    {
        document.getElementById('modal_disable_btn').setAttribute('href', 'index.php?c=iva&a=disable&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDisable'), {
            keyboard: true
        }).toggle();
    }
</script>

<script type="text/javascript">
    function enableEntity(id)
    {
        document.getElementById('modal_enable_btn').setAttribute('href', 'index.php?c=iva&a=enable&id=' + id);

        new bootstrap.Modal(document.getElementById('modalEnable'), {
            keyboard: true
        }).toggle();
    }
</script>

<script type="text/javascript">
    function deleteEntity(id)
    {
        document.getElementById('modal_delete_btn').setAttribute('href', 'index.php?c=iva&a=delete&id=' + id);

        new bootstrap.Modal(document.getElementById('modalDelete'), {
            keyboard: true
        }).toggle();
    }
</script>