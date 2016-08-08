<?php

namespace App\Components;

use PHPMailer;
use App\Contracts\ComponentContract;

class Mail extends PHPMailer implements ComponentContract {

    protected $host;
    protected $username;
    protected $password;
    protected $encryption;
    protected $port;

    public function __construct(array $settings) {
        $this->isSMTP();
        $this->SMTPAuth = true;
        $this->Host = $settings['host'];
        $this->Username = $settings['username'];
        $this->Password = $settings['password'];
        $this->SMTPSecure = $settings['encryption'];
        $this->Port = $settings['port'];
    }
    
    public function sendEmail(array $email) {
        
        $this->setFrom('template@template.com');
        
        $this->Subject = $email['subject'];
        $this->msgHTML($email['body']);
        
        $this->addAddress($email['to']);
        
        return parent::send();
    }

}
