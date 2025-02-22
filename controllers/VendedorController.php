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
    public static function actualizar(Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['vendedor'];

            // Sincronizar el objeto en memoria con lo que el usuario escribió
            $vendedor->sinc($args);

            // Validación
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    /* ELIMINAR UN REGISTRO */
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Valida el ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                // Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
