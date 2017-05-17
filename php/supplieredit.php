<html>
    <head>
        <title>Web Pembelian > User List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Web<strong>Pembelian</strong></a>
                </div>
                <?php
                    session_start();

                    if (isset($_SESSION['user'])) {
                        $userid = $_SESSION['user'];
                    } else {
                        header('Location: index.php');
                    }
                    
                ?>
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./userlist.php">User</a></li>
                                <li><a href="./supplierlist.php">Supplier</a></li>
                                <li><a href="./baranglist.php">Barang</a></li>
                            </ul>
                        </li>
                        <li><a href="./pembelianform.php">Pembelian</a></li>
                        <li><a href="./laporanlist.php">Laporan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selamat Datang, <?php echo $userid;?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <?php
            include_once('./CSupplier.php');
            
            $cm = new CSupplier();
            $cm->setSupplier_id($_GET['id']);
            $supplier = $cm->getSearch();
            if($data = mysql_fetch_array($supplier)){
                echo $data['supplier_id'];
        ?>
        
        <div class="container" style="padding-top: 75px;">
            <div class="row">
                <h3 style="padding-left: 20px;">Form Barang</h3>
            </div>
            <hr/>
            <form class="form-horizontal" action="SupplierUpdate.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="kode">Kode Supplier:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="Kode Supplier..." value="<?php echo $data['supplier_id'];?>" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nama">Nama Supplier:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Supplier..." value="<?php echo $data['nama'];?>"/>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="alamat">Alamat Supplier:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Supplier..." value="<?php echo $data['alamat'];?>"/>
                </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>