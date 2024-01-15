<?php

    namespace Classes;


    class Movies extends Model
    {
        protected string $table = 'movie';
        protected string $key = 'movieId';

//todo data validation
        public function addMovie($directorID, $name, $description, $release_date): int
        {
            $directorID = (int)$directorID;
            $name = $this->db->escapeString($name);
            $description = $this->db->escapeString($description);
            $release_date = $this->db->escapeString($release_date);

            $sql = "INSERT INTO $this->table (directorId, name, description, releaseDate) 
                            VALUES ('$directorID', '$name', '$description', '$release_date')";
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

            $sql = "UPDATE $this->table 
                        SET directorId='$directorID', name='$name', description='$description', releaseDate='$release_date' 
                        WHERE movieId=$id";

            return $this->db->query($sql);
        }
    }
