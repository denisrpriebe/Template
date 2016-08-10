<?php

namespace App\Components;

use App\Components\Configuration;
use Carbon\Carbon;

class Encryption {

    /**
     * The first layer of protection.
     *
     * @var string
     */
    protected $salt;

    /**
     * The second layer of protection.
     *
     * @var string
     */
    protected $pepper;

    /**
     * The third layer of protection.
     * 
     * @var string 
     */
    protected $cumin;

    /**
     * Creates an instance of the encryption.
     *
     * @param type $settings
     */
    public function __construct(Configuration $configuration) {
        $this->salt = $configuration->encryption('salt');
        $this->pepper = $configuration->encryption('pepper');
        $this->cumin = $configuration->encryption('cumin');
    }

    /**
     * Hashes the given value.
     *
     * @param string $value
     * @return string
     */
    public function hash($value) {
        return hash('sha512', sha1(md5($value . $this->salt) . $this->pepper) . $this->cumin);
    }

    public function passwordResetToken() {
        return hash('sha512', Carbon::now()->toDateTimeString() . uniqid());
    }

    public function encrypt($value) {
        
    }

    public function decrypt($value) {
        
    }

}
