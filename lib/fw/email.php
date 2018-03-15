<?php
require Fw::$config['basePath'] . '/lib/phpmailer/class.smtp.php';
require Fw::$config['basePath'] . '/lib/phpmailer/class.pop3.php';
require Fw::$config['basePath'] . '/lib/phpmailer/class.phpmailer.php';
class Fw_Email extends PHPMailer{
    public $from;
    public $toMails;
    public $ccMails;
    public $bccMails;
    public function __construct(){
        $this->isSMTP();
        $this->SMTPDebug = Fw::$config['mail']['SMTPDebug'];
        $this->Host = Fw::$config['mail']['Host'];
        $this->Port = Fw::$config['mail']['Port'];
        $this->SMTPSecure = Fw::$config['mail']['SMTPSecure'];
        $this->SMTPAuth = Fw::$config['mail']['SMTPAuth'];
        $this->Username = Fw::$config['mail']['Username'];
        $this->Password = Fw::$config['mail']['Password'];
    }
     
    public function resetTo(){
        $this->to = array();
    }
     
    public function resetCC(){
        $this->cc = array();
    }
     
    public function resetBCC(){
        $this->bcc = array();
    }
     
    public function sendMail(){
        if(is_array($this->from)){
            $this->setFrom($this->from['email'], $this->from['name']);
        }else{
            $this->setFrom($this->from);
        }
         
        if($this->toMails != null){
            if(is_array($this->toMails)){
                if(isset($this->toMails[0]['email'])){
                    foreach($this->toMails as $item){
                        if(is_array($item)){
                            $this->addAddress($item['email'], $item['name']);
                        }else{
                            $this->addAddress($item);
                        }
                    }
                }else{
                    $this->addAddress($this->toMails['email'], $this->toMails['name']);
                }
            }else{
                $this->addAddress($this->toMails);
            }
        }
         
        if($this->ccMails != null){
            if(is_array($this->ccMails)){
                if(isset($this->ccMails[0]['email'])){
                    foreach($this->ccMails as $item){
                        if(is_array($item)){
                            $this->addCC($item['email'], $item['name']);
                        }else{
                            $this->addCC($item);
                        }
                    }
                }else{
                    $this->addCC($this->ccMails['email'], $this->ccMails['name']);
                }
            }else{
                $this->addCC($this->ccMails);
            }
        }
         
        if($this->bccMails != null){
            if(is_array($this->bccMails)){
                if(isset($this->bccMails[0]['email'])){
                    foreach($this->bccMails as $item){
                        if(is_array($item)){
                            $this->addBCC($item['email'], $item['name']);
                        }else{
                            $this->addBCC($item);
                        }
                    }
                }else{
                    $this->addBCC($this->bccMails['email'], $this->bccMails['name']);
                }
            }else{
                $this->addBCC($this->bccMails);
            }
        }
        if(!$this->send()){
            return $this->ErrorInfo;
        }else{
            return true;
        }
    }
    
    //public function sendmail(){
//        $mail = new Navi_Email();
//        $mail->Subject = '=?UTF-8?B?'.base64_encode('Xin chào bạn!').'?=';
//        $mail->isHTML(true);
//        $mail->Body = 'Đây là <b>email</b> gửi test nhé!';
//        $mail->from = 'contact@lifeandline.com';
//        $mail->toMails = 'clientmail@gmail.com';
//        $send = $mail->sendMail();
//        if($send){
//            echo 'Successfully!';
//        }else{
//            echo 'Fail!';
//        }
//    }

}