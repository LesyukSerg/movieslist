<?
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

//    $db = mysqli_connect($dbConnection['host'], $dbConnection['user'], $dbConnection['pass'], $dbConnection['dbname']) or die(mysqli_error($db));
//    mysqli_select_db($db, $dbConnection['dbname']) or die(mysqli_error($db));
//    unset($dbConnection);
