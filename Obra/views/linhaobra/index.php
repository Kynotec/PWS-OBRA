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
                                <b>Obra Nº <?= $folhaobra->id ?></b> <br>
                                <small class="float">Data: <?=$folhaobra->data->format('d-m-Y')?> </small>
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
                                    <th>REF</th>
                                    <th>Descrição</th>
                                    <th>QTD</th>
                                    <th>Preço Unidade</th>
                                    <th>IVA</th>
                                    <th>Taxa</th>
                                    <th>SubTotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php foreach ($folhaobra->linhaobras as $linhaobra) { ?>
                                <tr>
                                    <td><?=$linhaobra->servico->referencia?></td>
                                    <td><?=$linhaobra->servico->descricao?></td>
                                    <td><?=$linhaobra->quantidade?></td>
                                    <td><?=$linhaobra->valorunitario."€"?></td>
                                    <td><?=$linhaobra->servico->iva->percentagem. "%"?></td>
                                    <td><?=$linhaobra->valoriva * $linhaobra->quantidade. "€"?></td>
                                    <td> <?=$linhaobra->servico->preco*$linhaobra->quantidade. "€"?></td>
                                    <td>
                                        <a href="index.php?c=linhaobra&a=edit&idLinhaFatura=<?= $linhaobra->id?>&idFolhaobra=<?=$folhaobra->id?>&idServico=<?=$linhaobra->servico->id?>" class="btn btn-primary"><i class="nav-icon fa-solid fa-pen-to-square"></i>  </a>
                                    </td>
                                    <td>
                                        <a href="index.php?c=linhaobra&a=delete&idLinhaFatura=<?= $linhaobra->id?>&idFolhaobra=<?=$folhaobra->id?>" class="btn btn-primary" style="background-color: red; border-color: red"><i class="fa-solid fa-trash-can"></i> </a>
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

                                    <form action="index.php?c=linhaobra&a=store&idFolhaobra=<?= $folhaobra->id?>&idServico=<?= $servico->id?>" method="post">
                                        <tr>
                                            <td>
                                                <?=$servico->referencia?><br>
                                            </td>
                                            <td>
                                                <?=$servico->descricao?><br>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" name="precohora" value=" <?=$servico->precohora?>">
                                                <?=$servico->precohora."€"?><br>
                                            </td>
                                            <td>
                                                <input type="hidden" class="form-control" name="valoriva" value=" <?=$servico->preco*($servico->iva->percentagem/100)?>">
                                                <?=$servico->precohora*($servico->iva->percentagem/100)?><br>
                                            </td>
                                            <td>
                                                <?=$servico->iva->percentagem?><br>
                                            </td>
                                            <td>
                                                <?=$servico->precohora+($servico->iva->percentagem/100)?><br>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary" style="background-color: green"><i class="nav-icon fa-solid fa-check" ></i></button>
                                            </td>
                                            <td>
                                                <a href="index.php?c=linhaobra&a=create&id=<?= $folhaobra->id?>" class="btn btn-primary" style="background-color: red"><i class="nav-icon fa-solid fa-x"></i></a>

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
                        <div class="col-2">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th>IVA:</th>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>0</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            Fatura Processada por <?= $_SESSION['username']?>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                Emitir
                            </button>
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



