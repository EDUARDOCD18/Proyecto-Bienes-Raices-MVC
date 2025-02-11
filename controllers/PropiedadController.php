<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
//Importar Intervention Image
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
    /* INDEX */
    public static function index(Router $router)
    {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        // Muestra mensaje condicional 
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    /* CREAR UN REGISTRO */
    public static function crear(Router $router)
    {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con los mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Instancia el objeto
            $propiedad = new Propiedad($_POST['propiedad']);

            // Generar un nombre único para cada imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setea la imagen
            // Realizar un resize con Intervention Image
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagenSubir = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            // Validar
            $errores = $propiedad->validar();

            // Revisar que el arrglo de errores esté vacío
            if (empty($errores)) {

                // Crear carpeta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen
                $imagenSubir->save(CARPETA_IMAGENES . $nombreImagen);

                $resultado = $propiedad->guardar(); // Llamar función para guardar en la BD

            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    /* ACTUALIZAR UN REGISTRO */
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        // Métido POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sinc($args);

            // Validación
            $errores = $propiedad->validar();

            // Generar un nombre único para cada imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subida de archivos
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagenSubir = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            // Revisar que el arrglo de errores esté vacío
            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Guardar la imagen
                    $imagenSubir->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    /* ELIMINAR UN REGISTRO */
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar ID
            $id = $_POST['id']; // Obtener el id y guardarlo
            $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que el id es entero

            // En caso de que el id exista
            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
