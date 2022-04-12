<?php
require'../koneksi.php';
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
    <link rel="stylesheet" href="../asset/style.css">
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
                    <a href="../index.php" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Status</span> 
                    </a> 
                    <a href="../TOP.php" class="nav_link"> 
                        <i class='bx bx-cabinet nav_icon'></i>
                        <span class="nav_name">TOP 10</span> 
                    </a>  
                    <a href="import.php" class="nav_link">
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
    <script src="../asset/style.js"></script>

    <!--Container Main start-->
    <div class="height-100 ">
        <h4>Import File</h4><br>
        <center>
            <?php include('aksi.php');?>
            <div style="margin:auto; width:600px; padding:20px" >
            <!-- <?php #include('aksi.php')?> -->
                <form action="" method="POST" enctype="multipart/form-data" class="row g-2">
                    <div class="col-auto">
                        <input class="form-control" type="file" name="filexls" id="formFile">
                    </div>
                    <div class="col-auto">
                        <input type="submit" name="submit" class="btn btn-primary" value="Upload File XLS/XLSX">
                    </div>
                </form>
            </div>
        </center>
    </div>
        


        
    
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    <!--Container Main end-->

    
</body>
</html>