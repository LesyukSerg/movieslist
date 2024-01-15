<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');
    header('Content-Type', 'json/application');

    define('ROOTDIR', getcwd().'/../');
    define('cls', ROOTDIR . '/classes/');
    define('view', ROOTDIR . '/view/');

    require ROOTDIR . '/conf/connect.php';
    require cls . 'Movies.php';
    require cls . 'Authorization.php';
    $user_obj = new Authorization();
    $id = (int)$_GET['id'];
    $mov_obj = new Movies($db);

    if ($mov_obj->deleteMovie($id)) {
        $data = ['success' => true];
    } else {
        $data = ['success' => false];
    }

    echo json_encode($data);