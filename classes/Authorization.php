<?php

    class Authorization
    {
        private $login = 'admin';
        private $password = 'admin';

        public function __construct()
        {
            $page = trim($_SERVER['SCRIPT_NAME'], '/');
            if ($page != 'login.php') {
                //!strstr($_SERVER['SCRIPT_NAME'], 'api')
                if (!$this->isAuthenticated()) header('Location: /login.php');
            } else {
                if ($this->isAuthenticated()) header('Location: /index.php');
            }
        }

        public function isAuthenticated()
        {
            return isset($_SESSION['login']) && $_SESSION['login'] == $this->login;
        }

        public function auth($login, $pass)
        {
            if ($login == $this->login && $pass == $this->password) {
                $_SESSION['login'] = $login;
                header('Location: index.php');
            }

            return 1;
        }

        public function logout()
        {
            if ($_SESSION['login']) session_destroy();
        }
    }