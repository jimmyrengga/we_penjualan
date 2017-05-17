<html>
    <head>
        <title>Web Pembelian > Trx Pembelian</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                #section-to-print, #section-to-print * {
                    visibility: visible;
                }
                #section-to-print {
                    position: absolute;
                    left: 0;
                    top: 0;
                    padding:0;
                    width: 100%;
                }
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
        </style>
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
                        <li class="active"><a href="#contact">Pembelian</a></li>
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

        <div class="container" style="padding-top: 75px;" id="section-to-print">
            <?php
            session_start();

            if (isset($_SESSION['user'])) {
                $userid = $_SESSION['user'];
            } else {
                header('Location: index.php');
            }

            include_once('./CPembelian.php');

            $cp = new CPembelian();
            $cp->setNopembelian($_GET['nopembelian']);
            $pemb = $cp->getSearch();
            if ($data = mysql_fetch_array($pemb)) {
                ?>

                <div class="row">
                    <div class="col-xs-9">
                        <h3 style="padding-left: 20px;">Laporan Pembelian</h3>
                    </div>
                    <div class="col-xs-3 pull-right no-print" style="padding-top: 20px;">
                        <button type="button" class="btn btn-default btn-sm pull-right" onclick="printMe()">
                            <span class="glyphicon glyphicon-print"></span> Print
                        </button>
                    </div>
                </div>
                <hr/>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nopembelian">No Pembelian:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nopembelian" name="head[nopembelian]" placeholder="No Pembelian..." value="<?php echo $data['no_pembelian']; ?>" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tglpembelian">Tgl Pembelian:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tglpembelian" name="head[tglpembelian]" value="<?php echo $data['tgl_pembelian']; ?>" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="supplier">Supplier Id:</label>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" class="form-control" id="supplierid" name="head[supplierid]" value="<?php echo $data['supplier_id']; ?>" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="supplier">Jumlah Total:</label>
                        <div class="col-sm-4 col-xs-12">
                            <input type="text" class="form-control" id="jumlahharga" name="head[jumlahharga]" value="<?php echo $data['jumlah_harga']; ?>" readonly="readonly"/>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <table id="tblDetail" class="table table-hover" style="padding: 0px;margin:0px;">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ('./CPembelianDetail.php');

                        $c = new CPembelianDetail();
                        $c->setNopembelian($_GET['nopembelian']);
                        $query = $c->getSearch();

                        while ($row = mysql_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td><?= $row['harga_satuan'] ?></td>
                                <td><?= $row['total_harga'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>

        <script>
            function printMe() {
                window.print();
            }
        </script>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>
