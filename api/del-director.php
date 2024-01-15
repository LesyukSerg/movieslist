<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/main.php';

    $user_obj = new Classes\Authorization();
    $id = (int)$_GET['id'];
    $dir_obj = new Classes\Directors($db);

    if ($dir_obj->deleteDirector($id)) {
        $data = ['success' => true];
    } else {
        $data = ['success' => false];
    }

    echo json_encode($data);