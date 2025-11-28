<?php
    session_start(); // Pendiente de hacer segura
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Formulario de registro</title>
</head>
<body class="bg-primary-subtle">
    <div id="wrapper" class="container d-flex justify-content-center align-items-center text-center  min-vh-100">
    <form action="autenticacion.php" method="post">
        <div>
            <h3>Inicie Sesión</h3>
        </div>

        <!-- Aquí se mostrarán los errores desde dentro de la aplicación-->
         <?php
            if (isset($_SESSION['error'])){
                echo '<div class = "alert alert-danger">';
                echo $_SESSION['error'];
                echo '</div>';
                unset($_SESSION['error']);
            }
         ?>

        <div class="row mb-4">
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="nombre" name="nombre" class="form-control" />
                <label class="form-label" for="nombre">Nombre</label>
            </div>
            </div>
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="apellidos" name="apellidos" class="form-control" />
                <label class="form-label" for="apellidos">Apellidos</label>
            </div>
            </div>
        </div>

        
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" for="email">Email</label>
        </div>

        
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" />
            <label class="form-label" for="password">Contraseña</label>
        </div>

       
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>

    </form>
    </div>

    <script src="validaciones.js"></script>
</body>
</html>