<?php

namespace App\Components;

use App\Contracts\ComponentContract;

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
     * Creates an instance of the encryption.
     * 
     * @param type $settings
     */
    public function __construct(array $settings) {
        $this->salt = $settings['salt'];
        $this->pepper = $settings['pepper'];
    }

    /**
     * Hashes the given value.
     * 
     * @param string $value
     * @return string
     */
    public function hash($value) {
        return sha1(md5($value . $this->salt) . $this->pepper);
    }

    public function encrypt($value) {
        
    }
    
    public function decrypt($value) {
        
    }
    
}
