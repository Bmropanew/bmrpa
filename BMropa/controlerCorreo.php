<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $asunto = htmlspecialchars($_POST['asunto']);
        $contenido = htmlspecialchars($_POST['contenido']);
        $para = filter_var($_POST['destinatario'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($para, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Dirección de correo electrónico no válida.');
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Descomentarlo solo para depuración
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'utpbrayansoft@gmail.com';
        $mail->Password = 'ythd wxfj ifsi pibd';

        $mail->setFrom('utpbrayansoft@gmail.com', 'Brayan Olivas');
        $mail->addAddress($para);

        $mail->Subject = $asunto;
        $mail->isHTML(true);
        $mail->Body = "<h1>El mensaje es:</h1><p>{$contenido}</p>";

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];

        // Verificar si se cargó un archivo
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
            $rutaTemporal = $_FILES['archivo']['tmp_name'];
            $nombreArchivo = $_FILES['archivo']['name'];
            $mail->addAttachment($rutaTemporal, $nombreArchivo);
        }

        if ($mail->send()) {
            echo 'Mensaje enviado con éxito.';
        }
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $e->getMessage();
    }
}
