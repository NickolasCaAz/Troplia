<?php
// Importa a classe do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carrega o arquivo de autoload do PHPMailer
require 'D:/projetos/html/Projeto - Troplia/PHPMailer/Exception.php';
require 'D:/projetos/html/Projeto - Troplia/PHPMailer/PHPMailer.php';
require 'D:/projetos/html/Projeto - Troplia/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["firstname"];
    $sobrenome = $_POST["lastname"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["subject"];

    // Instancia um objeto PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'gmail';
        $mail->SMTPAuth = true;
        $mail->Username = 'troplia.bio@gmail.com';
        $mail->Password = 'sua_senha';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurações do remetente e destinatário
        $mail->setFrom('seu_email@example.com', 'Seu Nome');
        $mail->addAddress('destinatario@example.com', 'Nome do Destinatário');

        // Define o assunto e corpo do e-mail
        $mail->Subject = $assunto;
        $mail->Body = "Nome: $nome $sobrenome\n\n";
        $mail->Body .= "Assunto: $assunto\n\n";
        $mail->Body .= "Mensagem:\n$mensagem";

        // Envia o e-mail
        $mail->send();
        echo "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "Ocorreu um erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
?>
