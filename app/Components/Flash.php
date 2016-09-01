<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Components;

use App\Components\Session;

class Flash {

    protected $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function success(array $data) {
        $this->session->flash('alert', array_merge(['type' => 'success'], $data));
    }

    public function info(array $data) {
        $this->session->flash('alert', array_merge(['type' => 'info'], $data));
    }

    public function warning(array $data) {
        $this->session->flash('alert', array_merge(['type' => 'warning'], $data));
    }

    public function error(array $data) {
        $this->session->flash('alert', array_merge(['type' => 'danger'], $data));
    }

}
