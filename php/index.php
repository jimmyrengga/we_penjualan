<html>
    <head>
        <title>Web Pembelian</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            session_start();

            if (isset($_SESSION['rc'])) {
                if ($_SESSION['rc'] == "gagal") {
                    echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username / Password salah.</div>';
                } else {
                    echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil logout.</div>';
                }
                unset($_SESSION['rc']);
            }
            ?>
            <form class="form-signin" action="ceklogin.php" method="post">
                <h3 class="form-signin-heading">Aplikasi<b>Pembelian</b></h3>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" required autofocus/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">    
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login"/>
                    </div><!-- /.col -->
                </div>
            </form>

        </div> <!-- /container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
