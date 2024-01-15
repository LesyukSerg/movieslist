<?php
    $time = microtime(1);
    session_start();
    date_default_timezone_set('Europe/Kiev');

    define('ROOTDIR', getcwd());
    define('cls', ROOTDIR . '/classes/');
    define('view', ROOTDIR . '/view/');

    //echo __LINE__ . ' = ' . round(microtime(1) - $time, 4) . "<br>";

    require ROOTDIR . '/conf/connect.php';
    require cls . 'Directors.php';
    require cls . 'Authorization.php';

    $user_obj = new Authorization();
    $dir_obj = new Directors($db);
    $title = 'Directors list';
    $page_name = 'directors';
    $page = (int)$_GET['page'] ?: 1;
    $onPage = 5;

    $directors_list = $dir_obj->getDirectors($onPage, $page);
    $count = $dir_obj->countDirectors()['ids'];
    $nav = ceil($count / $onPage);
?>
<?php require view . 'header.php'; ?>
<?php require view . 'menu.php'; ?>
<div class="container mt-4">
    <h2><?= $title ?></h2>
    <ul class="list-group">
        <?php
            foreach ($directors_list as $director) {
                echo '
                <li class="list-group-item">' . $director['name'] . '
                    <button class="btn btn-sm ms-2 btn-danger float-end del-director" data-id="' . $director['directorId'] . '">Delete</button>
                    <a class="btn btn-sm btn-primary float-end" href="/director.php?id=' . $director['directorId'] . '">Edit</a>
                </li>
            ';
            }
        ?>
    </ul>

    <?php require view . 'pagination.php' ?>

    <a href="/director.php" class="btn btn-success mt-3">Add Director</a>
</div>

<?php require view . 'footer.php'; ?>
