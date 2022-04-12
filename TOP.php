<?php
require'koneksi.php';
$limit ="SELECT * FROM  tb_list_lop  LIMIT 10";
$top = query($limit);
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
    <div class="height-100 bg-light">
        <h3 class="text-top">TOP 10</h3><br>
            <div class="tabelTOP">
                <table class="tbl-top">
                    <tr>
                        <th>Nama Am</th>
                        <th>ID project</th>
                        <th>Nama cc</th>
                        <th>Nama project</th>
                        <th>Nilai project</th>
                    </tr>
                    <tr>
                        <?php foreach($top as $row):?>
                        <td><?= $row['NAMA_AM'];?></td>
                        <td><?= $row['ID_PROJECT'];?></td>
                        <td><?= $row['NAMA_CC'];?></td>
                        <td><?= $row['PROJECT'];?></td>
                        <td><?= rupiah($row['NILAI_PROJECT']);?></td>
                    </tr>
                  <?php endforeach;?> 
                </table>
            </div>
        </div>
        


        
    
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    <!--Container Main end-->

    <!-- Chart section -->
      <script src="asset/chart.min.js"></script>
      <!-- Dashboard -->
      <!-- line chart  -->
      <script>
        //setup
        const data = {
            labels:[<?php while($row = mysqli_fetch_array($data))
                {echo '"'.$row['produk'].'",';}?>],
          datasets: [
            {
              label: "Sales Data",
              data : [<?php while($row = mysqli_fetch_array($penjualan))
                {echo '"'.$row['sold'].'",';}?>],
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
            type: "pie",
            data,
        };
        //render init block
        const pieChart = new Chart(
            document.getElementById("pieChart"),
            config2
        );
      </script>
</body>
</html>