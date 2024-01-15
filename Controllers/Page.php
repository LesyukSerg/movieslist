<?php

    namespace Controllers;

    use Classes\Authorization;
    use Classes\DB;


    abstract class Page
    {
        protected object $db;
        protected string $title;
        protected string $page_name;
        protected int $page;
        protected int $on_page;

        public function __construct()
        {
            new Authorization();
            $this->page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $this->db = $this->connect();
            $this->show();
        }

        private function connect(): object
        {
            require ROOTDIR . '/conf/connect.php';

            return new DB($conn['host'], $conn['user'], $conn['pass'], $conn['dbname']);
        }

        public function show()
        {
        }
    }