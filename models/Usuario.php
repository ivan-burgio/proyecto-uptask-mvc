<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];
    
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    // Validación para cuentas nuevas
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'Ingrese un nombre';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'Ingrese un email';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'Ingrese una contraseña';
        } elseif (strlen($this->password) < 8) {
            self::$alertas['error'][] = 'Ingrese una contraseña de almenos 8 caracteres';
        } elseif(!$this->password2) {
            self::$alertas['error'][] = 'Repita su contraseña';
        } elseif($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }

        return self::$alertas;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }
}