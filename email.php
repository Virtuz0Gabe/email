<?php 

//namespace App\Comunication;

require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['destinatario'], $_POST['assunto'], $_POST['conteudo'])){
    
    $destinatario = $_POST['destinatario'];
    $assunto = $_POST['assunto'];
    $conteudo = $_POST['conteudo'];
}



try{

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'soudiscreto453@gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->Password = 'leaqdwkxuzwdesow';
    $mail->setFrom('soudiscreto453@gmail.com');
    $mail->addAddress($destinatario);
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = $conteudo;

    if ($mail->send()){
        echo 'deu';
    }else{
        echo 'não deu';
    }
}
catch (Exception $e){
    echo 'Deu tudo errado'.$mail->ErrorInfo;
}


/*


class Email 
{
    public $destinatario = 'Gabrielwernerkuhn1@gmail.com';
    public $subject = 'TESTE';
    public $body = 'este Email é para fins de testes se você está recebendo este EMAIL desconcidere';

    // Os dados abaixo servem para nos conectarmos com o serviço de EMAIL do GMAIL
    // São consideradas CREDENCIAIS de acesso ao SMTP
    const HOST = 'smtp.gmail.com';
    const USER = 'soudiscreto453@gmail.com';
    const PASS = 'PassSenha1%';
    const SECURE = 'TLS';
    const PORT = 587;
    const CHARSET = "UTF-8";

    // Informações do Remetente
    const FROM_EMAIL = "soudiscreto453@gmail.com";
    const FROM_NAME = "Gabriel Werner Kuhn";


    // Mensagem de erro:
    private $error;

    public function getError(){
        return $this->error;
    }



    public function sendEmail ($addresses, $subject, $body, $attachments =[], $ccs = [], $bccs = []){
        $this->error = '';


        $obMail = new PHPMailer(true);

            // CREDENCIAIS DE ACESSO AO SMTP
            // $obMail->isSMTP(true);
            // $obMail->Host = self::HOST;
            // $obMail->SMTPAuth = true;
            // $obMail->Username = self::USER;
            // $obMail->Password = self::PASS;
            // $obMail->SMTPSecure = self::SECURE;
            // $obMail->Port = self::PORT;
            // $obMail->CharSet = self::CHARSET;


            // REMETENTE
            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // DESTINATÁRIOS
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach($addresses as $address)
            {
                $obMail->addAddress($address);
            }

            // Conteúdo do EMAIL
            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body; 

            // ANEXOS
            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach($attachments as $attachments)
            {
                $obMail->addAttachment($attachments);
            }

            // CC 
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach($ccs as $cc)
            {
                $obMail->addCC($cc);
            }

            // BCC 
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach($bccs as $bcc)
            {
                $obMail->addBCC($bcc);
            }

            return $obMail->send();

        }catch(PHPMailerException $e){
            $this->error = $e->getMessage();
            return false;
        }
    }

}

*/

?>