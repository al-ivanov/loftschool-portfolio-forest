<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['msg'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ivanov-sasha95@mail.ru';                 // Наш логин
$mail->Password = 'gqusca9qq';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('ivanov-sasha95@mail.ru', 'Alex Ivanov');   // От кого письмо 
$mail->addAddress('saanyyaaa@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Письмо с сайта портфолио';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
    Email: ' . $email . ' <br>
    Сообщение: ' .$message. ' ';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    $result = "success";
} else {
    $result = "error";
}

echo json_encode(["result" => $result]);

?>