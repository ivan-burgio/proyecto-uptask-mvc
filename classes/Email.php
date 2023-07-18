<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;


    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear el objeto de email
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = 'b345255ffd7776';
        $email->Password = '3382bdd9697836';

        $email->setFrom('cuentas@uptask.com');
        $email->addAddress('cuentas@uptask.com', 'Uptask.com');
        $email->Subject = 'Confirma tu cuenta';

        // Set HTML
        $email->isHTML(TRUE);
        $email->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>!, ";
        $contenido .= "Has creado tu cuenta en Uptask, entra en el siguiente link para confirmarla.</p>";
        $contenido .= "<p>Presiona aquí: ";
        $contenido .= "<a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirma tu cuenta.</a></p>";
        $contenido .= "<p>Si tu no solicitaste este email, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $email->Body = $contenido;

        // Enviar email
        $email->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de email
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = 'sandbox.smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->Username = 'b345255ffd7776';
        $email->Password = '3382bdd9697836';

        $email->setFrom('cuentas@uptask.com');
        $email->addAddress('cuentas@uptask.com', 'Uptask.com');
        $email->Subject = 'Reestablece tu Contraseña';

        // Set HTML
        $email->isHTML(TRUE);
        $email->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>!, ";
        $contenido .= "Para cambiar tu contraseña y tener acceso a tu cuenta UpTask entra en el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: ";
        $contenido .= "<a href='http://localhost:3000/reestablecer?token=" . $this->token . "'>Reestablecer tu Contraseña.</a></p>";
        $contenido .= "<p>Si tu no solicitaste este email, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $email->Body = $contenido;

        // Enviar email
        $email->send();
    }
}