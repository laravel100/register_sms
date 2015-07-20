<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MailController extends Controller {
	function smtpmail($mail_to, $subject, $message, $headers='') {
        $config=array(
		'smtp_username' => 'send@unlockfx.com',  
		'smtp_port'     => '465', 
		'smtp_host'     => 'ssl://smtp.yandex.ru',  
		'smtp_password' => '4apencoa1',  
		'smtp_debug'    => true,  
		'smtp_charset'  => 'utf-8',   
		'smtp_from'     => 'SPAM'
		); 
        $SEND =   "Date: ".date("D, d M Y H:i:s") . " UT\r\n";
        $SEND .=   'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
        if ($headers) $SEND .= $headers."\r\n\r\n";
        else
        {
                $SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
                $SEND .= "MIME-Version: 1.0\r\n";
                $SEND .= "Content-Type: text/plain; charset=\"".$config['smtp_charset']."\"\r\n";
                $SEND .= "Content-Transfer-Encoding: 8bit\r\n";
                $SEND .= "From: \"".$config['smtp_from']."\" <".$config['smtp_username'].">\r\n";
                $SEND .= "To: $mail_to <$mail_to>\r\n";
                $SEND .= "X-Priority: 3\r\n\r\n";
        }
        $SEND .=  $message."\r\n";
         if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
            if ($config['smtp_debug']) echo $errno."&lt;br&gt;".$errstr;
            return false;
         }

            if (!$this->server_parse($socket, "220", __LINE__)) return false;

            fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
            if (!$this->server_parse($socket, "250", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не могу отправить HELO!</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, "AUTH LOGIN\r\n");
            if (!$this->server_parse($socket, "334", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос Autorizahion.</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
            if (!$this->server_parse($socket, "334", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
            if (!$this->server_parse($socket, "235", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
            if (!$this->server_parse($socket, "250", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не могу отправить комманду Yandex FROM: </p>';
               fclose($socket);
               return false;
            }
            fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

            if (!$this->server_parse($socket, "250", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не могу отправить комманду RCPT TO: </p>';
               fclose($socket);
               return false;
            }
            fputs($socket, "DATA\r\n");

            if (!$this->server_parse($socket, "354", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не могу отправить комманду DATA</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, $SEND."\r\n.\r\n");

            if (!$this->server_parse($socket, "250", __LINE__)) {
               if ($config['smtp_debug']) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
               fclose($socket);
               return false;
            }
            fputs($socket, "QUIT\r\n");
            fclose($socket);
            return TRUE;
		}
		function server_parse($socket, $response, $line = __LINE__) {
				global $config;
				$server_response="";
			while (substr($server_response, 3, 1) != ' ') {
				if (!($server_response = fgets($socket, 256))) {
						   if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
						   return false;
						}
			}
			if (!(substr($server_response, 0, 3) == $response)) {
				   if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
				   return false;
				}
			return true;
		}

}
