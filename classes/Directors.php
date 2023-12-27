<?php

    class Directors
    {
        private $db;
        private $table_name = 'director';

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function addDirector($name)
        {
            $name = $this->db->escapeString($name);

            $sql = "INSERT INTO {$this->table_name} (name) VALUES ('$name')";
            $this->db->query($sql);

            return $this->db->getLastInsertId();
        }

        public function editDirector($id, $name)
        {
            $id = (int)$id;
            $name = $this->db->escapeString($name);

            $sql = "UPDATE {$this->table_name} SET name='$name' WHERE directorId=$id";

            return $this->db->query($sql);
        }

        public function deleteDirector($id)
        {
            $id = (int)$id;
            $sql = "DELETE FROM {$this->table_name} WHERE directorId=$id";

            return $this->db->query($sql);
        }

        public function getDirectorById($id)
        {
            $id = (int)$id;
            $sql = "SELECT * FROM {$this->table_name} WHERE directorId=$id";

            return $this->db->fetchRow($sql);
        }

        public function getDirectors($count = 5, $page = 1)
        {
            $page--;
            $sql = "SELECT * FROM {$this->table_name} ORDER BY name ASC LIMIT $count OFFSET " . ($page * $count);

            return $this->db->fetchAll($sql);
        }

        public function countDirectors()
        {
            $sql = "SELECT COUNT(directorId) AS ids FROM {$this->table_name}";

            return $this->db->fetchRow($sql);
        }
    }
