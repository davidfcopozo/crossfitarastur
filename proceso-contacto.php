<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

function limpiarInput($campo)
{
  if (!empty($campo["phone"]) && $campo) {
    die("Campo vacío");
  }
  $campo = trim($campo);
  $campo = strip_tags($campo);
  $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');
  return $campo;
}

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //https://danipastor.es/como-integrar-instalar-o-configurar-recaptcha-v3-de-google-en-un-formulario-con-php-enviado-por-post/
  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
  $recaptcha_response = $_POST['recaptcha_response'];
  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . RECAPTCHA_SECRET . '&response=' . $recaptcha_response);
  $recaptcha = json_decode($recaptcha);

  if ($recaptcha->score >= 0.7) {
    // OK. ERES HUMANO, EJECUTA ESTE CÓDIGO   
    //Sanitización manual de los datos
    $campos = array_map("limpiarInput", $_POST);
    if (!empty($campos["email"]) && !filter_var($campos["email"], FILTER_VALIDATE_EMAIL)) die("El formato del email es inválido.");

    if (preg_match("/[\r\n]/", $campos["email"])) die("Intento de inyección de cabecera detectado.");

    $mail = new PHPMailer(true);

    try {
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  //Enable verbose debug output
      $mail->isSMTP();                                           //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
      $mail->Username   = GOOGLE_EMAIL;           //SMTP username
      $mail->AddEmbeddedImage(__DIR__ . '/images/logo.webp', 'logo', 'logo.webp');
      $mail->Password   = GOOGLE_APP_PWD;                 //SMTP password
      $mail->SMTPSecure = 'ssl';                                 //Enable implicit TLS encryption
      $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      $emailFrom = $campos["email"];
      $nameFrom = $campos["name"];
      $phoneFrom = $campos["phone"];
      $message = nl2br($campos["message"]);
      $timestamp = date("Y-m-d H:i:s");

      $mail->setFrom($emailFrom, $nameFrom); // ¿Quién lo envía? El que rellena el formulario. Usurpación de identidad
      $mail->addAddress(GOOGLE_EMAIL, 'Crossfit Arastur');   //Propietaria de la web
      $mail->addReplyTo($emailFrom, $nameFrom);

      $emailBody = <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Envío de usuario</title>
  </head>
  <body
    style="
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    "
  >
    <table
      border="0"
      cellpadding="0"
      cellspacing="0"
      width="100%"
      style="max-width: 600px; margin: 0 auto; background-color: #ffffff"
    >
      <!-- Header -->
      <tr>
      <td align="center" style="padding: 40px 0; background-color: rgba(0, 144, 155);">
          <img
            src="cid:logo"
            alt="Logo de Crossfit Arastur"
            style="max-width: 100%; height: auto"
          />
          <h1 style="color: #0f172a; font-size: 24px; margin: 10px 0 0 0">
            Envío desde formulario de contacto
          </h1>
        </td>
      </tr>

      <!-- Content -->
      <tr>
        <td style="padding: 40px 30px">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td style="padding: 10px 0; border-bottom: 1px solid #e2e8f0">
                <strong style="color: #64748b">Nombre:</strong>
                <div style="color: #0f172a; margin-top: 5px">
                  $nameFrom
                </div>
              </td>
            </tr>
            <tr>
              <td style="padding: 10px 0; border-bottom: 1px solid #e2e8f0">
                <strong style="color: #64748b">Correo Electrónico:</strong>
                <div style="color: #0f172a; margin-top: 5px">$emailFrom</div>
              </td>
            </tr>
            <tr>
              <td style="padding: 10px 0; border-bottom: 1px solid #e2e8f0">
                <strong style="color: #64748b">Teléfono:</strong>
                <div style="color: #0f172a; margin-top: 5px">$phoneFrom</div>
              </td>
            </tr>
            <tr>
              <td style="padding: 10px 0">
                <strong style="color: #64748b">Mensaje:</strong>
                <div style="color: #0f172a; margin-top: 5px; line-height: 1.6">
                  $message
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <!-- Timestamp -->
      <tr>
        <td
          style="
            padding: 20px 30px;
            background-color: #f8fafc;
            color: #64748b;
            font-size: 14px;
          "
        >
          $timestamp
        </td>
      </tr>

      <!-- Footer -->
      <tr>
        <td
          style="
            padding: 30px;
            background-color: rgba(0, 144, 155);
            color: #ffffff;
            text-align: center;
          "
        >
          <p style="margin: 0 0 10px 0; font-size: 16px">Crossfit Arastur</p>
          <address>
            <a
              style="margin: 0; font-size: 14px; color: #ffffff"
              href="https://www.google.com/maps/dir//Avda.%20Diagonal%20Plaza,%2014,%20Nave%2040.%2050197-%20Zaragoza"
              target="_blank"
            >
              Avda. Diagonal Plaza, 14, Nave 40.
              <br />
              50197- Zaragoza
            </a>
            <div style="margin-top: 0.5rem">
              <a style="color: #ffffff;" href="mailto:crossfitarastur@gmail.com">
                crossfitarastur@gmail.com </a
              ><br />
              <a style="color: #ffffff;" href="tel:+34628344844"> 628 34 48 44 </a>
            </div>
          </address>
        </td>
      </tr>
    </table>
  </body>
</html>
HTML;


      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Formulario de contacto crossfitarastur.com';
      $mail->Body    = $emailBody;

      $mail->send();

      $response = [
        'success' => true,
        'message' => 'El formulario ha sido enviado correctamente.',
      ];
    } catch (Exception $e) {
      $response = [
        'success' => false,
        'message' => 'Ha fallado el envío con la clase phpMailer: ' . $mail->ErrorInfo,
      ];
    }
    header('Content-Type: application/json;charset=UTF-8');
    echo json_encode($response);
    exit;
  } else {
    // KO. ERES ROBOT, EJECUTA ESTE CÓDIGO
    die("Eres un bot");
  }
} else {
  // No vienes del formulario
  http_response_code(403);
  exit;
}
