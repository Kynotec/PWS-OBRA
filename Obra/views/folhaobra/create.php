 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fatura</h1>
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
                                    <b>Fatura Nº0000</b> <br>
                                    <small class="float">Data: </small>
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
                                    <strong>Cliente:</strong><br>
                                    <a href="index.php?c=folhaobra&a=selectClient" class="btn btn-primary" >Selecionar</a>
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

                                    </tr>

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



