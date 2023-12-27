<?
    $time = microtime(1);
    session_start();
    date_default_timezone_set("Europe/Kiev");

    //	if(!isset($_COOKIE['login'])) $_COOKIE['login'] = NULL;
    //	if(!isset($_COOKIE['uid'])) $_COOKIE['uid'] = null;
    //	if(!isset($_COOKIE['check'])) $_COOKIE['check'] = null;
    //
    //	setcookie("login", $_COOKIE['login'], time()+(60*60*24*7));
    //	setcookie("uid", $_COOKIE['uid'], time()+(60*60*24*7));
    //	setcookie("check", $_COOKIE['check'], time()+(60*60*24*7));

    define('ROOTDIR', getcwd());
    define('cls', ROOTDIR . "/classes/");
    define('view', ROOTDIR . "/view/");

    echo __LINE__ . ' = ' . round(microtime(1) - $time, 4) . "<br>";

    require ROOTDIR . "/conf/connect.php";
    require cls . "Directors.php";
    require cls . "Authorization.php";

    $userObj = new Authorization();
    $dirObj = new Directors($db);
    $title = "Directors list";
    $page_name = 'directors';
    $page = (int)$_GET['page'] ?: 1;
    $onPage = 5;

    $directors_list = $dirObj->getDirectors($onPage, $page);
    $count = $dirObj->countDirectors()['ids'];
    $nav = ceil($count/$onPage);
?>
<?php require view . "header.php"; ?>
<?php require view . "menu.php"; ?>
<div class="container mt-4">
    <h2><?= $title ?></h2>
    <ul class="list-group">
<?
        foreach ($directors_list as $director) {
            echo '
                <li class="list-group-item">' . $director['name'] . '
                    <button class="btn btn-sm ms-2 btn-danger float-end del-director" data-id="'. $director['directorId'].'">Delete</button>
                    <a class="btn btn-sm btn-primary float-end" href="/director.php?id='. $director['directorId'].'">Edit</a>
                </li>
            ';
        }
?>
    </ul>

    <nav class="navbar fixed-bottom navbar-light bg-light">
        <ul class="pagination mx-auto">
<?
            for ($p=1; $p<=$nav; $p++) {
                echo '<li class="page-item '.($page==$p ? 'active' : '').'">
                        <a class="page-link" href="./directors.php?page='.$p.'">'.$p.'</a>
                    </li>';
            }
?>
        </ul>
    </nav>

    <a href="/director.php" class="btn btn-success mt-3">Add Director</a>
</div>

<?php require view . "footer.php"; ?>
