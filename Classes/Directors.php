<?php

    namespace Classes;


    class Directors extends Model
    {
        protected string $table = 'director';
        protected string $key = 'directorId';

        public function addDirector($name)
        {
            $name = $this->db->escapeString($name);

            $sql = "INSERT INTO $this->table (name) VALUES ('$name')";
            $this->db->query($sql);

            return $this->db->getLastInsertId();
        }

        public function editDirector($id, $name)
        {
            $id = (int)$id;
            $name = $this->db->escapeString($name);

            $sql = "UPDATE $this->table SET name='$name' WHERE directorId=$id";

            return $this->db->query($sql);
        }
    }
