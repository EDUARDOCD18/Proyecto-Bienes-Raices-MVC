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
}
