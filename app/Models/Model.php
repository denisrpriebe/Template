<?php

namespace App\Models;

use App\Contracts\ModelBuilderContract;

abstract class Model {

    public static function build(ModelBuilderContract $modelBuilder, $result) {
        $builder = new $modelBuilder();
        return $builder->build($result);
    }

}
