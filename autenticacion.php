<?php
    session_start(); // Pendiente de hacer segura

    if (isset($_POST['nombre'])){
        $host = 'localhost';
        $usuario = 'root'; // inseguro
        $password = '';
        $baseDatos = 'login-php';

        // Establecimiento de conexión
        $mysqli = new mysqli($host,$usuario,$password,$baseDatos);

        if ($mysqli->connect_error){
            $_SESSION['error'] = "No se puede comprobar usuario en este momento";
            header('Location:./formulario.php');
        }

        $usuario = $_POST['nombre'];
        $contrasena = $_POST['password'];

        $querySQL ="SELECT * FROM usuarios WHERE idusuario = '$usuario'" ;
        $resultado = $mysqli->query($querySQL);

        if ($resultado->num_rows == 0){
            $_SESSION['error'] = "Usuario no encontrado";
            header('Location:./formulario.php');
        } else {
            echo 'usuario correcto';
        }

        echo $usuario.' y '.$contrasena;

    } else {
        $_SESSION['error'] = "Debes hacer login para poder acceder";
        header('Location:./formulario.php');
    }