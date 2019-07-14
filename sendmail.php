<?php

function validateCaptcha(){
	try {
		$recaptcha = isset($_POST["g-recaptcha-response"]) ? $_POST["g-recaptcha-response"] : '13';
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array('secret' => '6LcA4mgUAAAAAKw-IqBQvzx4VTVeaicTTHmzbpQT','response' => $recaptcha);
		$options = array('http' => array ('method' => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$verify = @file_get_contents($url, false, $context);
		$captcha_success = json_decode($verify);
		return $captcha_success->success;
	}catch (Exception $e){
		return false;
	}
}

/*use mailer\PHPMailer;
use mailer\Exception;

require 'mailer/PHPMailer.php';
require 'mailer/Exception.php';
require 'mailer/SMTP.php';*/

require 'mailer/class.phpmailer.php';
require 'mailer/class.smtp.php';

    //$appName = 'Website';
    //$appColor = '#7303c0';
    //$appLogo = 'https://www.turnosuno.com/demo/img/logo.png';
    //$appAddress = 'su dirección';
    //$appPhone = 'telefono';

	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $correo = isset($_POST['email']) ? $_POST['email'] : '';
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
	$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
	$antispam = isset($_POST['antiSpam']) ? $_POST['antiSpam'] : '';
    $files = $filesPhp = $filesName = array();

    foreach ($_FILES["fotos"]["name"] as $num => $fileName){
		if (!$_FILES["fotos"]["error"][$num]){
			move_uploaded_file($_FILES["fotos"]["tmp_name"][$num], 'uploads/'.$_FILES["fotos"]["name"][$num]);
			$files[] = $pageName.'uploads/'.$_FILES["fotos"]["name"][$num];
			$filesPhp[] = 'uploads/'.$_FILES["fotos"]["name"][$num];
			$filesName[] = $_FILES["fotos"]["name"][$num];
			
		}
	}

    $fromEmail = 'website@domain.com';
    $fromName = 'Website';
    $subject = 'Formulario de Website .' .date('Y/m/d');
    $to = 'mail@domain.com';
    $pageName = 'https://domain.com';


    $msg = 'Hola, '.$nombre.' envio una consulta a traves del formulario de contacto con el mail '.$correo.'<br><br>';
    $msg .= '**************************************************<br>';
    $msg .= "Nombre: ".$nombre."<br>";
    $msg .= "Email: ".$correo."<br>";
    $msg .= "Telefono: ".$telefono."<br>";
    $msg .= "Consulta: ".$mensaje."<br>";
    $msg .= '**************************************************<br>';

    $files = [];
    foreach ($files as $n => $file){
    	$msg .= "Fotos: <a href='".$pageName.''.$file."'>Foto ".($n + 1)."</a><br>";
    }

    $msg .= '**************************************************<br>';
    $msg .= "Fecha del formulario: ".date("Y/m/d")."<br><br>";

    
    //$template = file_get_contents('mails/contacto.html');
    //$search = array('##APPNAME##', '##APPSUBJECT##', '##APPCOLOR##', '##APPMAIL##', '##APPLOGO##', '##APPADDRESS##', '##APPPHONE##', '##NOMBRE##', '##CORREO##', '##TELEFONO##', '##MENSAJE##','##DATE##');
    //$replace = array($appName, $subject, $appColor, $appMail, $appLogo, $appAddress, $appPhone, $nombre, $correo, $telefono, $mensaje, $date);
    //$template = str_ireplace($search, $replace, $template);

    ////VALIDO EL CAPTCHA
    $valid = validateCaptcha();

    if ($nombre != '' && $correo != '' && $telefono != '' && $mensaje != '' && $antispam == '' && $valid){
    
        $email = new PHPMailer();
        $email->isHTML(true);
        $email->CharSet = 'UTF-8';
        $email->From      = $fromEmail;
        $email->setFrom($fromEmail, utf8_decode($fromName));
        $email->Subject   = $subject;
        $email->addReplyTo( $correo );
        $email->Body      = $msg;
        //$email->Body      = $template;
        $email->AddAddress( $to );

        //$email->IsSMTP();
        //$email->Host = 'ssl://smtp.gmail.com';
        //$email->Port = 465;
        //$email->SMTPAuth = true;
        //$email->Username = $fromEmail;
        //$email->Password = 'example';
        //$email->SMTPSecure = "ssl"; 
        
        
        // guardar en txt
        $data = date('Y/m/d') . ' - ' . $_POST['nombre'] . ' - ' . $_POST['email'] . ' - ' . $_POST['telefono'] . ' - ' . $_POST['mensaje'] .  "\n";
        $ret = file_put_contents('consultas.txt', $data, FILE_APPEND | LOCK_EX);

        if($ret === false) {
            die('hubo un error al escribir el archivo');
        }
        
        $filesPhp = [];
        foreach ($filesPhp as $n => $file){
        	$filename = isset($filesName[$n]) ? $filesName[$n] : '';
        	$email->AddAttachment( $file, $filename);
        }
        
        // enviar mail
        $email->Send();
        
        header('Location: success.php');
        die();
        
    } else {
        echo 'Faltan completar campos. por favor, intentelo de nuevo.';
        header('Location: index.php');
        die();
    }

?>
