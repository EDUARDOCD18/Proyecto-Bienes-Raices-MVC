<?php


namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas()
    {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metedo = $_SERVER['REQUEST_METHOD'];

        if ($metedo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }


        if ($fn) {
            // Si la URL existe
            call_user_func($fn, $this);
        } else {
            echo "Página no encontrada";
        }
    }

    // Mostrar una vista

    public function render($view)
    {
        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layaout.php";
    }
}
