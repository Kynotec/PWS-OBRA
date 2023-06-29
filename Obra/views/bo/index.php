    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                    <h3><?php $con = mysqli_connect("localhost","root","root","bdobra");

                        $sql = "SELECT * from folha_obras";

                        if ($result = mysqli_query($con, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );

                            // Display result
                            //printf("Users : %d\n", $rowcount);
                        }

                        // Close the connection
                        mysqli_close($con);

                        echo "$rowcount";       ?></h3>
                    <p>Número de Folhas de Obras</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="index.php?c=folhaobra&a=index" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php $con = mysqli_connect("localhost","root","root","bdobra");

                    $sql = "SELECT * from servicos";

                    if ($result = mysqli_query($con, $sql)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows( $result );

                        // Display result
                        //printf("Users : %d\n", $rowcount);
                    }

                    // Close the connection
                    mysqli_close($con);

                    echo "$rowcount";       ?></h3>
                <p>Número de Serviços</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?c=servico&a=index" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php $con = mysqli_connect("localhost","root","root","bdobra");

                                $sql = "SELECT * from ivas";

                                if ($result = mysqli_query($con, $sql)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows( $result );

                                    // Display result
                                    //printf("Users : %d\n", $rowcount);
                                }

                                // Close the connection
                                mysqli_close($con);

                                echo "$rowcount";       ?></h3>
                            <p>Número de Taxas de IVA</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?c=iva&a=index" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
    </section>