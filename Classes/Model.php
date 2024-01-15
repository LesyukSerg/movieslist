<?php

    namespace Classes;


    abstract class Model
    {
        protected object $db;
        protected string $table = 'table';
        protected string $key = 'id';

        public function __construct()
        {
            require ROOTDIR . '/conf/connect.php';
            $this->db = new DB($conn['host'], $conn['user'], $conn['pass'], $conn['dbname']);
        }

        public function delete($id): bool
        {
            $id = (int)$id;
            $sql = "DELETE FROM $this->table WHERE $this->key=$id";

            return $this->db->query($sql);
        }

        public function getById($id): array
        {
            $id = (int)$id;
            $sql = "SELECT * FROM $this->table WHERE $this->key=$id";

            return $this->db->fetchRow($sql);
        }

        public function getList($count = 10, $page = 1, $order_by = 'name'): array
        {
            $page--;
            $sql = "SELECT * FROM $this->table ORDER BY $order_by 
                        LIMIT $count OFFSET " . ($page * $count);

            return $this->db->fetchAll($sql);
        }

        public function count(): int
        {
            $sql = "SELECT COUNT($this->key) AS ids FROM $this->table";

            return $this->db->fetchRow($sql)['ids'];
        }
    }