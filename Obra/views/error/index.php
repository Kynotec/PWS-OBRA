 <!-- Main content -->

        <div class="error-page">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class="col-sm-12">

                        <h1 class="fas fa-exclamation-triangle text-danger">500 Error Page</h1>
                        <br><br>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <h2 class="headline text-danger">500</h2>
            <div class="error-content pt-3">
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Alguma coisa está mal.</h3>

                <p>
                    Um erro ocorreu e não foi possível processar o seu pedido.
                    <?php if($callbackroute == null){ ?>
                        <a href="./index.php">Voltar ao Inicio</a>
                    <?php } else {?>
                        Tente <a href="<?= $callbackroute ?>">Voltar Atrás</a> or <a href="index.php?c=bo&a=index">Ir para o Inicio</a>.
                    <?php } ?>
                </p>
            </div>
            </div>
        </div>
        <!-- /.error-page -->
