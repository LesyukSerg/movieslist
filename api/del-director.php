<?php
    header('Content-Type', 'json/application');

    define('ROOTDIR', getcwd().'/../');
    define('cls', ROOTDIR . "/classes/");
    define('view', ROOTDIR . "/view/");

    require ROOTDIR . "/conf/connect.php";
    require cls . "Directors.php";
    require cls . "Authorization.php";
    $userObj = new Authorization();
    $id = (int)$_GET['id'];
    $dirObj = new Directors($db);

    if ($dirObj->deleteDirector($id)) {
        $data = ['success' => true];
    } else {
        $data = ['success' => false];
    }

    echo json_encode($data);