<?php

    namespace Controllers;

    use Classes\Directors;


    class PageDirectors extends Page
    {
        protected string $title = 'Directors list';
        protected string $page_name = 'directors';
        protected int $page = 1;
        protected int $on_page = 5;

        public function show()
        {
            $mov_obj = new Directors();
            $directors_list = $mov_obj->getList($this->on_page, $this->page);
            $count = $mov_obj->count();

            $title = $this->title;
            $page_name = $this->page_name;
            $on_page = $this->on_page;
            $page = $this->page;
            $nav = ceil($count / $this->on_page);

            require view . '/directors.php';
        }

    }