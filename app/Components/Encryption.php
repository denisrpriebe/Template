<?php

namespace App\Components;

use App\Contracts\ComponentContract;
use Carbon\Carbon;

class Encryption implements ComponentContract {

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
    public function __construct(array $settings) {
        $this->salt = $settings['salt'];
        $this->pepper = $settings['pepper'];
        $this->cumin = $settings['cumin'];
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
