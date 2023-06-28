<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php?c=folhaobra&a=indexcliente">Obra</a></li>
                        <li class="breadcrumb-item active">Obras</li>
                    </ol>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Pagar Folha-Obra</h3>
                    </div>
                    <form class="form-horizontal" action="index.php?c=folhaobra&a=updatepagamento&idFolhaObra=<?=$folhaobra->id?>" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label">Introduza o número do Cartão de Crédito:</label>
                                <input type="text"  required class="form-control"  maxlength="16" minlength="16" id="numericInput" oninput="validateNumericInput(event)" placeholder="Número do Cartão de Crédito">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning btn-sm" <i class=" fas fa-credit-card"></i>Pagar</button>
                            <a class="btn btn-default float-right" href="index.php?c=folhaobra&a=indexcliente"> Cancelar </a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    function validateNumericInput(event) {
        const input = event.target;
        const value = input.value.replace(/\D/g, ''); // Remove non-digit characters
        input.value = input.value.replace(/\D/g, '');

        if (value.length < 16) {
            input.setCustomValidity("Insira os 16 digitos do cartão de crédito!");
        } else {
            input.setCustomValidity("");
        }
    }
</script>
