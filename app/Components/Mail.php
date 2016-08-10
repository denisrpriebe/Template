<?php

namespace App\Components;

use App\Components\Configuration;
use PHPMailer;

class Mail extends PHPMailer {

    protected $host;
    protected $username;
    protected $password;
    protected $encryption;
    protected $port;

    public function __construct(Configuration $configuration) {
        
        parent::__construct();
        
        $this->isSMTP();
        $this->SMTPAuth = true;
        $this->Host = $configuration->mail('host');
        $this->Username = $configuration->mail('username');
        $this->Password = $configuration->mail('password');
        $this->SMTPSecure = $configuration->mail('encryption');
        $this->Port = $configuration->mail('port');
    }
    
    public function sendEmail(array $email) {
        
        $this->setFrom('template@template.com');
        
        $this->Subject = $email['subject'];
        $this->msgHTML($email['body']);
        
        $this->addAddress($email['to']);
        
        return parent::send();
    }

}
