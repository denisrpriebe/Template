<?php

namespace App\Facades\Components;

class Response {
    
    public static function json(array $reponse) {
        echo json_encode($reponse);
        die();
    }
    
}
