<?php

namespace Model;

class Admin extends ActiveRecord
{
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    // Para validar al usuario
    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = 'El correo es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'La contraseña es obligatorioa';
        }

        return self::$errores;
    }

    // Validar que el usuario exista
    public function existeUsuario()
    {
        // Revisar si el usuario existe
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = "El usuario " . $this->email . " no existe";
            return;
        }

        return $resultado;
    }

    // Validar el password
    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores[] = "Contraseña incorrecta";
        }

        return $autenticado;
    }

    // Autenticar al usuario
    public function autenticar()
    {
        session_start();

        // Llenar el arreglo de sesión
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
