<?php
    session_start();
    date_default_timezone_set('Europe/Kiev');

    define('ROOTDIR', getcwd());
    const cls = ROOTDIR . '/classes/';
    const view = ROOTDIR . '/view/';

    require ROOTDIR . '/conf/connect.php';
    require cls . 'Authorization.php';
    require cls . 'Movies.php';

    $user_obj = new Authorization();

    $mov_obj = new Movies($db);
    $title = 'Movies list';
    $page_name = 'movies';
    $page = (int)$_GET['page'] ?: 1;
    $on_page = 10;

    $movies_list = $mov_obj->getMovies($on_page, $page);
    $count = $mov_obj->countMovies()['ids'];
    $nav = ceil($count / $on_page);
?>
<?php require view . 'header.php' ?>
<?php require view . 'menu.php' ?>
<div class="container mt-4">
    <h2><?= $title ?></h2>
    <ul class="list-group">
        <?php
            foreach ($movies_list as $movie) {
                echo '
                <li class="list-group-item">                
                    <div class="float-sm-start">' . $movie['name'] . '</div>
                    <button class="btn btn-sm ms-2 btn-danger float-end del-movie" data-id="' . $movie['movieId'] . '">Delete</button>
                    <a class="btn btn-sm btn-primary float-end" href="/movie.php?id=' . $movie['movieId'] . '">Edit</a>
                    <button class="btn btn-sm btn-link" data-bs-toggle="collapse" aria-expanded="false" 
                     data-bs-target="#collapse' . $movie['movieId'] . '" aria-controls="collapse' . $movie['movieId'] . '">more</button>
                
                    <div class="row collapse mt-2" id="collapse' . $movie['movieId'] . '">
                        <div class="card card-body">
                            <h5 class="card-title">' . $movie['name'] . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">' . $movie['releaseDate'] . '</h6>
                            <p class="card-text">' . $movie['description'] . '</p>
                        </div>
                    </div>
                </li>
            ';
            }
        ?>
    </ul>

    <?php require view . 'pagination.php' ?>

    <a href="/movie.php" class="btn btn-success mt-3">Add Movie</a>
</div>

<?php require view . 'footer.php' ?>
