<?php
    header('Content-Type', 'json/application');

    define('ROOTDIR', getcwd().'/../');
    define('cls', ROOTDIR . "/classes/");
    define('view', ROOTDIR . "/view/");

    require ROOTDIR . "/conf/connect.php";
    require cls . "Movies.php";
    require cls . "Authorization.php";
    $userObj = new Authorization();
    $id = (int)$_GET['id'];
    $movObj = new Movies($db);

    if ($movObj->deleteMovie($id)) {
        $data = ['success' => true];
    } else {
        $data = ['success' => false];
    }

    echo json_encode($data);