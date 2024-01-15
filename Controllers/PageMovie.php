<?php


    namespace Controllers;

    use Classes\Directors;
    use Classes\Movies;


    class PageMovie extends Page
    {
        public function show()
        {
            $mov_obj = new Movies();
            $dir_obj = new Directors();

            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $title = $id ? 'Edit Movie' : 'Add Movie';

            if ($_POST) {
                if ($id) {
                    $updated = $mov_obj->editMovie($id, $_POST['directorId'], $_POST['name'], $_POST['description'], $_POST['releaseDate']);
                } else {
                    $added = $mov_obj->addMovie($_POST['directorId'], $_POST['name'], $_POST['description'], $_POST['releaseDate']);
                    $title = "Add another Movie";
                }
            }

            $movie = $mov_obj->getById($id);
            $directors = $dir_obj->getList(100);


            require view . '/movie.php';
        }
    }