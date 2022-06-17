<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

define("CERT_FILENAME", getRootPath() . "site/includes/artemy/v2/PHPMailer-master/certificates/admin@covidlist.online/crt.crt");
define("KEY_FILENAME", getRootPath() . "site/includes/artemy/v2/PHPMailer-master/certificates/admin@covidlist.online/key.key");
const KEY_PASS = "hW6GadDH1BK2";

class MailSender
{
    private PHPMailer $mail;

    /**
     * Отправляет сообщение
     *
     * @param string $mailToSend
     * @throws Exception В основном отправляет только если email не подходит под паттерн
     */
    public function __construct(string $mailToSend)
    {
        //Server settings
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host = 'smtp.mail.ru';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $this->mail->Username = 'admin@covidlist.online';                     //SMTP username
        $this->mail->Password = 'v4353v4576by54';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //s mime сертификат будет отправляться с письмом до 10 дня 4 месяцв 2022 года
        if (time() < 1649541600) {
            $this->mail->sign(CERT_FILENAME, KEY_FILENAME, KEY_PASS);
        }

        //Recipients
        $this->mail->setFrom('admin@covidlist.online');
        $this->mail->addAddress($mailToSend);     //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

        //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $this->mail->isHTML(true);                                  //Set email format to HTML
    }

    /**
     * Отправляет сообщение
     *
     * @param string $subject
     * @param string $body
     * @throws Exception Отправляет если сервер отказался отправлять сообщение по любой причине.
     */
    public function send(string $subject, string $body)
    {
        try {
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = $body;
            $this->mail->send();
        } catch (Exception) {
            throw new Exception("dwdsd");
        }
    }

    /**
     * @param int $code
     * @throws Exception
     */
    public function sendCode(int $code)
    {
            $this->mail->Subject = "ItHelpDesk — Запрос на восстановление пароля";
            $this->mail->Body = "Проверочный код: <b>$code</b>";
            $this->mail->AltBody = "Проверочный код:  $code";
            $this->mail->send();
    }

    /**
     * @throws Exception
     */
    public function sendConfirmation()
    {
        try {
            $this->mail->Subject = "ItHelpDesk — Пароль был изменён!";
            $this->mail->Body = "Ваш пароль был успешно изменён.";
            $this->mail->AltBody = "Ваш пароль был успешно изменён.";
            $this->mail->send();
        } catch (Exception) {
            throw new Exception("dwdsd");
        }
    }
}