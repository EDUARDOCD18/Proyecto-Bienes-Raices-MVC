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
