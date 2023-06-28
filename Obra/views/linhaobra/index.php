<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                        <li class="breadcrumb-item"><a href="./index.php?c=folhaobra&a=index">Obras</a></li>
                        <li class="breadcrumb-item active">Obra Nº<?= $folhaobra->id ?></li>
                    </ol>
                </ol>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" >
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-12" >

                <!-- Main content -->
                <div class="invoice p-3 mb-3" style="background-color: #fffffc; color: #0a0e14">
                    <!-- title row -->
                    <div class="row" >
                        <div class="col-12">
                            <h4>
                                <b>Obra Nº <?= $folhaobra->id ?></b> <br>
                                <small class="float">Data: <?=$folhaobra->data->format('Y-m-d H:i:s')?> </small><br>
                                <?php if($folhaobra->estado =='Emitida')
                                {
                                    echo '<span class="badge bg-success">'.$folhaobra->estado.'</span>';
                                }
                                elseif ($folhaobra->estado =='Em Lançamento')
                                {
                                    echo '<span class="badge bg-warning">'.$folhaobra->estado.'</span>';
                                }
                                ?>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address> <br>
                                <strong><?=$empresa->designacaosocial?></strong><br>
                                <?=$empresa->morada?><br>
                                <?=$empresa->localidade. ', ' . $empresa->codigopostal?><br>
                                <b>Nif:</b> <?= $empresa->nif ?><br>
                                <b>Telefone:</b> <?= $empresa->telefone ?><br>
                                <b>Email:</b> <?= $empresa->email?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <address><br>
                                <b>Cliente:</b> <br>
                                <?= $folhaobra->cliente->username ?> <br>
                                <?= $folhaobra->cliente->morada ?> <br>
                                <?= $folhaobra->cliente->codigopostal ?>, <?= $folhaobra->cliente->localidade ?> <br>
                                <b>Nif:</b> <?= $folhaobra->cliente->nif ?><br>
                                <b>Telefone:</b> <?= $folhaobra->cliente->telefone?><br>
                                <b>Email:</b> <?= $folhaobra->cliente->email?><br>

                            </address>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Referência</th>
                                        <th>Descrição</th>
                                        <th>QTD</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor IVA</th>
                                        <th>Taxa IVA</th>
                                        <th>Total</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($folhaobra->linhaobras as $linhaobra) { ?>
                                        <tr>
                                            <td><?=$linhaobra->servico->referencia?></td>
                                            <td><?=$linhaobra->servico->descricao?></td>
                                            <td><?=$linhaobra->quantidade?></td>
                                            <td><?=$linhaobra->valorunitario."€"?></td>
                                            <td><?=$linhaobra->valoriva. "€"?></td>
                                            <td><?=$linhaobra->servico->iva->percentagem. "%"?></td>
                                            <td> <?=$linhaobra->valortotal. "€"?></td>
                                            <td>
                                                <a href="index.php?c=linhaobra&a=edit&idLinhaObra=<?= $linhaobra->id?>&idFolhaObra=<?=$folhaobra->id?>&idServico=<?=$linhaobra->servico->id?>" class="btn btn-primary"><i class="nav-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                                <a href="index.php?c=linhaobra&a=delete&idLinhaObra=<?= $linhaobra->id?>&idFolhaObra=<?=$folhaobra->id?>" class="btn btn-primary" style="background-color: red; border-color: red"><i class="fa-solid fa-trash-can"></i>Cancelar</a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <tr>
                                        <form action="index.php?c=linhaobra&a=validate&idFolhaObra=<?=$folhaobra->id?>" method="post">
                                        <td>
                                            <input type="number"  name="referencia" id="referencia"><br>
                                        </td>
                                        <td>
                                            <button type="submit" class="fas fa-plus" style="background-color: green"></button>
                                        </td>
                                        </form>

                                        <td>
                                            <a href="index.php?c=linhaobra&a=selectServico&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary" >Escolher Servico</a>
                                        </td>

                                        <td>
                                        </td>
                                        <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                                    </tr>
                                    <?php  if (isset($servico))
                                    { ?>
                                    <form action="index.php?c=linhaobra&a=store&idFolhaObra=<?= $folhaobra->id?>&idServico=<?= $servico->id?>" method="post">
                                        <tr>
                                            <td>



                                                <?=$servico->referencia?><br>


                                                <form  action="index.php?c=linhaobra&a=store&idFolhaObra=<?= $folhaobra->id?>&idServico=<?= $servico->id?>" method="post">
                                                <input type="number" class="form-control" name="referencia" value="<? ?>"><br>
                                                </form>
                                            <td>
                                                <a href="index.php?c=linhaobra&a=selectServico&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary" >Escolher Servico</a>
                                            </td>

                                            </td>
                                            <td>
                                                <?=$servico->descricao?><br>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" placeholder="QTD" name="quantidade" min="1" required style="width: 100px; margin-left: -10px">
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" name="valorunitario" value=" <?=$servico->precohora?>"><br>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" value=" <?=$linhaobra->valoriva. "€"?>"><br>
                                            </td>
                                            <td>
                                                <?=$servico->iva->percentagem. "%"?><br>
                                            </td>
                                            <td>
                                                <?=$linhaobra->valortotal. "€"?><br>
                                            </td>

                                            <td>
                                                <button type="submit" class="btn btn-primary" style="background-color: green"> Validar</button>
                                                <a href="index.php?c=linhaobra&a=index&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary" style="background-color: red">Cancelar</i></a>
                                            </td>

                                        </tr>
                                    </form>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row flex-row-reverse">

                            <!-- /.col -->

                            <div class="col-md-2"">

                            <table class="table table-sm">
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>
                                        <?= $folhaobra->subtotal . "€"?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>IVA:</th>
                                    <td><?= $folhaobra->ivatotal . "€"?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td><?= $folhaobra->valortotal . "€"?>
                                    </td>
                                </tr>
                                <tr>
                                        <td>
                                        <a href="index.php?c=folhaobra&a=update&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-success btn-sm">Emitir</a>
                                    </td>
                                    <td>
                                        <a href="index.php?c=folhaobra&a=delete&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-danger btn-sm">Anular</a>
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="col-sm-4 invoice-col">

                        Folha Obra Processada por : <b><?= $_SESSION['username']?> </b>
                    </div>
                    <br><br>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->