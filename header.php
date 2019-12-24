     <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <nav class="user-menu">
                        <ul>
                            <?php if($_SESSION[user_id]){?>
                            <li><a href="mis-datos.php?id=<?php echo $_SESSION[user_id]?>"><i class="fa r" aria-hidden="true"></i> Mis datos</a></li>
                            <li><a href="carrito.php"><i class="fa "></i> Mi Computadora</a></li>
                            <li><a href="logout.php"><i class="fa " aria-hidden="true"></i> Salir</a></li>
                            <?php }else{?>
                            <li><a href="login.php"><i class="fa "></i>Iniciar Sesión</a></li>
                            <li><a href="registro.php"><i class="fa "></i> Registrarse</a></li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="admin/index.php" target="_blank"><i class="fa " aria-hidden="true"></i> Administrador</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <center>
                            <h1><a href="index.php"><img class="img-responsive"></a></h1>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->