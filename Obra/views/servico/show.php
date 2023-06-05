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
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title ">Dados do Serviço</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive ">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th><h3>Id</h3></th>
                                        <th><h3>Referencia</h3></th>
                                        <th><h3>Descrição</h3></th>
                                        <th><h3>Preço/Hora</h3></th>
                                        <th><h3>Taxa Iva</h3></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?=$servico->id?></td>
                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->precohora.'€'?></td>
                                        <td><?=$servico->iva->percentagem.'%'?></td>
                                    </tr>
                                    <td>
                                        <a href="index.php?c=servico&a=index" class="btn btn-info" role="button"> Cancelar</a>
                                    </td>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>