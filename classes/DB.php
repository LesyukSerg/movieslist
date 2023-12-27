<?php

    class DB
    {
        private $host;
        private $username;
        private $password;
        private $database;
        private $conn;

        public function __construct($host, $username, $password, $database)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;

            $this->connect();
        }

        private function connect()
        {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function query($sql)
        {
            $result = $this->conn->query($sql);

            if (!$result) {
                die("Query failed: " . $this->conn->error);
            }

            return $result;
        }

        public function fetchRow($sql)
        {
            $result = $this->query($sql);
            return $result->fetch_assoc();
        }

        public function fetchAll($sql)
        {
            $rows = [];
            $result = $this->query($sql);

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        }

        public function getLastInsertId()
        {
            return $this->conn->insert_id;
        }

        public function escapeString($value)
        {
            return $this->conn->real_escape_string($value);
        }

        public function close()
        {
            $this->conn->close();
        }
    }