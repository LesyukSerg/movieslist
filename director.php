<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');
    define('ROOTDIR', getcwd());
    const cls = ROOTDIR . '/classes/';
    const view = ROOTDIR . "/view/";

    require ROOTDIR . "/conf/connect.php";
    require cls . "Directors.php";
    require cls . "Authorization.php";
    $userObj = new Authorization();
    /* $var connect.php */
    $dir_obj = new Directors($db);
    $id = (int)$_GET['id'];
    $title = $id ? "Edit Director" : "Add Director";

    if ($_POST) {
        if($id) {
            $updated = $dir_obj->editDirector($id, $_POST['name']);
        } else {
            $added = $dir_obj->addDirector($_POST['name']);
            $title = "Add another Director";
        }
    }

    $director = $dir_obj->getDirectorById($id);
?>
<?php require view . 'header.php'; ?>
<?php require view . 'menu.php'; ?>
<?= $updated ? '<div class="alert alert-success" role="alert">Director has been updated</div>' : '' ?>
<?= $added ? '<div class="alert alert-info" role="alert">Director has been added</div>' : '' ?>

    <div class="container mt-5">
        <h2><?= $title ?></h2>

        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter Director's name" value="<?= $director['name'] ?>" required>
            </div>

            <button type="submit" class="btn mt-2 btn-primary float-end"><?= $id ? 'EDIT' : 'ADD' ?></button>
        </form>
    </div>

<?php require view . 'footer.php'; ?>