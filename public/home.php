<?php

require_once '../app/start.php';

use App\Facades\View;
use App\Facades\Database;
use App\Models\User;
use App\ModelBuilders\UserBuilder;

$result = Database::query('SELECT * FROM users WHERE id = 1');
$user = User::build(new UserBuilder, $result[0]);

View::add('user', $user);
View::show('pages/home');
