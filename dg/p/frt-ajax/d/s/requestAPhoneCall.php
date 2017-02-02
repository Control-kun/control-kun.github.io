<?php
// require_once $_SERVER['DOCUMENT_ROOT'].'/_.php';



// Нам понадобятся функции:
////////////////////////////////////////////////////////////////////////////////
// …



// Запросы и операции выполняются, если получены входящие параметры.
////////////////////////////////////////////////////////////////////////////////
// dgDV($Input,'$Input');


$subject = 'Заявка с сайта «Fortunum»' . ($_POST['form_name'] ? ', форма ' . $_POST['form_name'] : '');


$titles = [
	'name'  => 'Имя клиента',
	'phone' => 'Номер телефона'
];
$EOL = "\r\n";
foreach ($Input as $key => $value) {
	if ($value != '' && $key != 'project_name' && $key != 'admin_email' && $key != 'form_name') {
		$title = $titles[$key] ? $titles[$key] : $key;
		$HTML_table .=
		    '  <tr style="background-color:' . (($c = !$c) ? '#f8f8f8' : '#fff') . '">'        . $EOL .
			'    <td style="padding:10px;border:#e9e9e9 1px solid"><b>' . $title . '</b></td>' . $EOL .
			'    <td style="padding:10px;border:#e9e9e9 1px solid">'    . $value .     '</td>' . $EOL .
			'  </tr>' . $EOL;
	}
}
$message = '<table>'.$EOL.$HTML_table.'</table>';

dgDV($subject,'$subject');
dgDV($HTML_table,'$HTML_table');


require 'class.phpmailer.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->setFrom('hvostovp@gmail.com', 'Искусственный разум «Fortunum»');
// $mail->addAddress('hvostovp@gmail.com', 'ы');
$mail->addAddress('dm1tr0@mail.ru', 'ы');
$mail->Subject = $subject;
$mail->msgHTML($message);
$mail->send();

// mail ('dm1tr0@mail.ru', $subject, $message);


$result = true;
// Формируем таблицу данных:
if ($result) {
	unset($sql, $temp_data/*, $a*/);
	trigger_error('sn ::: Успешно!');
} else trigger_error('en ::: Безрезультатно!');
