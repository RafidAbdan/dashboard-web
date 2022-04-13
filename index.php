<?php
require'koneksi.php';
require'./asset/status-data.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./asset/style.css">
    <!-- icon box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bx-store-alt nav_logo-icon' ></i>
                    <span class="nav_logo-name">CTS <br> Data LOP</span>
                </a>
                <div class="nav_list">
                    <a href="index.php" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Status</span>
                    </a>
                    <a href="TOP.php" class="nav_link">
                        <i class='bx bx-cabinet nav_icon'></i>
                        <span class="nav_name">TOP 10</span>
                    </a>
                    <a href="./import/import.php" class="nav_link">
                        <i class='bx bxs-file-import nav_icon'></i>
                        <span class="nav_name">Import</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- custom js style -->
    <script src="./asset/style.js"></script>

    <!--Container Main start-->
    <div class="height-100 ">
        <h4>Dashboard</h4><br>
        <div class="wrapper1">
            <div class="rap1">
                <div class="jumlah">
                    <div class="jumlah1">
                        <h2 class="jdl-jumlah1">
                            <h4 class="text">Jumlah Data LOP:</h4>
                            <?php foreach($total as $row):?>
                            <h5 class="text-in">
                                <?php $ttl= $row['COUNT(*)'];
                                echo $ttl?>
                                <?php endforeach;?>
                            </h5>
                        </h2>
                    </div>
                    <div class="jumlah2">
                        <h3 class="jdl-jumlah2">
                            <h4 class="text" >Jumlah Nilai LOP:</h4>
                                <?php foreach($jumlah as $row):?>
                                <h5 class="text-in">
                                <?php $jlh= $row['jumlahLOP'];
                                    echo rupiah($jlh)?>
                                </h5>
                                <?php endforeach;?>      
                        </h3>
                    </div>
                </div>
                <div class="bar">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="rap2">
                <div class="donat">
                    <canvas  id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="wrapper2">
            <div class="line">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="tabel">
                <table class="tabel-status">
                    <?php $i = 1?>
                      <tr>
                          <th>No</th>
                          <th>Status</th>
                          <th>Jumlah</th>
                      </tr>
                      <tr>
                        <?php foreach($prospect as $row):?>
                          <td>4</td>
                          <td>Prospect</td>
                          <td><?php $prpc =  $row['COUNT(*)']; echo $prpc;?></td>
                          <?php endforeach;?>
                      </tr>
                      <tr>
                            <?php foreach($proposal as $row):?>
                              <td>5</td>
                              <td>Proposal</td>
                              <td><?php $prps=  $row['COUNT(*)']; echo $prps;?></td>
                              <?php endforeach;?>
                      </tr>
                      <tr>
                        <?php foreach($bidding as $row):?>
                          <td>3</td>
                          <td>Bidding</td>
                          <td><?php $bdg =  $row['COUNT(*)']; echo $bdg;?></td>
                          <?php endforeach;?>
                      </tr>
                      <tr>
                        <?php foreach($bidding as $row):?>
                          <td>3</td>
                          <td>Win</td>
                          <td><?php $bdg =  $row['COUNT(*)'];?></td>
                          <?php endforeach;?>
                      </tr>
                      <tr>
                        <?php foreach($lose as $row):?>
                          <td>2</td>
                          <td>Lose</td>
                          <td><?php $ls=  $row['COUNT(*)']; echo $ls;?></td>
                          <?php endforeach;?>
                      </tr>
                      <tr>
                        <?php foreach($cancel as $row):?>
                          <td>1</td>
                          <td>Cancel</td>
                          <td><?php $cncl= $row['COUNT(*)'];echo $cncl;?></td>
                          <?php endforeach;?>
                      </tr>
                  </table>
            </div>
        </div>
        


        
    
        
    
    </div>
    <!--Container Main end-->
    <!-- Data Status -->
    <?php
        $data = array();
        array_push($data, $prpc, ",");
        array_push($data, $prps,",");
        array_push($data, $bdg,",");
        array_push($data,0,",");
        array_push($data, $ls,",");
        array_push($data, $cncl);
         foreach($data as $datas){ echo $datas;}
    ?>




    <!-- Chart section -->
      <script src="./asset/chart.min.js"></script>
      <!-- Dashboard -->
      <!-- line chart  -->
      <script>
        //setup
        const data = {
            labels:['PROSPECT','PROPOSAL','BIDDING','WIN','LOSE','CANCEL'],
          datasets: [
            {
              label: "Status chart",
              data : [<?php foreach($data as $datas){ echo $datas;}?>],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 4,
            },
          ],
        };
        //config
        const config = {
            type: "line",
            data,
            options: {
              scales: {
                y: {
               beginAtZero: true,
                },
              },
            },
        };
        //render init block
        const lineChart = new Chart(
            document.getElementById("lineChart"),
            config
        );

        //pie chart
        //config
        const config2 = {
            type: "doughnut",
            data,
        };
        //render init block
        const pieChart = new Chart(
            document.getElementById("pieChart"),
            config2
        );
                //bar chart
        //config
        const config3 = {
            type: "bar",
            data,
        };
        //render init block
        const barChart = new Chart(
            document.getElementById("barChart"),
            config3
        );
      </script>
</body>
</html>