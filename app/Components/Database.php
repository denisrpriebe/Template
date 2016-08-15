<?php

namespace App\Components;

use App\Components\Configuration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database {

    /**
     * Creates an instance of the database.
     *
     * @param array $settings
     */
    public function __construct(Configuration $configuration) {

        $capsule = new Capsule;

        $capsule->addConnection([
            "driver" => "mysql",
            "host" => $configuration->database('host'),
            "database" => $configuration->database('dbname'),
            "username" => $configuration->database('username'),
            "password" => $configuration->database('password'),
            "charset" => "utf8",
            "collation" => "utf8_general_ci",
            "prefix" => ""
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->bootEloquent();
    }

}
