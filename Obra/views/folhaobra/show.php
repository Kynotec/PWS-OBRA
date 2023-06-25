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
                                <small class="float">Data: <?=$folhaobra->data->format('Y-m-d H:i:s')?> </small>
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
                                <?php if(count($folhaobra->linhaobras) > 0){ ?>
                                    <a class="btn btn-sencondary text-right" href="./index.php?c=folhaobra&a=pdf&id=<?= $folhaobra->id ?>">
                                        <img src="./public/dist/img/pdf-icon.png" height="30">
                                    </a>
                                <?php } ?>
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
                                        </tr>
                                    <?php }?>
                                    <?php  if (!isset($idServico))
                                    {?>
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
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="col-sm-4 invoice-col">

                        Fatura Processada por : <b><?= $_SESSION['username']?> </b>
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
