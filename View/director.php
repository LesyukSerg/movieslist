<?php
    use Classes\Utils;
    require view . 'header.php';
    require view . 'menu.php';
?>
<?= isset($updated) ? '<div class="alert alert-success" role="alert">Director has been updated</div>' : '' ?>
<?= isset($added) ? '<div class="alert alert-info" role="alert">Director has been added</div>' : '' ?>

    <div class="container mt-5">
        <h2><?= $title ?></h2>

        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter Director's name"
                       value="<?= Utils::htmlEscape($director['name']) ?>" required>
            </div>

            <button type="submit" class="btn mt-2 btn-primary float-end"><?= $id ? 'EDIT' : 'ADD' ?></button>
        </form>
    </div>

<?php require view . 'footer.php'; ?>