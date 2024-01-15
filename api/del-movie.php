<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/main.php';

    use Classes\Authorization;
    use Classes\Movies;

    $user_obj = new Authorization();
    $id = (int)$_GET['id'];
    $mov_obj = new Movies();

    if ($mov_obj->delete($id)) {
        $data = ['success' => true];
    } else {
        $data = ['success' => false];
    }

    echo json_encode($data);