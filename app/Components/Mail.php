<?php

namespace App\Components;

use PHPMailer;
use App\Contracts\ComponentContract;

class Mail extends PHPMailer implements ComponentContract {

    public function __construct(array $settings) {
        $this->isSMTP();
        $this->SMTPAuth = true;
    }

}
