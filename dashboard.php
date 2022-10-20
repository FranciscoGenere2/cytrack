<?php //error_reporting(1); 
?>
<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>




<?php




$date = date('Y-m-d');


//$connect->close();

?>

<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-wrapper">

    <!--     <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <div class="float-right"><h3 style="color:black;"><p style="color:black;"><?php echo date('l') . ' ' . date('d') . '- ' . date('m') . '- ' . date('Y'); ?></p></h3>
                    </div>
                    </div>
                
            </div> -->


    <div class="container-fluid ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Tabla de datos</strong>

                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>ULTIMO PERIODO <?php echo $idUser;?></th>
                                    <th>DURACION PROMEDIO PERIODO	</th>
                                    <th>DURACION PROMEDIO CICLO	</th>
                                    <th>ACCION</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //include('./constant/connect');
                               $variable = $_GET['id'];
                                $sql = "SELECT * FROM users WHERE id = $variable";
                                $result1 = $connect->query($sql);
                                foreach ($result1 as $row1) {
                                    $usuario = $result1['user_id'];
                                
                            }
                                ?>
                                <?php
                                //echo $sql;exit;
                                $sql = "SELECT * FROM menstrual WHERE id = $variable";
                                $result = $connect->query($sql);
                                //print_r($result);exit;
                                foreach ($result as $row) {

                                   
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['ultimop']; ?></td>
                                        <td><?php echo $row['duracionp']; ?></td>
                                        <td><?php echo $row['duracionciclo']; ?></td>
<td>                              <a href="edituser.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a></td>

                                       

                                    </tr>

                            </tbody>
                        <?php
                                }

                        ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 dashboard">
                <div class="card" style="background: #eb8038 ">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-support"></i></span>
                        </div>
                        <div class="media-body media-text-right">

                        <a href="product.php">
                                <p class="m-b-0">Tu fase premenstrual es</p>
                            </a>
                            <h3 class="color-white"><?php 
                            $fechacompleta =  htmlentities($row['ultimop']);
                            $fechacompleta2 = strtotime($fechacompleta);
                            $fechadia =  idate('d', $fechacompleta2);
                            $premenstrualini = $fechadia-2;
                            $premenstrualfin = $fechadia-1;
                        
                            if ($premenstrualini<1){
                                $premenstrualini = 30-1;
                                if ($premenstrualfin<1){
                                  $premenstrualfin = $premenstrualfin + $premenstrualini+1;
                                  echo 'Desde el dia', ' ', $premenstrualini, ' ', 'hasta el dia', ' ', $premenstrualfin;
                                }
                                
                              }
                              else {
                                echo 'Desde el dia', ' ', $premenstrualini, ' ', 'hasta el dia', ' ', $premenstrualfin;
                              }
                            
                            
                            ?></h3>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 'Vendedor') /*AQUI ERA ==1 y en los otros iguales abajo*/  { ?> 
                <div class="col-md-6 dashboard">
                    <div class="card" style="    background-color: #f05746 ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-agenda"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <a href="product.php">
                                    <p class="m-b-0">Fase menstrual</p>
                                </a>
                                <h3 class="color-white"><?php 
                                $fechacompleta =  htmlentities($row['ultimop']);
                                $fechacompleta2 = strtotime($fechacompleta);
                                $fechadia =  idate('d', $fechacompleta2);
                                $diaspromedio =  htmlentities($row['duracionp']);
                                echo 'Desde el dia', ' ', $fechadia, ' ', 'hasta el dia', ' ', ($fechadia+$diaspromedio)-1;
                                ?>
                             </h3>
                               <!--<a href="Order.php">-->
                               
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 'Vendedor') { ?>
                <div class="col-md-6 dashboard">
                    <div class="card " style="    background-color: #3ec294 ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-notepad"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <a href="Order.php">
                                    <p class="m-b-0">Fase post-menstrual</p>
                                </a>
                                <h3 class="color-white"><?php
                                $fechacompleta =  htmlentities($row['ultimop']);
                                $fechacompleta2 = strtotime($fechacompleta);
                                $fechadia =  idate('d', $fechacompleta2);
                                $diaspromedio =  htmlentities($row['duracionp']);
                                $iniovu = htmlentities($row['duracionciclo']/$diaspromedio-1);
                                echo 'Desde el dia', ' ', ($fechadia+$diaspromedio)-1+1, ' ', 'hasta el dia', ' ', ceil($iniovu+(($fechadia+$diaspromedio)-1+2));
                            
                                ?></h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 'Vendedor') { ?>
                <div class="col-md-6 dashboard">
                    <div class="card" style="background:#65c8db ">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-rss"></i></span>
                            </div>
                            <div class="media-body media-text-right">


                            <a href="brand.php">
                                    <p class="m-b-0">Fase de Ovulación</p>
                                </a>

                                <h3 class="color-white"><?php
                                $fechacompleta =  htmlentities($row['ultimop']);
                                $fechacompleta2 = strtotime($fechacompleta);
                                $fechadia =  idate('d', $fechacompleta2);
                                $diaspromedio =  htmlentities($row['duracionp']);
                                if (ceil($iniovu+(($fechadia+$diaspromedio))+1+5) > 30){
                                  
                                  echo 'Desde el dia', ' ', ceil($iniovu+(($fechadia+$diaspromedio))+1), ' ', 'hasta el dia', ' ', ((ceil($iniovu+(($fechadia+$diaspromedio))+1+3))-30);
                                
                                }
                                else{
                                  echo 'Desde el dia', ' ', ceil($iniovu+(($fechadia+$diaspromedio)-1+1)+2), ' ', 'hasta el dia', ' ', ceil($iniovu+(($fechadia+$diaspromedio))+1+5);
                                
                                }
                                
                                ?></h3>

                                <!--<a href="product.php">-->
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>




        </div>


        <?php
        //error_reporting(0);
        //require_once('../constant/connect.php');
        $qqq = "SELECT * FROM product WHERE  status ='1' ";
        $result = $connect->query($qqq);
        //print_r($result);exit;
        foreach ($result as $row) {

            //print_r($row);
            $a .= $row["product_name"] . ',';
            $b .= $row["quantity"] . ',';
        }
        $am = explode(",", $a, -1);
        $amm = explode(",", $b, -1);
        //print_r($a);
        //print_r($b);

        $cnt = count($am);

        $datavalue1 = '';
        for ($i = 0; $i < $cnt; $i++) {
            $datavalue1 .= "['" . $am[$i] . "'," . $amm[$i] . "],";
        }
        //echo 

        $datavalue1; //used this $data variable in js
        ?>



    </div>
</div>
</div>


<?php include('./constant/layout/footer.php'); ?>
<script>
    $(function() {
        $(".preloader").fadeOut();
    })
</script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'], <?php echo $datavalue1; ?>
        ]);

        var options = {
            title: 'World Wide Wine Production',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

        var chart = new google.visualization.BarChart(document.getElementById('myChart1'));
        chart.draw(data, options);
    }
</script>


</div>