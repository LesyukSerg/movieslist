<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');
    define('ROOTDIR', getcwd());
    define('cls', ROOTDIR . '/classes/');
    define('view', ROOTDIR . "/view/");

    require ROOTDIR . "/conf/connect.php";
    require cls . "Directors.php";
    require cls . "Authorization.php";
    $userObj = new Authorization();
    $dirObj = new Directors($db);
    $id = (int)$_GET['id'];
    $title = $id ? "Edit Director" : "Add Director";

    if ($_POST) {
        if($id) {
            $updated = $dirObj->editDirector($id, $_POST['name']);
        } else {
            $added = $dirObj->addDirector($_POST['name']);
            $title = "Add another Director";
        }
    }

    $director = $dirObj->getDirectorById($id);
?>
<?php require view . 'header.php'; ?>
<?php require view . 'menu.php'; ?>
<?= $updated ? '<div class="alert alert-success" role="alert">Director has been updated</div>' : '' ?>
<?= $added ? '<div class="alert alert-info" role="alert">Director has been added</div>' : '' ?>

    <div class="container mt-5">
        <h2><?= $title ?></h2>

        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="movieTitle">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter Director's name" value="<?= $director['name'] ?>" required>
            </div>

            <button type="submit" class="btn mt-2 btn-primary float-end"><?= $id ? 'EDIT' : 'ADD' ?></button>
        </form>
    </div>

<?php require view . 'footer.php'; ?>