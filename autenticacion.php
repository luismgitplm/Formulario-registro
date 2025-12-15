<?php
    include 'establecer-sesion.php';
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        if (isset($_POST['nombre'])){
            $host = 'localhost';
            $usuario = 'php-login'; 
            $password = '1234#hola';
            $baseDatos = 'login-php';

            // Establecimiento de conexión
            $mysqli = new mysqli($host,$usuario,$password,$baseDatos);

            if ($mysqli->connect_error){
                $_SESSION['error'] = "No se puede comprobar usuario en este momento";
                header('Location:./formulario.php');
            }

            $usuario = htmlspecialchars($_POST['nombre']);
            $contrasena = htmlspecialchars($_POST['password']);

            $querySQL = "SELECT * FROM usuarios WHERE idusuario = '".$usuario."'";
            $resultado = $mysqli->query($querySQL);

            // PDOStatement::rowCount() Sustitución de la condición manejando PDO
            if ($resultado->num_rows == 0){
                // Código provisional a la espera de mejorar el reseteo de cookie ante error
                $_SESSION['error'] = "Usuario no encontrado";
                header("Location:./formulario.php");
            } else {
                $row = mysqli_fetch_object($resultado);

                if ($row->password == $contrasena){
                    // Pasando los datos de la tabla como variable de sesión
                    $_SESSION['nombre'] = $row->nombre;
                    $_SESSION['apellidos'] = $row->apellidos;
                    header("Location:./inicio.php"); // Siguiente paso
                } else {
                    // Código provisional a la espera de mejorar el reseteo de cookie ante error
                    $_SESSION['error'] = "contraseña incorrecta";
                    header("Location:./formulario.php");
                }

                $mysqli->close();
            }

        } else {
            $_SESSION['error'] = "Debes hacer login para poder acceder";
            header('Location:./formulario.php');
        }
    } else {
        // Procesar el intento de acceso no autorizado
    }