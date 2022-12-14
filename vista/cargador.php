<!DOCTYPE html>
<html>

<head>
    <title>Mi Bazar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="index.html">MI BAZAR</a></h1>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="navbar navbar-inverse" role="banner">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['nombres'] ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu animated fadeInUp">
                                        <li><a href="./?c=login&m=cerrar">Salir de Sistema</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <!--Inicio de Menu-->
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li class="current"><a href="./?c=principal&m=inicio"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Producto
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="./?c=producto&m=nuevo">Nuevo Producto</a></li>
                                <li><a href="./?c=producto&m=listar">Listar Productos</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Compra
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="./?c=compra&m=nuevo">Nueva Compra</a></li>
                                <li><a href="./?c=compra&m=listar">Listar Compras</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Ventas
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="./?c=venta&m=nuevo">Nueva Venta</a></li>
                                <li><a href="./?c=venta&m=listar">Listar Ventas</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Reporte
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="./?c=reportes&m=contenedorventas">Reporte de Ventas</a></li>
                                <li><a href="./?c=reportegrafica&m=ventas">Gr??fica Estad??stica de Ventas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Fin de Menu-->
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title"><?php echo $titulo ?></div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <!--Inicio del Contenido-->

                            <?php
                            require_once $vista;
                            ?>
                        </div>
                        <!--Fin de Contenido-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">

            <div class="copy text-center">
                Dise??ado por <a href="#">Ronald Nina</a>
            </div>

        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <?php
    if (isset($js)) {
        foreach ($js as $j) {
            echo '<script src="' . $j . '"></script>';
        }
    }
    ?>


</body>

</html>