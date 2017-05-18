<html>
    <head>
        <title>Web Pembelian > Trx Pembelian</title>
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
                                <li><a href="./logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" style="padding-top: 75px;">
            <?php
                session_start();
            
                if(isset($_SESSION['rc'])) {
                    if($_SESSION['rc'] == "sukses") {
                        echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil tersimpan.</div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data gagal tersimpan.</div>';
                    }
                    
                    unset($_SESSION['rc']);
                }
            ?>
            
            <div class="row">
                <h3 style="padding-left: 20px;">Form Pembelian</h3>
            </div>
            <hr/>
            <form class="form-horizontal" action="Pembelian.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nopembelian">No Pembelian:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nopembelian" name="head[nopembelian]" placeholder="No Pembelian..." readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tglpembelian">Tgl Pembelian:</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tglpembelian" name="head[tglpembelian]"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="supplier">Supplier:</label>
                    <div class="col-sm-4 col-xs-12">
                        <select name="head[supplier]" id="supplier" class="form-control">
                            <?php
                                include ('./CSupplier.php');

                                $c = new CSupplier();
                                $query = $c->getData();

                                while ($row = mysql_fetch_array($query)) {
                                    echo '<option value='.$row['supplier_id'].'>'.$row['nama'].'</option>';
                                }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <button class="btn btn-success" id="tambahDetail" type="submit" name="tombol">Simpan</button>
                    </div>
                    <div class="col-sm-6">
                        <input type="button" class="btn btn-default pull-right" id="tambahDetail" onClick="insertRow()" value="Tambah"/>
                    </div>
                </div>

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
                        <tr>
                            <td>
                                <select name="detail[kdbarang][]" id="kdbarang" class="form-control">
                                    <?php
                                    include ('./CBarang.php');

                                    mysql_free_result($query);
                                    $cb = new CBarang();
                                    $query = $cb->getData();
                                    mysql_data_seek($query, 0);
                                    
                                    while ($row = mysql_fetch_array($query)) {
                                        echo '<option value='.$row['kode'].'>'.$row['kode'].'-'.$row['nama'].'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" id="qty" name="detail[qty][]"/></td>
                            <td><input type="number" class="form-control" id="hrgsatuan" name="detail[hrgsatuan][]" onChange="hitungharga(this)"/></td>
                            <td><input type="number" class="form-control" id="total" name="detail[total][]" readonly="readonly"/></td>
                            <td><input type="button" class="btn btn-default pull-right" id="delRow" value="Delete" onClick="deleteRow(this)"/></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
                                $(document).ready(function () {
                                    var d = new Date();
                                    var n = d.valueOf();

                                    document.getElementById("nopembelian").value = n;
                                });

                                function deleteRow(row)
                                {
                                    var i = row.parentNode.parentNode.rowIndex;
                                    document.getElementById('tblDetail').deleteRow(i);
                                }

                                function insertRow() {
                                    var x = document.getElementById('tblDetail');
                                    var new_row = x.rows[1].cloneNode(true);
                                    var len = x.rows.length;

                                    var inp1 = new_row.cells[0].getElementsByTagName('select')[0];
                                    inp1.id += len;
                                    inp1.value = '';
                                    var inp3 = new_row.cells[1].getElementsByTagName('input')[0];
                                    inp3.id += len;
                                    inp3.value = '';
                                    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
                                    inp2.id += len;
                                    inp2.value = '';
                                    var inp4 = new_row.cells[3].getElementsByTagName('input')[0];
                                    inp4.id += len;
                                    inp4.value = '';

                                    var y = x.getElementsByTagName("tbody")[0];

                                    y.appendChild(new_row);
                                }
                                
                                function hitungharga(row) {
                                    var i = row.parentNode.parentNode.rowIndex;
                                    var rw = document.getElementById('tblDetail').rows[i];
                                    var qty = rw.cells[1].children[0].value;
                                    var satuan = rw.cells[2].children[0].value;
                                    var total = qty * satuan;
                                    
                                    rw.cells[3].children[0].value = total;
                                }
    </script>
</html>
