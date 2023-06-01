<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Serviços</h1>
                </div>
            </div
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Lista de Serviços</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Referencia</th>
                                        <th>Descrição</th>
                                        <th>Preço/Hora</th>
                                        <th>Taxa IVA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($servicos as $servico) { ?>
                                        <?php if($servico->id == $id){ ?>
                                            <form action="index.php?c=produto&a=update&id=<?=$servico->id ?>" method="post">
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Referencia" name="referencia"  value="<?=$servico->referencia?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Descricao" name="descricao"  value=" <?=$servico->descricao?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Preco" name="precohora"  value="<?php if(isset($servicos)) { echo $servico->precohora; }?>">
                                                        <?php if(isset($servicos->errors)){ echo $servicos->errors->on('precohora'); }?>
                                                    </td>
                                                    <td>
                                                        <select name="taxaiva" class="form-control">

                                                            <?php foreach($ivas as $iva){?>
                                                                <?php if($iva->emvigor == 1) { ?>
                                                                    <?php if($iva->id == $servico->taxaiva) { ?>
                                                                        <option value="<?= $iva->id?>" selected><?= $iva->descricao;?> </option>
                                                                    <?php }
                                                                    else { ?>
                                                                        <option value="<?= $iva->id?>"><?= $iva->descricao;?> </option>
                                                                    <?php }
                                                                } }?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" style="background-color: green; border-color: green"><i class="nav-icon fa-solid fa-check" ></i></button>
                                                        <a href="index.php?c=servico&a=index" class="btn btn-primary" style="background-color: red; border-color: red"><i class="nav-icon fa-solid fa-x"></i></a>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?php }else{?>
                                            <tr>
                                                <td><?=$servico->referencia?></td>
                                                <td><?=$servico->descricao?></td>
                                                <td><?=$servico->precohora.'€'?></td>
                                                <td><?=$servico->taxaiva?></td>
                                                <td> <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i> Editar</a></td>
                                            </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="#" class="btn btn-sm btn-info float-left">Adicionar Produto</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
