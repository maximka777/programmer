<?php
	function SendMail($to, $subject, $text)
	 {
                /*include_once('_lib/PHPMailerAutoload.php');
                $mail = new PHPMailer;
                //будем отравлять письмо через СМТП сервер
                $mail->isSMTP();
                $mail->SMTPDebug = 4;
                //хост
                $mail->Host = 'smtp.jino.ru';
                //требует ли СМТП сервер авторизацию/идентификацию
                $mail->SMTPAuth = true;
                // логин от вашей почты
                $mail->Username = 'Programmer.by@maksim-barouski.ru';
                // пароль от почтового ящика
                $mail->Password = 'maxim147';
                //указываем способ шифромания сервера
                $mail->SMTPSecure = '';
                //указываем порт СМТП сервера
                $mail->Port = '25';

                //указываем кодировку для письма
                $mail->CharSet = 'UTF-8';
                //информация от кого отправлено письмо
                $mail->From = 'Programmer.by@maksim-barouski.ru';
                $mail->FromName = 'Programmer.by';
                $mail->addAddress($to);

                $mail->isHTML(true);

                $mail->Subject = $subject;
                $mail->Body = $text;

                if(!$mail->send()){
                 echo "Mailer Error: " . $mail->ErrorInfo;
                }else{
                 echo "E-Mail has been sent";
                }*/
                mail($to, $subject, $text);

	 }
?>