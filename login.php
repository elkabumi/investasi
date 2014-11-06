<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="form-box" id="login-box">
            <div class="header"><img src="img/jatim.png" style="width:60px; margin-bottom:10px;"><div class="bg-logo"><span style="font-size: 1.3em !important;"><strong>Badan Penanaman Modal Jatim</strong></span><br>Bidang Data & Sistem Informasi</div></div>
            <form action="controllers/login.php?page=login" method="post">
                <div class="body bg-white">

                    <?php
                   if(isset($_GET['err']) && $_GET['err'] == 1){
                    ?>
                    <br>
                     <div class="alert alert-warning alert-dismissable">
                    <i class="fa fa-warning"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                    <b>Login Gagal !</b><br>
                   User login atau password salah
                    </div>
                    <?php
                    }else if(isset($_GET['err']) && $_GET['err'] == 2){
                    ?>
                    <br>
                     <div class="alert alert-warning alert-dismissable">
                    <i class="fa fa-warning"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                    <b>Login Gagal !</b><br>
                   User telah di nonaktifkan
                    </div>
                    <?php
                    }
                    ?>



                    <div class="form-group">
                        <input style="border:1px solid #eee;" required type="text" name="i_login" class="form-control" placeholder="User Login"/>
                    </div>
                    <div class="form-group">
                        <input style="border:1px solid #eee;" required type="password" name="i_password" class="form-control" placeholder="Password"/>
                    </div>          
                  
                </div>
                <div class="footer" >                                                               
                    <button type="submit" class="btn btn-cokelat btn-block" style="margin-top:10px;">LOGIN</button>  
                    
                 
                </div>
            </form>

<div></div>

           
        </div>

<span></span>


      

    </body>
</html>