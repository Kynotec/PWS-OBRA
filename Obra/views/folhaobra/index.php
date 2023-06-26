 <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./index.php?c=bo&a=index">Obra</a></li>
                            <li class="breadcrumb-item active">Obras</></li>
                        </ol>
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
                                     <option value="id">Nº Obra</option>
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

                                     <tr>
                                         <td><?=$folhaobra->id ?></td>
                                         <td><?=$folhaobra->data ?></td>
                                         <td>
                                         <?php if($folhaobra->estado =='Emitida')
                                         {
                                             echo '<span class="badge bg-success">'.$folhaobra->estado.'</span>';
                                         }
                                         elseif ($folhaobra->estado =='Em Lançamento')
                                         {
                                             echo '<span class="badge bg-warning">'.$folhaobra->estado.'</span>';
                                         }
                                         ?>
                                         </td>
                                         <td><?= $folhaobra->cliente->username ?></td>
                                         <td><?= $folhaobra->valortotal ?> €</td>
                                         <td>
                                             <a class="btn btn-info btn-sm" href="index.php?c=folhaobra&a=show&idFolhaObra=<?= $folhaobra->id?>"><i class="fas fa-eye"></i> Mostrar </a>

                                             <?php if($folhaobra->estado =='Em Lançamento')
                                             { ?>


                                                 <a class="btn btn-warning btn-sm" href="index.php?c=linhaobra&a=index&idFolhaObra=<?= $folhaobra->id?>"><i class="fas fa-pencil-alt"></i> Editar </a>

                                                 <a href="index.php?c=folhaobra&a=delete&idFolhaObra=<?= $folhaobra->id?>"
                                                    class="btn btn-danger btn-sm" role="button">Cancelar</a>
                                             <?php } ?>
                                         </td>
                                     </tr>

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
