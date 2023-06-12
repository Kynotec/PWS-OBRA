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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title ">Dados do Funcionário</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive ">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th><h3>Id</h3></th>
                                        <th><h3>Username</h3></th>
                                        <th><h3>Password</h3></th>
                                        <th><h3>Email</h3></th>
                                        <th><h3>Telefone</h3></th>
                                        <th><h3>Nif</h3></th>
                                        <th><h3>Morada</h3></th>
                                        <th><h3>Código Postal</h3></th>
                                        <th><h3>Localidade</h3></th>
                                        <th><h3>Role</h3></th>
                                        <th><h3>Ativo</h3></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?=$users->id?></td>
                                        <td><?=$users->username?></td>
                                        <td><?=$users->password?></td>
                                        <td><?=$users->email?></td>
                                        <td><?=$users->telefone?></td>
                                        <td><?=$users->nif?></td>
                                        <td><?=$users->morada?></td>
                                        <td><?=$users->codigopostal?></td>
                                        <td><?=$users->localidade?></td>
                                        <td><?=$users->role?></td>
                                        <td><?= $users->ativo == 1 ? '<span class="badge bg-success">Ativo</span>': '<span class="badge bg-danger">Desativado</span>' ?></td>

                                    </tr>
                                    </tbody>
                                    <td>
                                        <a href="index.php?c=funcionario&a=index" class="btn btn-info" role="button"> Cancelar</a>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>