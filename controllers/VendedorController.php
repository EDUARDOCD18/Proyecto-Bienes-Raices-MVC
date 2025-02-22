<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    /* CREAR UN REGISTRO */
    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Instancia el objeto
            $propiedad = new Vendedor($_POST['vendedor']);

            // Validar
            $errores = $propiedad->validar();

            // Revisar que el arrglo de errores esté vacío
            if (empty($errores)) {
                $resultado = $propiedad->guardar(); // Llamar función para guardar en la BD
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    /* ACTUALIZAR UN REGISTRO */
    public static function actualizar()
    {
        echo "ACT";
    }
    /* ELIMINAR UN REGISTRO */
    public static function eliminar()
    {
        echo "BORRAR";
    }
}
