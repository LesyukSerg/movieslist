<?php
    declare(strict_types=1);

    error_reporting(1);
    require cls . "DB.php";

    $auth = [
        'user'     => 'admin',
        'password' => 'admin'
    ];

    $conn = [
        'host'   => 'localhost',
        'dbname' => 'test_serhii_lesiuk',
        'user'   => 'root',
        'pass'   => '',
    ];

    $db = new DB($conn['host'], $conn['user'], $conn['pass'], $conn['dbname']);

