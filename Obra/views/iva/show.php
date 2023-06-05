<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mostrar Dados </h1>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title ">Dados do Iva</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive ">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th><h3>Id</h3></th>
                                        <th><h3>Estado</h3></th>
                                        <th><h3>Percentagem</h3></th>
                                        <th><h3>Descrição</h3></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?=$ivas->id?></td>
                                        <td>
                                            <?php if($ivas->emvigor == 1){ ?>
                                                <span class="badge bg-success">Em Vigor</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Oculta</span>
                                            <?php } ?>
                                        </td>
                                        <td><?= $ivas->percentagem.'%' ?></td>
                                        <td><?= $ivas->descricao ?></td>
                                    </tr>
                                    </tbody>
                                    <td>
                                        <a href="index.php?c=iva&a=index" class="btn btn-info" role="button"> Cancelar</a>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
