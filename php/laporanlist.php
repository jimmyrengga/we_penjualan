<html>
    <head>
        <title>Web Pembelian > Barang List</title>
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
                                <li><a href="./supplierlist.php">Supplier</a></li>
                                <li><a href="./baranglist.php">Barang</a></li>
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
                </div>
            </div>
        </nav>

        <div class="container" style="padding-top: 75px;">
            <div class="row">
                <h3 style="padding-left: 20px;">Laporan Pembelian</h3>
            </div>
            <hr/>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No. Pembelian</th>
                        <th>Tgl Pembelian</th>                        
                        <th>Supplier</th>                        
                        <th>Jumlah Harga</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ('./CPembelian.php');

                    $c = new CPembelian();
                    $query = $c->getData();

                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?= $row['no_pembelian'] ?></td>
                            <td><?= $row['tgl_pembelian'] ?></td>
                            <td><?= $row['supplier_id'] ?></td>
                            <td><?= $row['jumlah_harga'] ?></td>
                            <td><a href="">Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
