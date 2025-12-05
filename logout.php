<?php
    include 'establecer-sesion.php';
    // restablece los datos de la sesión para el resto del tiempo de ejecución
    $_SESSION = [];
    // envía como Set-Cookie para invalidar la cookie de sesión
    if (isset($_COOKIE[session_name()])) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
    }
    session_destroy();
    header("Location:./formulario.php");











    /** Tareas
     * 1. Generación de token crsf y comprobación antes de dejar pasar (autenticación antes de mandar a inicio) Pasarlo de manera oculta
     * Hay que comparar ese token en lugar de preguntar por el nombre. (Hecho)
     * 2. Eliminar explícitamente la cookie de sesión (Hecho)
     * 3. Buscar donde se modifican los parámetros de configuración de php.ini
     */