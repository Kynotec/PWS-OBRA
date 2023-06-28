<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Criar Taxa</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Introduza os dados</h3>
                        </div>
                        <form action="index.php?c=iva&a=store" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="emvigor" name="emvigor"/>
                                        <label for="emvigor" class="form-check-label"> Ativo</label><br>
                                    </div>
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="<?php if(isset($ivas)) { echo $ivas->descricao; }?>">
                                    <?php if(isset($ivas->errors)){ echo $ivas->errors->on('descricao'); }?>
                                </div>
                                <div class="form-group">
                                    <label>Percentagem</label>
                                    <input type="text" class="form-control"  placeholder="Percentagem" maxlength="2" minlength="1" id="numericInput" oninput="validateNumericInput(event)"  name="percentagem" required value="<?php if(isset($ivas)) { echo $ivas->percentagem; }?>">
                                    <?php if(isset($iva->errors)){ echo $iva->errors->on('percentagem'); }?>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Adicionar Taxa</button>
                                <a href="index.php?c=iva&a=index" class="btn btn-info" role="button"> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
    </section>
</div>
<script>
    function validateNumericInput(event) {
        const input = event.target;
        const value = input.value.replace(/\D/g, ''); // Remove non-digit characters
        input.value = input.value.replace(/\D/g, '');

        if (value.length < 1) {
            input.setCustomValidity("Insira até 2 digitos!");
        } else {
            input.setCustomValidity("");
        }
    }
</script>