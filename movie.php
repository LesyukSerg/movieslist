<?
    session_start();
    date_default_timezone_set("Europe/Kiev");
    define('ROOTDIR', getcwd());
    define('cls', ROOTDIR . "/classes/");
    define('view', ROOTDIR . "/view/");

    require ROOTDIR . "/conf/connect.php";
    require cls . "Movies.php";
    require cls . "Directors.php";
    require cls . "Authorization.php";
    $userObj = new Authorization();
    $movObj = new Movies($db);
    $dirObj = new Directors($db);
    $id = (int)$_GET['id'];
    $title = $id ? "Edit Movie" : "Add Movie";

    if ($_POST) {
        if($id) {
            $updated = $movObj->editMovie($id, $_POST['directorId'], $_POST['name'], $_POST['description'], $_POST['releaseDate']);
        } else {
            $added = $movObj->addMovie($_POST['directorId'], $_POST['name'], $_POST['description'], $_POST['releaseDate']);
            $title = "Add another Movie";
        }
    }

    $movie = $movObj->getMovieById($id);
    $directors = $dirObj->getDirectors(100);
?>
<?php require view . "header.php"; ?>
<?php require view . "menu.php"; ?>
<?= $updated ? '<div class="alert alert-success" role="alert">Movie has been updated</div>' : '' ?>
<?= $added ? '<div class="alert alert-info" role="alert">Movie has been added</div>' : '' ?>

    <div class="container mt-5">
        <h2><?= $title ?></h2>

        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="movieTitle">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter movie name" value="<?= $movie['name'] ?>" required>
            </div>

            <div class="form-group">
                <label for="director">Director:</label>
                <select class="form-control" id="directorId" name="directorId" required>
                    <?
                        foreach ($directors as $one) {
                            echo '<option value="' . $one['directorId'] . '" ' . ($one['directorId'] == $movie['directorId'] ? 'selected' : '') . ' >' . $one['name'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Опис:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="enter description" required><?= $movie['description'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="releaseDate">Release date:</label>
                <input type="date" class="form-control" id="releaseDate" name="releaseDate" value="<?= $movie['releaseDate'] ?>" required>
            </div>

            <button type="submit" class="btn mt-2 btn-primary float-end"><?= $id ? 'EDIT' : 'ADD' ?></button>
        </form>
    </div>

<?php require view . "footer.php"; ?>