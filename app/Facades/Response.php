<?php

namespace App\Facades;

class Response {
    
    public static function json(array $reponse) {
        echo json_encode($reponse);
        die();
    }
    
}
