<?php

/**
 * Mail Configuration
 * 
 * Email settings and credentials can be configured here. Currently, the mail
 * component sends email through SMTP.
 */
return [
    
    /**
     * SMTP server to send email through.
     * 
     */
    'host' => 'smtp.gmail.com',
    
    /**
     * The username used to connect to the SMTP server.
     * 
     */
    'username' => 'nationalrecognitionproducts@gmail.com',
    
    /**
     * The password used to connect to the SMTP server.
     * 
     */
    'password' => 'NRP4lif3',
    
    /**
     * The encryption method used to connect to the SMTP server.
     * ('tls' or 'ssl')
     * 
     */
    'encryption' => 'tls',
    
    /**
     * The port used to connect to the smtp server.
     * 
     */
    'port' => '587'
    
];
