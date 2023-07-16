<?php

namespace Classes;

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
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'b345255ffd7776';
        $phpmailer->Password = '3382bdd9697836';

        $phpmailer->setFrom('cuentas@uptask.com');
        $phpmailer->addAddress('cuentas@uptask.com', 'Uptask.com');
        $phpmailer->Subject = 'Confirma tu cuenta';

        // Set HTML
        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>!, ";
        $contenido .= "Has creado tu cuenta en Uptask, entra en el siguiente link para confirmarla.</p>";
        $contenido .= "<p>Presiona aquí: ";
        $contenido .= "<a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirma tu cuenta.</a></p>";
        $contenido .= "<p>Si tu no solicitaste este email, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;

        // Enviar email
        $phpmailer->send();
    }
}