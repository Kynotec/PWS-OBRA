 <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Obras</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Obras</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">

                             <a href="./index.php?c=folhaobra&a=create" class="btn btn-primary btn-sm">Registar Obras</a>

                         <div class="card-tools">
                             <form action="index.php?c=folhaobra&a=index" method="post" class="input-group input-group-sm">
                                 <a class="pt-1 mx-2" href="./index.php?c=folhaobra&a=index">Limpar Filtro</a>
                                 <select id="filter_type" class="form-control" name="filter_type">
                                     <option value="id">Nº Fatura</option>
                                     <option value="estado">Estado</option>
                                     <option value="cliente">Cliente</option>
                                     <option value="funcionario">Funcionario</option>
                                     <option value="total">Total</option>
                                 </select>
                                 <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                                 <div class="input-group-append">
                                     <button type="submit" class="btn btn-default">
                                         <i class="fas fa-search"></i>
                                     </button>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <div class="card-body">
                         <table class="table table-hover text-nowrap">
                             <thead>
                             <tr>
                                 <th class="fit_column">Nº</th>
                                 <th class="fit_column">Data da Obra</th>
                                 <th class="fit_column">Estado</th>
                                 <th class="fit_column">Cliente</th>
                                 <th class="fit_column">Total</th>
                                 <th class="fit_column">Ações</th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php foreach ($folhaobras as $folhaobra) { ?>
                                 <?php if($folhaobra->estado!='cancelada'){
                                     ?>
                                     <tr>
                                         <td><?=$folhaobra->id ?></td>
                                         <td><?=$folhaobra->data ?></td>
                                         <td><?=$folhaobra->estado ?></td>
                                         <td><?= $folhaobra->cliente->username ?></td>
                                         <td><?= $folhaobra->valortotal ?> €</td>
                                         <td>
                                             <a href="index.php?c=folhaobra&a=show&id=<?=$folhaobra->id ?>"
                                                class="btn btn-info" role="button">Mostrar</a>

                                             <?php if($folhaobra->estado =='em lancamento')
                                             { ?>

                                                 <a href="index.php?c=folhaobra&a=edit&id=<?=$folhaobra->id ?>"
                                                    class="btn btn-warning" role="button">Editar</a>

                                                 <a href="index.php?c=folhaobra&a=cancel&id=<?=$folhaobra->id ?>"
                                                    class="btn btn-danger" role="button">Cancelar</a>
                                             <?php } ?>
                                         </td>
                                     </tr>
                                 <?php } ?>
                             <?php }?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>
