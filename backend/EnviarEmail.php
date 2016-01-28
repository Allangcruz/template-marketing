<?php 

header("Content-type: text/html; charset=utf-8");

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/PHPMailerAutoload.php');

//contem a mensagem formatada
require_once "mensagemEmail.php";

//recupera os dados do formulario
$nome = isset($_POST['nome']) ? $_POST['nome']:'';
$email = isset($_POST['email']) ? $_POST['email']:'';
$telefone = isset($_POST['telefone']) ? $_POST['telefone']:'';

$mail = new PHPMailer;
$mail->isSMTP();                                      
$mail->CharSet = "utf-8"; 
$mail->Port = 25;                                    

$mail->Host = 'mail.allangcruz.com.br';  
$mail->SMTPAuth = true;                             
$mail->Username = 'teste@allangcruz.com.br';              
$mail->Password = 'teste123';    

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//dados de envio do ebook
$mail->setFrom('teste@allangcruz.com.br', 'Allan Gonçalves da Cruz');
$mail->addAddress($email, $nome);
$mail->isHTML(true);
$mail->Subject = 'eBook -  Gestão de Representantes Comerciais';

$mail->Body    = $mensagem;

//enviar o e-mail
if($mail->send()) {

	//envia os dados para o dono do ebook
	enviaDadosDoUsuario($nome, $email, $telefone);
	echo '<script>alert("Obrigado, verifique seu e-mail!");location.href="../";</script>';
} else {
	echo '<script>alert("Ocorreu um erro ao enviar o eBook ao seu e-mail, verifique se o mesmo esta correto!");location.href="../";</script>';
	//echo $mail->ErrorInfo;
}
