<?php>

$file=$_GET['file'];
$msg=$_GET['msg'];
$destino=$_GET['destino'];
$titulo=$_GET['titulo'];

if (isset($_GET)){

require_once('class.phpmailer.php');

$mail             = new PHPMailer();

	if (!empty($file)){
	$body             = file_get_contents($file);
	}else{
	$body             = $msg;	
	}

$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); 
SMTP Server = "smtpout.asia.secureserver.net";
Port Goddady = "80";

$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = '64.233.180.108';      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "julanodetal@gmail.com";  // GMAIL username
$mail->Password   = "julanitodetal";            // GMAIL password
$mail->SetFrom('daniel@financiamientofacil.com', 'Financiamiento Facil');
$mail->Subject    = "Bienvenido a Financiemiento Facil!";
$mail->AltBody    = "Para ver el mensaje, Valide que su cliente de correo electronico pueda ver archivos en formato HTML"; // optional, comment out and test

$mail->MsgHTML($body);


$address1 = $destino;
$mail->AddAddress($address1, $address1);

//$mail->AddAttachment("images/phpmailer.gif");// attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}

}
?>
