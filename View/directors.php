<?php
    use Classes\Utils;
    require view . 'header.php';
    require view . 'menu.php';
?>
<div class="container mt-4">
    <h2><?= $title ?></h2>
    <ul class="list-group">
        <?php
            foreach ($directors_list as $director) {
                echo '
                <li class="list-group-item">' . Utils::htmlEscape($director['name']) . '
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
