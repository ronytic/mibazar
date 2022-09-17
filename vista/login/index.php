<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="bg-light">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card" style="margin-top: 200px;">
                    <div class="card-header">Ingresar al Sistema</div>
                    <div class="card-body">
                        <form action="./?c=login&m=verificar" method="POST">
                            <?php
                            if (isset($_GET['error'])) {
                            ?>
                                <div class="alert alert-danger">Usuario y/o contraseña Incorrecta</div>
                            <?php
                            }
                            ?>

                            Usuario
                            <input type="text" name="usu" id="usu" class="form-control" autofocus>
                            Contraseña
                            <input type="password" name="pass" id="pass" class="form-control">
                            <br>
                            <div class="text-center">
                                <input type="submit" value="Ingresar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>