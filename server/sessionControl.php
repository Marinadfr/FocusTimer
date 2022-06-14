<?php

/*
    sessionControl se encargará de manejar las sesiones guardadas al iniciar sesión (file login.php)
    abstrayendo así la lógica de utilizar $_SESSION e iniciar la session cada verz que necesitemos
    de estas variables globales.

    !Aclaracion:
    para que este file funcione donde se apliquen sus metodos antes
    debe existir un session_start main en la raíz
*/

function getSessionId()
{
    return $_SESSION['id'];
}

function getSessionUsername()
{
    return $_SESSION['username'];
}

function isAdmin()
{
    if (isset($_SESSION['role'])) {
        return false;
    }

    if ($_SESSION['role'] !== 1) {
        return false;
    }

    return true;
}
