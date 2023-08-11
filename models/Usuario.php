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

    // Validar el lgin de usuarios
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'Ingrese un email';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no valido';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'Ingrese una contraseña';
        }

        return self::$alertas;
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

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'Ingrese un email';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no valido';
        }

        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'Ingrese una contraseña';
        } elseif (strlen($this->password) < 8) {
            self::$alertas['error'][] = 'Ingrese una contraseña de almenos 8 caracteres';
        }

        return self::$alertas;
    }

    public function validar_perfil() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'Ingrese un nombre';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'Ingrese un email';
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