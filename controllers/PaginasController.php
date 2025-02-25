<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('pages/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('pages/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('pages/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        // Buscar la propiedad por el ID
        $propiedad = Propiedad::find($id);

        $router->render('pages/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('pages/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('pages/entrada', []);
    }

    public static function contacto(Router $router)
    {
        /* MANDAR EMAIL */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear instancia de phpmailer
            $phpmailer = new PHPMailer();

            // Configurar SMTP
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'd53fb87dbd1d98';
            $phpmailer->Password = 'f528a3bc34ba62';
            $phpmailer->SMTPSecure = 'tls';

            // Configurar el contenido del email
            $phpmailer->setFrom('admin@bienesraices.com');
            $phpmailer->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $phpmailer->Subject = 'Tienes un nuevo mensaje';

            // Habiliar HTML
            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';

            // Definir contenido
            $contenido = '<html> <p>Tienes un nuevo mensaje</p> </html>';

            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Sin HTML';

            // Enviar el email
            if ($phpmailer->send()) {
                echo "Mensaje enviado correctamente.";
            } else {
                echo "Error al enviar el mensaje.";
            }
        }

        $router->render('pages/contacto', []);
    }
}
