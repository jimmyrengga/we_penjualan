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
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./userlist.php">User</a></li>
                                <li><a href="./supplierlist">Supplier</a></li>
                                <li><a href="#">Barang</a></li>
                            </ul>
                        </li>
                        <li><a href="./pembelianform.php">Pembelian</a></li>
                        <li><a href="#contact">Laporan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selamat Datang, Ari <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" style="padding-top: 75px;">
            <div class="row">
                <h3 style="padding-left: 20px;">Form Supplier</h3>
            </div>
            <hr/>
            <form class="form-horizontal" action="Supplier.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="supplier_id">Supplier ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="Supplier ID ..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nama">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama ..." />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="alamat">Alamat:</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" />
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="Cancel" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
