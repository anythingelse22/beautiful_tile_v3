<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['user_name'];
$phone = $_POST['user_mail'];
$text = $_POST['user_msg'];

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $phone<br><br>
<b>Сообщение:</b><br>$text
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.google.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'beautifultile0@gmail.com'; // Логин на почте
    $mail->Password   = 'vfdkhnfkuthfsxrq'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 993;
    $mail->setFrom('beautifultile0@gmail.com'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('anyelse11@gmail.com');  
  //  $mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);