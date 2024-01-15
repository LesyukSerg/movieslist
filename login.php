<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');

    define('ROOTDIR', getcwd());
    define('cls', ROOTDIR . '/classes/');
    define('view', ROOTDIR . '/view/');

    require ROOTDIR . '/conf/connect.php';
    require cls . 'Authorization.php';
    $user_obj = new Authorization();
    $title = 'Authorization';

    if ($_GET['out']) $user_obj->logout();

    if ($_POST) {
        $err = $user_obj->auth($_POST['username'], $_POST['password']);
    }

?>
<?php require view . 'header.php' ?>
<?= $err ? '<div class="alert alert-danger" role="alert">Wrong authorization data</div>' : '' ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Authorization</div>
                    <div class="card-body">
                        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                            <div class="form-group">
                                <label for="username">Login:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter login" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 btn-block">Enter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require view . 'footer.php' ?>