<?php

    namespace Controllers;

    use Classes\Movies;


    class PageMovies extends Page
    {
        protected string $title = 'Movies list';
        protected string $page_name = 'movies';
        protected int $page = 1;
        protected int $on_page = 10;

        public function show()
        {
            $mov_obj = new Movies();
            $movies_list = $mov_obj->getList($this->on_page, $this->page);
            $count = $mov_obj->count();

            $title = $this->title;
            $page_name = $this->page_name;
            $on_page = $this->on_page;
            $page = $this->page;
            $nav = ceil($count / $this->on_page);

            require view . '/movies.php';
        }
    }