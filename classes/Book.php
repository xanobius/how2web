<?php

class Book extends MediaItem{

    public function __construct()
    {
        parent::__construct();
        $this->mediatype = 'books';
    }

}