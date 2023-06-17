<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Folha Obra</h1>
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
                                <?=$empresa->localidade. ',' . $empresa->codigopostal?><br>
                                Telefone: <?=$empresa->telefone?><br>
                                Email: <?=$empresa->email?>
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
                                        <td><?=$linhaobra->servico->iva->percentagem. "%"?></td>
                                        <td><?=$linhaobra->servico->iva->percentagem * $linhaobra->quantidade. "€"?></td>
                                        <td> <?=$linhaobra->servico->precohora*$linhaobra->quantidade. "€"?></td>
                                        <td>
                                            <a href="index.php?c=linhaobra&a=edit&idLinhaObra=<?= $linhaobra->id?>&idFolhaobra=<?=$folhaobra->id?>&idServico=<?=$linhaobra->servico->id?>" class="btn btn-primary"><i class="nav-icon fa-solid fa-pen-to-square"></i>  </a>
                                        </td>
                                        <td>
                                            <a href="index.php?c=linhaobra&a=delete&idLinhaObra=<?= $linhaobra->id?>&idFolhaobra=<?=$folhaobra->id?>" class="btn btn-primary" style="background-color: red; border-color: red"><i class="fa-solid fa-trash-can"></i> </a>
                                        </td>
                                    </tr>
                                <?php }?>
                                <?php  if (!isset($idServico))
                                {?>

                                    <tr>
                                        <td>
                                            <a href="index.php?c=linhaobra&a=selectServico&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary" >Escolher Servico</a>
                                        </td>
                                        <td>
                                        </td>
                                        <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                                    </tr>
                                <?php }else
                                    if (isset($servico))
                                    { ?>

                                        <form action="index.php?c=linhaobra&a=store&idFolhaObra=<?= $folhaobra->id?>&idServico=<?= $servico->id?>" method="post">
                                            <tr>
                                                <td>
                                                    <?=$servico->referencia?><br>
                                                </td>
                                                <td>
                                                    <?=$servico->descricao?><br>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" placeholder="QTD" name="quantidade" min="1" style="width: 100px; margin-left: -10px">
                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control" name="valorunitario" value=" <?=$servico->precohora?>">
                                                    <?=$servico->precohora."€"?><br>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control" value=" <?=$servico->precohora*($servico->iva->percentagem/100)?>">
                                                    <?=$servico->precohora*($servico->iva->percentagem/100) ."€"?><br>
                                                </td>
                                                <td>
                                                    <?=$servico->iva->percentagem?>%<br>
                                                </td>
                                                <td>
                                                    <?=$servico->precohora+$servico->precohora*($servico->iva->percentagem/100)?>€<br>
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

                        <div class="col-md-2" style="margin-right: 180px">

                            <table class="table">
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>
                                        <?= $subtotal . "€"?>
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
                                        <a href="index.php?c=folhaobra&a=update&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary float-right">Emitir</a>
                                    </td>
                                    <td>
                                        <a href="index.php?c=folhaobra&a=delete&idFolhaObra=<?= $folhaobra->id?>" class="btn btn-primary float-right">Anular</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            Fatura Processada por <?= $_SESSION['username']?>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
