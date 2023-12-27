<?php

    class Movies
    {
        private $db;
        private $table_name = 'movie';

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function addMovie($directorID, $name, $description, $release_date)
        {
            $directorID = (int)$directorID;
            $name = $this->db->escapeString($name);
            $description = $this->db->escapeString($description);
            $release_date = $this->db->escapeString($release_date);

            $sql = "INSERT INTO {$this->table_name} (directorId, name, description, releaseDate) VALUES ('$directorID', '$name', '$description', '$release_date')";
            $this->db->query($sql);

            return $this->db->getLastInsertId();
        }

        public function editMovie($id, $directorID, $name, $description, $release_date)
        {
            $id = (int)$id;
            $directorID = (int)$directorID;
            $name = $this->db->escapeString($name);
            $description = $this->db->escapeString($description);
            $release_date = $this->db->escapeString($release_date);

            $sql = "UPDATE {$this->table_name} SET directorId='$directorID', name='$name', description='$description', releaseDate='$release_date' WHERE movieId=$id";

            return $this->db->query($sql);
        }

        public function deleteMovie($id)
        {
            $id = (int)$id;
            $sql = "DELETE FROM {$this->table_name} WHERE movieId=$id";

            return $this->db->query($sql);
        }

        public function getMovieById($id)
        {
            $id = (int)$id;
            $sql = "SELECT * FROM {$this->table_name} WHERE movieId=$id";

            return $this->db->fetchRow($sql);
        }

        public function getMovies($count = 10, $page = 1)
        {
            $page--;
            $sql = "SELECT * FROM {$this->table_name} ORDER BY name ASC  LIMIT $count OFFSET " . ($page * $count);

            return $this->db->fetchAll($sql);
        }

        public function countMovies()
        {
            $sql = "SELECT COUNT(movieId) AS ids FROM {$this->table_name}";

            return $this->db->fetchRow($sql);
        }
    }
