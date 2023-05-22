<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => $settings->db->driver,
    'host' => $settings->db->host,
    'username' => $settings->db->username,
    'password' => $settings->db->password,
    'database' => $settings->db->name,
    'charset' => $settings->db->charset,
    'collation' => $settings->db->collation,
    'prefix' => $settings->db->prefix
]);

$capsule->bootEloquent();

// $capsule->setAsGlobal();