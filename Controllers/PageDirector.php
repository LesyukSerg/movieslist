<?php

    namespace Controllers;

    use Classes\Directors;


    class PageDirector extends Page
    {
        protected string $title = 'Director';
        protected string $page_name = 'director';

        public function show()
        {
            $dir_obj = new Directors($this->db);
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $title = $id ? "Edit Director" : "Add Director";

            if ($_POST) {
                if ($id) {
                    $updated = $dir_obj->editDirector($id, $_POST['name']);
                } else {
                    $added = $dir_obj->addDirector($_POST['name']);
                    $title = "Add another Director";
                }
            }

            if ($id) {
                $director = $dir_obj->getById($id);
            } else {
                $director['name'] = '';
            }

            require view . '/director.php';
        }
    }