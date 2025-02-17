<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado(): bool
{
    session_start();
    $auth = $_SESSION['login'];

    if ($auth) {
        return true;
    }
    return false;
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapar el HTML
function s($html): String
{
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificaciones($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = '¡Registro exitoso!';
            break;
        case 2:
            $mensaje = '¡Actualización exitosa!';
            break;
        case 3:
            $mensaje = '¡Eliminación exitosa!';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url)
{
    /* -- Validar que el id sea correcto -- */
    $id = $_GET['id']; // Se optiene el id
    $id = filter_var($id, FILTER_VALIDATE_INT); // Se valida que sea entero

    // En caso de que el id no sea entero o no se encuentre
    if (!$id) {
        header("Location: $url"); // Redirecciona al usuario
    }

    return $id;
}
